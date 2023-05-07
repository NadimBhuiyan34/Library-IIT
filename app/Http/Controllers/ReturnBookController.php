<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
class ReturnBookController extends Controller
{
    //

    public function index()
    {
     $book_request = BookRequest::where('status','return')
    ->latest('created_at')
    ->get();

        return view('admin.manage_request.return_book',compact('book_request'));
    }
    
}
