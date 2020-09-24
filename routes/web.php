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

Route::resource('salary', 'SalaryController');
Route::get('salary-filter/{month?}/{year?}', 'SalaryController@salary_filter')->name('salary.filter');
Route::get('salary-month', 'SalaryController@salary_month')->name('salaryMonth');
Route::get('salary-year', 'SalaryController@salaryYear')->name('salaryYear');

Route::resource('supplier', 'SupplierController');
Route::resource('customer', 'CustomerController');
Route::post('/customer-create', 'CustomerController@store');

Route::resource('customer-payment', 'CustomerDueController');

Route::resource('cashdeposit', 'CashDepositController');
Route::get('cashdeposit-filter/{date?}/{month?}/{year?}', 'CashDepositController@deposit_filter')->name('cashdeposit.filter');
Route::get('cashdeposit-month', 'CashDepositController@depositMonth')->name('cashdeposit.month');
Route::get('cashdeposit-year', 'CashDepositController@depositYear')->name('cashdeposit.year');

Route::resource('expensecategory', 'ExpenseCategoryController');
Route::resource('expense', 'ExpenseController');
Route::get('expense-filter/{date?}/{month?}/{year?}', 'ExpenseController@expense_filter')->name('expense.filter');
Route::get('expense-month', 'ExpenseController@expenseMonth')->name('expense.months');
Route::get('expense-year', 'ExpenseController@expense_year')->name('expense.years');
/*Route::get('expense-today', 'ExpenseController@today_expense')->name('expense.date');*/

Route::resource('productcategory', 'ProductCategoryController');
Route::resource('products', 'ProductController');

Route::get('/pos', 'PosController@index')->name('pos');
Route::post('/cart-add', 'cartController@addcart');
Route::post('/cart-update/{rowId}', 'cartController@updatecart');
Route::get('/cart-remove/{rowId}', 'cartController@removecart');
Route::get('/invoice', 'cartController@createInvoice');
