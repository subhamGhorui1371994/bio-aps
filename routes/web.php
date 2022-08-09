<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\BasicInformation\BankDtlController;
use App\Http\Controllers\Admin\BasicInformation\BankListController;





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

        Route::model('BankList', 'App\Models\BankList');
        Route::resource('bank-list', 'App\Http\Controllers\Admin\BasicInformation\BankListController');
        Route::post('bank-list/get-list', [BankListController::class, 'bank_list_list_ajax']);
        Route::get('bank-list/delete/{id}', [BankListController::class, 'destroy']);
    });
});
