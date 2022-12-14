<?php

use App\Http\Controllers\OrganisationController;
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
Route::get('/', function () {
    return redirect()->route('upload.form');
});
Route::get('/upload', [OrganisationController::class, 'index'])->name('upload.form');
Route::post('/upload', [OrganisationController::class, 'upload'])->name('upload');
Route::post('/organisations', [OrganisationController::class, 'store'])->name('organistion.store');

