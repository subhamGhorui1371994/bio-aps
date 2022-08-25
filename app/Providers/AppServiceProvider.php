<?php

namespace App\Providers;

use App\Models\BranchDtl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $BranchDtl = BranchDtl::first();
        $xyz = $BranchDtl["USERNAME"];

        View::share('testdata', $xyz);
    }
}
