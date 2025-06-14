<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Jobs\GenerateSalesFormReport;
use PHPUnit\Event\Code\Test;

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

require __DIR__ . '/auth.php';

// Add a route to dispatch the job
Route::get('/dispatch-job', function () {
    GenerateSalesFormReport::dispatch();
    return 'Job dispatched!';
});


Route::get('/test-job', [TestController::class, 'test']);
