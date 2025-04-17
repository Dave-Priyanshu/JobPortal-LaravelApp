<?php

use App\Http\Controllers\JobAlertController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SuperAdmin\UserListiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

// superadmin rotues
Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::get('/superadmin',function(){
        return view('superadmin.superDashboard');
    })->name('sadmin.dashboard');

    Route::get('/users',                  [UserListiController::class,'index'])->name('user.index');
    Route::get('{id}/edit',          [UserListiController::class,'edit'])->name('user.edit');
    Route::patch('{id}',             [UserListiController::class,'update'])->name('user.update');
    Route::delete('{id}',            [UserListiController::class,'destroy'])->name('user.destroy');
    Route::patch('{id}/toggle-admin',[UserListiController::class,'toggleAdmin'])->name('user.toggleAdmin');
    Route::patch('{id}/lock',        [UserListiController::class,'lock'])->name('user.lock');
    Route::patch('{id}/unlock',      [UserListiController::class,'unlock'])->name('user.unlock');
});



Route::view('/','personal.home')->name('home');
Route::get('/contact',function(){return view('personal.contact');})->name('personal.contact');

// All Listings
Route::get('/jobs', [ListingController::class, 'index'])->name('jobs.index');

//Single listing
Route::get('/singleListing/{listing}',[ListingController::class, 'show']);

//Store listing form data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//Show create job form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//Update Listings
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete Listings 
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//show Registration form 
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');


//show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);


//job alert route
Route::post('/job-alerts/subscribe', [JobAlertController::class, 'subscribe'])->name('job.alerts.subscribe');
Route::get('/job-alerts/send', [JobAlertController::class, 'sendAlerts']);
