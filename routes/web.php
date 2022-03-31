<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ExpenseController;
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
    return view('main');
});
Route::get('/login', [UserAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/signup', [UserAuthController::class, 'signup'])->middleware('alreadyLoggedIn');

Route::post('/signup-user', [UserAuthController::class, 'signupUser'])->name('signup-user');
Route::post('/login-user', [UserAuthController::class, 'loginUser'])->name('login-user');

Route::get('/home', [UserAuthController::class, 'home'])->middleware('isLoggedIn');

Route::get('/logout', [UserAuthController::class, 'logout']);

Route::get('/addexpense', [ExpenseController::class, 'addexpense']);
Route::get('/addincome', [ExpenseController::class, 'addincome']);

Route::post('/add-expense', [ExpenseController::class, 'expense'])->name('add-expense');
Route::post('/add-income', [ExpenseController::class, 'income'])->name('add-income');

Route::get('/report', [ExpenseController::class, 'display'])->middleware('isLoggedIn');