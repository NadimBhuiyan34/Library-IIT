<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\RequestBookController; 
use App\Http\Controllers\ApprovedBookController; 
use App\Http\Controllers\IssueBookController; 
use App\Http\Controllers\ReturnBookController; 
use App\Http\Controllers\ReissueBookController; 
use App\Http\Controllers\TeacherController; 
use App\Http\Controllers\StudentController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/home');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// frontend all route
Route::middleware('auth')->controller(LibraryController::class)->group(function(){
 
    Route::get('/library-dashboard','index')->name('library-dashboard');
    Route::get('/get-book','booklist')->name('get-book');
    Route::get('/teacher-list','teacherlist')->name('teacher-list');
    Route::get('/student-list','studentlist')->name('student-list');
    Route::post('/book/request','request_store')->name('book.request');
    Route::get('/request-cancel/{id}/{book_id}','destroy')->name('request.destroy');
    Route::get('/user-reissue/{id}','reissue')->name('user.reissue');

});
// end frontend all route

// admin category,carousel,and book add
 Route::resource('categories', CategoryController::class)->middleware('auth');
 Route::resource('carousels', CarouselController::class)->middleware('auth');
 Route::resource('books', BookController::class)->middleware('auth');
// end admin category,carousel,and book add


//  student and teacher user list of admin 
 Route::resource('teachers', TeacherController::class)->middleware('auth');
 Route::resource('students', StudentController::class)->middleware('auth');
// end student and teacher user list of admin 


// manage library book request and status change of admin
Route::middleware('auth')->controller(RequestBookController::class)->group(function(){
 
  Route::get('/requestbooks','index')->name('request.book.index');
  Route::get('/requestbooks/{id}/{book_id}','approved')->name('request.book.approved');

});

Route::middleware('auth')->controller(ApprovedBookController::class)->group(function(){
 
  Route::get('/approvedbooks','index')->name('approved.book.index');
  Route::get('/approvedbooks/{id}','issue')->name('approved.book.issue');

});

Route::middleware('auth')->controller(IssueBookController::class)->group(function(){
 
  Route::get('/issuebooks','index')->name('issue.book.index');
  Route::get('/issuebooks/{id}/{book_id}','return')->name('issue.book.return');

});
Route::middleware('auth')->controller(ReturnBookController::class)->group(function(){
 
  Route::get('/returnbooks','index')->name('return.book.index');

});
Route::middleware('auth')->controller(ReissueBookController::class)->group(function(){
 
  Route::get('/reissuebooks','index')->name('reissue.book.index');
  Route::get('/reissuebooks/{id}','reissue')->name('reissue.book.reissue');

});
//end manage book library request and status change of admin



 
 