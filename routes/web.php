<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard/datawarga', function () {
//     return view('Dashboard.datawarga');
// });

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/datawarga', [DashboardController::class, 'datawarga'])->middleware('auth');
Route::get('/kriteria', [DashboardController::class, 'kriteria'])->name('kriteria')->middleware('auth');
Route::get('/hasil', [DashboardController::class, 'hasil'])->middleware('auth');

// POST
Route::post('/register', [AuthController::class, 'store']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/savekriteria', [DashboardController::class, 'saveKriteria']);

// DELETE
Route::post('/delete/kriteria', [DashboardController::class, 'hapusKriteria']);

