<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\MissionRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard/admin', function () {
    $user = Auth::user();

    if ($user && $user->role === 'leave_mission_approver') {
        return ('hello Admin');
    } else {
        abort(403, 'Unauthorized.');
    }
});

// Routes for leave request
Route::get('/leave_request', [LeaveRequestController::class, 'create'])->name('leave_request.create');
Route::post('/leave_request', [LeaveRequestController::class, 'submit'])->name('leave_request.submit');

// Routes for mission request
Route::middleware('auth')->group(function () {
    Route::get('/mission_request', [MissionRequestController::class, 'create'])->name('mission_request.create');
    Route::post('/mission_request', [MissionRequestController::class, 'submit'])->name('mission_request.submit');
    Route::post('/mission_request/store', [MissionRequestController::class, 'store'])->name('mission_request.store');
});

require __DIR__.'/auth.php';

