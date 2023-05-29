<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\expenseController; 
use App\http\controllers\authController; 
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
Route::group(['middleware' => ['isGuest']], function (){ 
    Route::get('/login', [authController::class, 'login']); 
    Route::post('/login', [authController::class , 'postLogin'])->name('postLogin'); 
}); 



// userAuth
Route::group(['middleware' => ['userAuth']], function (){ 
    
    Route::get('/', function () {  return view('home');});
    Route::get('/expense/add-expense', [expenseController::class, "addExpense"])->name('add-expense'); 
    Route::get('/expnese/add-expense-type', [expenseController::class, "addExpenseType"])->name('add-expnese-type'); 
    Route::post('/expnese/save-expense-type', [expenseController::class, "saveExpenseType"])->name('save-expense-type'); 
    Route::get('/logout', [authController::class, 'logout'])->name('logout'); 
}); 