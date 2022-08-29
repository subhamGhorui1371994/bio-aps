<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\BasicInformation\BankDtlController;
use App\Http\Controllers\Admin\BasicInformation\BankListController;
use App\Http\Controllers\Admin\BasicInformation\EmployeeDtlController;
use App\Http\Controllers\Admin\BasicInformation\EmpDepartmentController;
use App\Http\Controllers\Admin\BasicInformation\CurrencyController;
use App\Http\Controllers\Admin\BasicInformation\ProductCategoryController;
use App\Http\Controllers\Admin\BasicInformation\ProductTypeController;
use App\Http\Controllers\Admin\BasicInformation\ProductUnitController;
use App\Http\Controllers\Admin\BasicInformation\StateListController;
use App\Http\Controllers\Admin\BasicInformation\AdminLogReportController;
use App\Http\Controllers\Admin\BasicInformation\FinancialYearController;
use App\Http\Controllers\Admin\BasicInformation\BranchDtlController;
use App\Http\Controllers\Admin\Setting\CompanyController;
use App\Http\Controllers\Admin\Quotation\AddQuotationController;


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
        Route::get('coming-soon', [AdminController::class, 'comingSoon'])->name('comingSoon');

        Route::model('BankDtl', 'App\Models\BankDtl');
        Route::resource('bank-dtl', 'App\Http\Controllers\Admin\BasicInformation\BankDtlController');
        Route::post('bank-dtl/get-list', [BankDtlController::class, 'bank_dtl_list_ajax']);
        Route::get('bank-dtl/delete/{id}', [BankDtlController::class, 'destroy']);
        // Route::get('bank-dtl/{ID}', [BankDtlController::class, 'BankDtlId']);
        // Route::get('bank-dtl-data/{ID}',[BankDtlController::class,'BankDtlData']);
        Route::get('bank-dtl/bank-dtl-data/{ID}', [BankDtlController::class, 'bankDtlData']); // list.blade note

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

        Route::model('Currency', 'App\Models\Currency');
        Route::resource('currency', 'App\Http\Controllers\Admin\BasicInformation\CurrencyController');
        Route::post('currency/get-list', [CurrencyController::class, 'currency_list_ajax']);
        Route::get('currency/delete/{id}', [CurrencyController::class, 'destroy']);

        Route::model('ProductCategory', 'App\Models\ProductCategory');
        Route::resource('product-category', 'App\Http\Controllers\Admin\BasicInformation\ProductCategoryController');
        Route::post('product-category/get-list', [ProductCategoryController::class, 'product_category_list_ajax']);
        Route::get('product-category/delete/{id}', [ProductCategoryController::class, 'destroy']);

        Route::model('ProductType', 'App\Models\ProductType');
        Route::resource('product-type', 'App\Http\Controllers\Admin\BasicInformation\ProductTypeController');
        Route::post('product-type/get-list', [ProductTypeController::class, 'product_type_list_ajax']);
        Route::get('product-type/delete/{id}', [ProductTypeController::class, 'destroy']);

        Route::model('ProductUnit', 'App\Models\ProductUnit');
        Route::resource('product-unit', 'App\Http\Controllers\Admin\BasicInformation\ProductUnitController');
        Route::post('product-unit/get-list', [ProductUnitController::class, 'product_unit_list_ajax']);
        Route::get('product-unit/delete/{id}', [ProductUnitController::class, 'destroy']);

        Route::model('StateList', 'App\Models\StateList');
        Route::resource('state-list', 'App\Http\Controllers\Admin\BasicInformation\StateListController');
        Route::post('state-list/get-list', [StateListController::class, 'state_list_list_ajax']);
        Route::get('state-list/delete/{id}', [StateListController::class, 'destroy']);

        Route::model('FinancialYear', 'App\Models\FinancialYear');
        Route::resource('financial-year', 'App\Http\Controllers\Admin\BasicInformation\FinancialYearController');
        Route::post('financial-year/get-list', [FinancialYearController::class, 'financial_year_list_ajax']);
        Route::get('financial-year/delete/{id}', [FinancialYearController::class, 'destroy']);
        Route::get('financial-year/set-financial-year/{id}', [FinancialYearController::class, 'setFinancialYear']);

        Route::get('branch_dtl/set-branch-name/{id}', [BranchDtlController::class, 'setBranchName']);


        Route::get('quotation', [AddQuotationController::class, 'index']);
        Route::post('add-quotation', [AddQuotationController::class, 'addAddQuotation']);

        // Route::get('company', [CompanyController::class, 'index']);

        Route::model('CompanyDtl', 'App\Models\CompanyDtl');
        Route::resource('company', 'App\Http\Controllers\Admin\Setting\CompanyController');
        Route::post('company/get-list', [CompanyController::class, 'company_list_ajax']);
        Route::get('company/delete/{id}', [CompanyController::class, 'destroy']);

        Route::post('add-company', [CompanyController::class, 'addCompany']);
    });
});
// Route::get('bank-dtl-data/{ID}',[BankDtlController::class,'BankDtlData']);
