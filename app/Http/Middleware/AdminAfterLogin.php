<?php

namespace App\Http\Middleware;

use App\Models\BranchDtl;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AdminAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = get_admin_session();

        if (empty($session)) {
            return redirect('admin/login');
        }

        View::composer('*', function ($view) {
            $allFy = DB::table('financial_year')->pluck('NAME', 'ID');
            $allBranch = BranchDtl::where('PREFIX', '!=', '')->pluck('BRANCH_NAME', 'ID');
            $session = get_admin_session();
            $currentFy = $session['yr_name'];
            $currentBranchCode = $session['BRANCH_CODE'];
            $currentBranchName = $session['BRANCH_NAME'];
            $view->with(['allFy' => $allFy, 'allBranch' => $allBranch,'currentFy' => $currentFy, 'currentBranchCode' => $currentBranchCode, 'currentBranchName' => $currentBranchName]);
        });

        return $next($request);
    }

}
