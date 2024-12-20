<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// dummy route for mail
// Route::get('test', function () {
// 	Mail::to('irfanshukri203@gmail.com')->send(new JobPosted());

// 	return 'done';
// });

Route::get('test', function () {
	// dispatch(function () {
	// 	logger('hello from queue');
	// })->delay(5);

	$job = Job::first();

	TranslateJob::dispatch($job);

	return 'done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class)->middleware('auth');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
	->middleware('auth')
	->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// auth route
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
