<?php

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
    return redirect('/admin');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {
    Route::resource('/transactions', 'TransactionController');
    Route::POST('/transactions/getTransaction','TransactionController@getTransaction');
    Route::resource('/employees', 'EmployeeController');
    Route::resource('/rates', 'RateController');
    Route::resource('/drivers', 'DriverController');
    Route::resource('/helpers', 'HelperController');
    Route::resource('/cargos', 'CargoController');
    
   // Route::patch('/transactions/status/{id}', 'TransactionController@updateStatus')->name('transactions.status');
    
    Route::get('/employee/payroll/{id}', 'PayrollController@payrollIndex')->name('payrolls.show');
    Route::get('/payrolls/create/{id}', 'PayrollController@create')->name('payrolls.create');
    Route::post('/payrolls/{id}', 'PayrollController@store')->name('payrolls.store');
    Route::get('/employee/payroll/{id}/receipt', 'PayrollController@receipt')->name('payrolls.receipt');
    Route::get('/employee/payroll/{id}/edit', 'PayrollController@edit')->name('payrolls.edit');
    Route::patch('/payrolls/update/{id}', 'PayrollController@update')->name('payrolls.update');

    Route::get('/driver/payroll/{id}', 'DriverPayrollController@payrollIndex')->name('driverpayrolls.show');
    Route::get('/driverpayrolls/create/{id}', 'DriverPayrollController@create')->name('driverpayrolls.create');
    Route::post('/driverpayrolls/{id}', 'DriverPayrollController@store')->name('driverpayrolls.store');
    Route::get('/driver/payroll/{id}/receipt', 'DriverPayrollController@receipt')->name('driverpayrolls.receipt');
    Route::get('/driver/payroll/{id}/edit', 'DriverPayrollController@edit')->name('driverpayrolls.edit');
    Route::patch('/driverpayrolls/update/{id}', 'DriverPayrollController@update')->name('driverpayrolls.update');

    Route::get('/helper/payroll/{id}', 'HelperPayrollController@payrollIndex')->name('helperpayrolls.show');
    Route::get('/helperpayrolls/create/{id}', 'HelperPayrollController@create')->name('helperpayrolls.create');
    Route::post('/helperpayrolls/{id}', 'HelperPayrollController@store')->name('helperpayrolls.store');
    Route::get('/helper/payroll/{id}/receipt', 'HelperPayrollController@receipt')->name('helperpayrolls.receipt');
    Route::get('/helper/payroll/{id}/edit', 'HelperPayrollController@edit')->name('helperpayrolls.edit');
    Route::patch('/helperpayrolls/update/{id}', 'HelperPayrollController@update')->name('helperpayrolls.update');


    Route::resource('/check', 'CheckController');

    Route::get('/attendance', 'AttendanceController@index')->name('attendance');
    Route::get('/latetime', 'AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/leave', 'LeaveController@index')->name('leave');
    Route::get('/overtime', 'LeaveController@indexOvertime')->name('indexOvertime');

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::resource('/schedule', 'ScheduleController');

   

});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');



    Route::resource('/employees', 'EmployeeController', ['only' => [
        'show', 'index',
    ]]);

    Route::resource('/rates', 'RateController', ['only' => [
        'show', 'index',
    ]]);

    Route::resource('/drivers', 'DriverController', ['only' => [
        'show', 'index',
    ]]);

    Route::resource('/helpers', 'HelperController', ['only' => [
        'show', 'index',
    ]]);

    Route::resource('/cargos', 'CargoController', ['only' => [
        'show', 'index',
    ]]);

    Route::resource('/transactions', 'TransactionController', ['only' => [
        'show', 'index',
    ]]);

});

Route::get('/attendance/assign', function () {
    return view('attendance_leave_login');
})->name('attendance.login');

Route::post('/attendance/assign', 'AttendanceController@assign')->name('attendance.assign');


Route::get('/leave/assign', function () {
    return view('attendance_leave_login');
})->name('leave.login');

Route::post('/leave/assign', 'LeaveController@assign')->name('leave.assign');
