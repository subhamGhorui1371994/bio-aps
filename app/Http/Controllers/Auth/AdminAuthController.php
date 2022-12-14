<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\BranchDtl;
use App\Models\UserPermissions;
use App\Models\FinancialYear;

use App\Models\AdminLogReport;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    /**
     * Validate login process
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // admin@hotmail.com admin@ml
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = auth()->guard('admin')->user();

            $branchDtl = BranchDtl::where('ID', $user->branch_dtl_id)->first();
            if (!empty($branchDtl)) {

                $UserPermissions = UserPermissions::where(['EMP_CODE' => $branchDtl->EMPLOYEE_CODE])->first();

                if (!empty($UserPermissions)) {
                    if ($UserPermissions->STATUS) {
                        $financialYear = FinancialYear::orderBy('ID', 'desc')->first();
                        $session['auth'] = [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'logged_in' => true,
                            'from' => $financialYear->FROM,
                            'to' => $financialYear->TO,
                            'yr_name' => $financialYear->NAME,
                            'userMail' => $branchDtl->USERNAME,
                            'EMP' => $branchDtl->EMPLOYEE_CODE,
                            'login_timestamp' => time(),
                            'ADMINorBRANCH' => $branchDtl->ADMINorBRANCH,
                            'BRANCH_CODE' => $branchDtl->BRANCH_CODE,
                            'BRANCH_NAME' => $branchDtl->BRANCH_NAME,
                            'chk' => true,
                            'power' => [
                                'PURCHASE' => $UserPermissions->PURCHASE,
                                'SALES' => $UserPermissions->SALES,
                                'PAYMENT' => $UserPermissions->PAYMENT,
                                'QUOTATION' => $UserPermissions->QUOTATION,
                                'ACCOUNTS' => $UserPermissions->ACCOUNTS,
                                'REPORT' => $UserPermissions->REPORT,
                                'ADDS' => $UserPermissions->ADDS,
                                'BRANCH' => $UserPermissions->BRANCH
                            ]
                        ];

                        Session::put('admin',$session);
                        Session::put('success', 'Logged in successfully.');

                        $AdminLogReport = new AdminLogReport();

                        $AdminLogReport->username = $branchDtl->USERNAME;
                        $AdminLogReport->branch_name = $branchDtl->BRANCH_NAME;
                        $AdminLogReport->IP = $request->ip();
                        $AdminLogReport->timestamp = date("h:i:s:a");
                        $AdminLogReport->date = date("Y-m-d");
                        $AdminLogReport->logout = '';
                        $AdminLogReport->save();

                        return redirect()->route('dashboard');
                    } else {
                        return back()->with('error', 'Your given username or password is wrong.');
                    }
                } else {
                    return back()->with('error', 'user permission not found.');
                }
            } else {
                return back()->with('error', 'Your given username or password is wrong.');
            }
        } else {
            return back()->with('error', 'Your given username or password is wrong.');
        }
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Logout admin user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'Logout successfully.');
        return redirect(route('adminLogin'));
    }
}
