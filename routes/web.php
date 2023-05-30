<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\CarouselController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RequestBookController;
use App\Http\Controllers\ApprovedBookController;
use App\Http\Controllers\IssueBookController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\ReissueBookController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ResearchSupervisionController;
use App\Http\Controllers\TeachingController;

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

require __DIR__.'/auth.php';
// frontend all route
Route::middleware('auth')->controller(LibraryController::class)->group(function(){
    Route::get('/library-dashboard','index')->name('library-dashboard');
    Route::get('/get-book','booklist')->name('get-book');
    Route::get('/teacher-list','teacherlist')->name('teacher-list');
    Route::get('/teacher-details/{id}','teacherDetails')->name('teacher-details');
    Route::get('/student-list','studentlist')->name('student-list');
    Route::post('/book/request','request_store')->name('book.request');
    Route::get('/request-cancel/{id}/{book_id}','destroy')->name('request.destroy');
    Route::get('/user-reissue/{id}','reissue')->name('user.reissue');
});

Route::middleware('auth')->controller(ContactUsController::class)->group(function(){
  Route::get('/user/contactus','index')->name('user.contactus.index');
  Route::post('/contactus','store')->name('user.contactus.store');
});

Route::controller(AboutUsController::class)->group(function(){
  Route::get('/user/aboutus','index')->name('user.aboutus.index');
});

Route::controller(EventController::class)->group(function(){
  Route::get('/user/event','index')->name('user.event.index');
});

//Teacher Profile Info

Route::middleware('auth')->group(function() {
  Route::middleware(['role:teacher'])->group(function() {
    Route::resource('research-supervisions', ResearchSupervisionController::class);
    Route::resource('teachings', TeachingController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('publications', PublicationController::class);
    Route::resource('awards', AwardController::class);
    Route::resource('memberships', MembershipController::class);
  });

  Route::controller(ProfileController::class)->group(function(){
    Route::get('/user/profile','index')->name('user.profile.index');
    Route::patch('/user/profile','updateProfile')->name('user.profile.update');
    Route::patch('/change/password','changePassword')->name('user.change.password');
  });
});

Route::middleware(['auth', 'role:admin'])->group(function() {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  
  Route::resource('teachers', TeacherController::class);
  Route::resource('students', StudentController::class);

  Route::resource('categories', CategoryController::class);
  Route::resource('books', BookController::class);
//  Route::resource('carousels', CarouselController::class)->middleware(['auth','role']);
  
  Route::get('/admin-profile',[ProfileController::class, 'adminIndex'])->name('admin.profile.index');
  
  Route::get('/reissuebooks',[ReissueBookController::class, 'index'])->name('reissue.book.index');
  Route::get('/reissuebooks/{id}',[ReissueBookController::class, 'reissue'])->name('reissue.book.reissue');

  Route::get('/returnbooks',[ReturnBookController::class, 'index'])->name('return.book.index');

  Route::get('/issuebooks',[IssueBookController::class, 'index'])->name('issue.book.index');
  Route::get('/issuebooks/{id}/{book_id}',[IssueBookController::class, 'return'])->name('issue.book.return');

  Route::get('/approvedbooks',[ApprovedBookController::class, 'index'])->name('approved.book.index');
  Route::get('/approvedbooks/{id}',[ApprovedBookController::class, 'issue'])->name('approved.book.issue');

  Route::get('/requestbooks',[RequestBookController::class, 'index'])->name('request.book.index');
  Route::get('/requestbooks/{id}/{book_id}',[RequestBookController::class, 'approved'])->name('request.book.approved');

});
//end manage book library request and status change of admin




