<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\plateController;
use App\Models\Plate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckRole;





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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', [plateController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user',[CheckRole::class,'index'])->name('user');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role'])->group(function(){
    Route::get('/dashboard', [plateController::class, 'index'])->name('dashboard');
    Route::get('/add',[plateController::class, 'viewAdd'])->name('addView');
        Route::post('/addPlate/add', [plateController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [plateController::class, 'destroy']);
    Route::get('/edit/{id}', [plateController::class, 'edit']);
Route::put('/update/{id}', [plateController::class, 'update']);
});



require __DIR__.'/auth.php';
