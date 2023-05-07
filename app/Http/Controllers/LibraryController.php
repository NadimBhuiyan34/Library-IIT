<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BookRequest;
use App\Models\User;
class LibraryController extends Controller
{
    //
    public function index()
    {
        $book_request = BookRequest::where('user_id', auth()->user()->id)
    ->latest('created_at')
    ->get();
     
      
//        $overdueRequests = BookRequest::where('return_date', '<', Carbon::now())
//             ->where('status', '!=', 'return')
//             ->get();

//     //   @dd($overdueRequests );
// foreach ($overdueRequests as $request) {
//             $issueDate = Carbon::parse($request->issue_date);
//             $returnDate = Carbon::parse($request->return_date);

//             $daysOverdue = $issueDate->diffInDays($returnDate, false);
//             //  @dd($daysOverdue);
//             $fine = $daysOverdue > 0 ? $daysOverdue * 2 : 0;

//             $request->fine = $fine;
//             $request->status = 'overdue';

//             $request->save();
//         }


        return view('frontend.library.dashboard',compact('book_request'));
    }
    public function booklist()
    {
        $books = Product::where('bookquantity', '>', 0)
                          ->where('status', '1')
                          ->get();
        
        return view('frontend.library.book-list',compact('books'));
    }
    public function teacherlist()
    {
          $user_teacher = User::where('role','teacher')
                                ->latest('created_at')
                                ->get();
        return view('frontend.faculty.teacher',compact('user_teacher'));
    }
    public function studentlist()
    {
         $user_student = User::where('role','student')
                                ->latest('created_at')
                                ->get();
        
        return view('frontend.faculty.student',compact('user_student'));
    }
    public function request_store(Request $request)
    {
       
$count = BookRequest::where('user_id', $request->user_id)
                    ->where(function ($query) {
                        $query->where('status', 'request')
                              ->orWhere('status', 'approved')
                              ->orWhere('status', 'issue');
                    })
                    ->count();

$check_request = BookRequest::where('user_id', $request->user_id)
                    ->where('book_id', $request->book_id)
                    ->where('status','!=', 'return')
                    ->count();



     if($check_request==0)
     {
              if($count>2 )
      {
            return redirect()->back()->withMessage('You request only three books')->withType('danger');
      }
        else
        {
        

         $book = BookRequest::create([
        'user_id' => $request->user_id,
        'book_id' => $request->book_id,
        'status' => "request"
    ]);
             $t_request = Product::where('id', $request->book_id)
                         ->first();
            
               Product::where('id',$request->book_id)
                    ->update(['total_request' => $t_request->total_request+1]);
       
      
    return redirect()->back()->withMessage('Request sent ')->withType('success');
        }
     }
     else
     {
                return redirect()->back()->withMessage('You all ready requested ')->withType('success');
     }
       
    

      
    }

      
public function reissue($id)
{
    $check_status =  BookRequest::where('id',$id)->update(['reissue'=>'reissue']);
    return redirect()->back()->withMessage('Reissue sent ')->withType('success');
                    
}


public function destroy($id,$book_id)
{

      $check_status =  BookRequest::where('id',$id)
                                  ->first();
      $stock = Product::where('id', $book_id)
                           ->first();
                           

       if($check_status->status=='approved' || $check_status->status=='issue' || $check_status->status=='return')
     {
             BookRequest::findOrFail($id)->delete();
             $stock->bookquantity = $stock->bookquantity + 1;
             $stock->save();
            // Product::update(['bookquantity' => $stock->bookquantity + 1]);

     }
     else
     {

            BookRequest::findOrFail($id)->delete();
            
             $stock->total_request = $stock->total_request - 1;
             $stock->save();
     }
    

    

      return redirect()->back()->withMessage('Your request cancel');
    
}
}
