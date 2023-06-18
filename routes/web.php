<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\expenseController; 
use App\http\controllers\authController; 
use App\http\controllers\homeController; 
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
    
    // Route::get('/', function () {  return view('home');})->name('home-dashboard');
    Route::get('/',  [homeController::class, 'home'])->name('home-dashboard');
    Route::get('/expense/add-expense', [expenseController::class, "addExpense"])->name('add-expense'); 
    Route::get('/expnese/add-expense-type', [expenseController::class, "addExpenseType"])->name('add-expnese-type'); 
    
    Route::post('/expnese/save-expense-type', [expenseController::class, "saveExpenseType"])->name('save-expense-type'); 


    // save expense
    Route::post('/expense/add-expense', [expenseController::class, "saveExpense"])->name('save-expense'); 

    // view expense 
    Route::get('/expense/view-expense', [expenseController::class, 'viewExpense'])->name('view-expense'); 
        
    
    
    Route::get('/logout', [authController::class, 'logout'])->name('logout'); 
}); 