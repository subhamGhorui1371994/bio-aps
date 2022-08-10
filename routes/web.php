<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\BasicInformation\BankDtlController;
use App\Http\Controllers\Admin\BasicInformation\BankListController;
use App\Http\Controllers\Admin\BasicInformation\EmployeeDtlController;
use App\Http\Controllers\Admin\BasicInformation\EmpDepartmentController;


Route::get('/', function () {
    return redirect('/admin');
});

Route::get('admin', [AdminAuthController::class, 'getLogin']);


Route::group(['prefix' => 'admin'], function () {

    Route::get('logout', [AdminAuthController::class, 'logout'])->name('adminLogout');

    Route::group(['middleware' => ['adminauth']], function () {
        Route::get('login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
        Route::post('login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    });

    Route::group(['middleware' => ['adminAfterLogin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::model('BankDtl', 'App\Models\BankDtl');
        Route::resource('bank-dtl', 'App\Http\Controllers\Admin\BasicInformation\BankDtlController');
        Route::post('bank-dtl/get-list', [BankDtlController::class, 'bank_dtl_list_ajax']);
        Route::get('bank-dtl/delete/{id}', [BankDtlController::class, 'destroy']);
        // Route::get('bank-dtl/{ID}', [BankDtlController::class, 'BankDtlId']);
        // Route::get('bank-dtl-data/{ID}',[BankDtlController::class,'BankDtlData']);
        Route::get('bank-dtl/bank-dtl-data/{ID}',[BankDtlController::class,'bankDtlData']); // list.blade note

        Route::model('BankList', 'App\Models\BankList');
        Route::resource('bank-list', 'App\Http\Controllers\Admin\BasicInformation\BankListController');
        Route::post('bank-list/get-list', [BankListController::class, 'bank_list_list_ajax']);
        Route::get('bank-list/delete/{id}', [BankListController::class, 'destroy']);

        Route::model('EmployeeDtl', 'App\Models\EmployeeDtl');
        Route::resource('employee-dtl', 'App\Http\Controllers\Admin\BasicInformation\EmployeeDtlController');
        Route::post('employee-dtl/get-list', [EmployeeDtlController::class, 'employee_dtl_list_ajax']);
        Route::get('employee-dtl/delete/{id}', [EmployeeDtlController::class, 'destroy']);

        Route::model('EmpDepartment', 'App\Models\EmpDepartment');
        Route::resource('emp-department', 'App\Http\Controllers\Admin\BasicInformation\EmpDepartmentController');
        Route::post('emp-department/get-list', [EmpDepartmentController::class, 'emp_department_list_ajax']);
        Route::get('emp-department/delete/{id}', [EmpDepartmentController::class, 'destroy']);
    });
});
// Route::get('bank-dtl-data/{ID}',[BankDtlController::class,'BankDtlData']);
