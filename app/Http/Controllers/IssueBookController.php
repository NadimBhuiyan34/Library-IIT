<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Product;
class IssueBookController extends Controller
{
    //
     public function index()
    {
            $book_request = BookRequest::where(function ($query) {
                $query->where('status', 'issue')
                    ->orWhere('status', 'overdue');
            })
            ->latest('created_at')
            ->get();


        return view('admin.manage_request.issue_book',compact('book_request'));
    }
    public function return($id,$book_id)
    {

        //    $returnedBook = new BookRequest;
       
$returnedBook = BookRequest::where('id', $id)->first();

// Set the return date to the current time
$returnedBook->status = 'return';

// Calculate the fine based on the difference between the due date and the return date


$returnedBook->save();


         
            // book quantity

           $stock = Product::where('id', $book_id)
                         ->first();
            
                 Product::where('id',$book_id)
                    ->update(['bookquantity' => $stock->bookquantity + 1]);
      return redirect()->back()->withMessage('Book return');

    
    }
}
