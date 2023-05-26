<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $request_count = BookRequest::count();
        $total_book_count = Product::count();;
        $returned_count = BookRequest::where('status', 'return')->count();

        return view('admin/dashboard',compact('request_count', 'total_book_count', 'returned_count'));
    }
}
