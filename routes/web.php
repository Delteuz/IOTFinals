<?php

use App\Models\BulbStatus;
use App\Models\ScheduleLights;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BulbStatusController;
use App\Http\Controllers\ScheduleLightsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/dashboard', function () {
    $led = BulbStatus::all();
    $scheduledLights = ScheduleLights::all();
    return view('dashboard')
        ->with('led', $led)
        ->with('scheduler', $scheduledLights);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::post('/new', [BulbStatusController::class, 'update']);


Route::post('/setSched/{id}', [ScheduleLightsController::class, 'update']);
Route::post('/delete-sched/{id}', [ScheduleLightsController::class, 'destroy']);
