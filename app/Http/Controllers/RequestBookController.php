<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Product;
use App\Notifications\NotifyForRequestApproved;

class RequestBookController extends Controller
{
    //

    public function index()
    {
        $book_request = BookRequest::where('status', 'request')
            ->latest('created_at')
            ->get();

        return view('admin.manage_request.book_request', compact('book_request'));
    }

    public function approved($id, $book_id)
    {
        $randomString = Str::random(10);
        while (BookRequest::where('approved_id', $randomString)->exists()) {
            // If it does, generate a new random string
            $randomString = Str::random(10);
        }

        $bookRequest = BookRequest::where('id', $id)->with('users')->first();
        $bookRequest->update(['status' => "approved", 'approved_id' => $randomString, 'approved_date' => now()]);

        //  deacrese book quanity
        $stock = Product::where('id', $book_id)
            ->first();

        Product::where('id', $book_id)
            ->update(['bookquantity' => $stock->bookquantity - 1, 'total_request' => $stock->total_request - 1]);

        // deacrese request


        // Notify the user
        $bookRequest->users->notify(new NotifyForRequestApproved($bookRequest));

        return redirect()->back()->withMessage('Request Approved');
    }
}
