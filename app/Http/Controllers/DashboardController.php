<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $request_count = BookRequest::count();
        $approved_count = BookRequest::where('status', 'approved')->count();
        $reissued_count = BookRequest::where('reissue', 'reissue')->count();
        $returned_count = BookRequest::where('status', 'return')->count();

        return view('admin/dashboard',compact('request_count', 'approved_count', 'reissued_count', 'returned_count'));
    }
}
