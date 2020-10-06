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

Route::get('/home2', 'HomeSaleController@index')->name('home2');
Route::resource('sale2', 'SaleAtaGlanceController');
Route::get('sale2-filter/{date?}/{month?}/{year?}', 'SaleAtaGlanceController@sale_filter')->name('sale2.filter');
Route::get('sale2-month', 'SaleAtaGlanceController@saleMonth')->name('sale2Months');
Route::get('sale2-year', 'SaleAtaGlanceController@sale_year')->name('sale2Years');

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
Route::post('/create-payments', 'cartController@createPayment');
Route::get('/sales', 'posController@orders');
Route::delete('/delete-order/{id}', 'PosController@deleteOrders');
Route::get('/sales-details/{id}', 'PosController@detailsOrders');

Route::resource('soilsorder', 'SoilSordarController');
Route::resource('mati', 'MatiController');
Route::resource('mati-payment', 'PaymentSoilSorderController');

Route::resource('coal', 'CoilController');
Route::resource('sand', 'SandController');

Route::resource('landowner', 'LandOwnerController');
Route::resource('land', 'LandOfUbController');
Route::resource('land-pay', 'PaymentLandOwnerController');

Route::resource('milparty', 'MilPartyController');
Route::resource('brick', 'MakingBricksController');
Route::resource('milparty-payment', 'PaymentMilPartyController');

Route::resource('diesel', 'DiselMilController');
Route::resource('diesel-inventory', 'DiselInventoryController');
Route::resource('diesel-uses', 'DieselUseController');
