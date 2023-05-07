<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
use Carbon\Carbon;
class ApprovedBookController extends Controller
{
    //
    public function index()
    {
     $book_request = BookRequest::where('status','approved')
    ->latest('created_at')
    ->get();

        return view('admin.manage_request.approved_book',compact('book_request'));
    }
    public function issue($id)
    {
        $today = Carbon::today();
        $sevenDaysFromToday = $today->copy()->addDays(7);
  BookRequest::where('id', $id)
    ->update(['status' => "issue",'issue_date'=>now(),'return_date'=>$sevenDaysFromToday->format('Y-m-d')]);

      return redirect()->back()->withMessage('Book Issue');

    
    }
}
