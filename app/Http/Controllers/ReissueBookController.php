<?php

namespace App\Http\Controllers;
use App\Models\BookRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ReissueBookController extends Controller
{
    //
     public function index()
    {
        $book_request = BookRequest::where('reissue','reissue')
                            ->where('fine',0)
                            ->orWhere('reissue', 'reissued')
                            // ->where('return_date','<',Carbon::today())
                                ->latest('created_at')
                                ->get();

        return view('admin.manage_request.reissue',compact('book_request'));
    }

     public function reissue($id)
    {
        $reissue = BookRequest::find($id);
        
        BookRequest::where('id', $id)->update(['return_date'=>(new Carbon($reissue->return_date))->addDays(7),'reissue'=>'reissued']);


      return redirect()->back()->withMessage('Book Reissue Accepted');
    }

}


