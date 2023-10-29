<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/home', [UserController::class, 'index'])->name('index');
Route::post('/home', [UserController::class, 'create'])->name('create');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');

Route::get('/delete/{id}', [UserController::class , 'destroy'])->name('destroy');


// Employee Route
Route::get('/employee', [EmployeeController::class, 'index'])->name('index');
Route::post('/employee', [EmployeeController::class, 'create'])->name('create');


Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');


Route::get('/delete/{id}', [EmployeeController::class , 'destroy'])->name('destroy');


// ImportExport
Route::get('/file-import',[EmployeeController::class,'importView'])->name('import-view');
Route::post('/import',[EmployeeController::class,'import'])->name('import');
Route::get('/export-users',[EmployeeController::class,'exportUsers'])->name('export-users');
