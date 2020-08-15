<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('employee', 'EmployeeController');
Route::resource('supplier', 'SupplierController');
Route::resource('customer', 'CustomerController');
Route::resource('productcategory', 'ProductCategoryController');
Route::resource('expense', 'ExpenseController');
Route::resource('expensecategory', 'ExpenseCategoryController');
Route::get('expense-today', 'ExpenseController@today_expense')->name('expense.date');
Route::get('expense-month/{month?}', 'ExpenseController@month_expense')->name('expense.month');
//Route::get('expense-yearly/{year?}', 'ExpenseController@yearly_expense')->name('expense.year');
//Route::get('expense-yearly/{month?}/{year?}', 'ExpenseController@yearly_expense_monthly')->name('expense.year');
Route::get('expense-yearly/{date?}/{month?}/{year?}', 'ExpenseController@yearly_expense_monthly_date')->name('expense.year');
