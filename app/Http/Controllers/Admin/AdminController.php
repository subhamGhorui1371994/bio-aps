<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BranchDtl;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAfterLogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard(Request $request)
    {
        $breadcrumb_title = 'Dashboard';
        $allFy = DB::table('financial_year')->pluck('NAME','ID');
        $allBranch = BranchDtl::where('PREFIX', '!=', '')->get();
        $sessionData = Session::get('admin');
        $currentFy=$sessionData['auth']['yr_name'];
        $currentBranchCode = $sessionData['auth']['BRANCH_CODE'];

        return view('admin.dashboard', compact('breadcrumb_title','allFy','currentFy', 'currentBranchCode'));
    }
    public function comingSoon(){
        $selectedFy = DB::table('financial_year')->pluck('NAME','ID');
        return view('admin.coming-soon', compact('selectedFy'));
    }

    /**
     * Show change password view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function changePassword()
    {
        $breadcrumb_title = 'Change Password';

        return view('admin.change-password', compact('breadcrumb_title'));
    }

    public function dbSync()
    {
        $data = [
            [
                'branch_dtl_id' => 1,
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@hotmail.com',
                'password' => '$2a$12$qSKf4zKq/UnTZH8469b/F.G.PmNhdCg.gI6pgMry9H.pYkQ6Runiu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 2,
                'name' => 'oriss',
                'username' => 'oriss',
                'email' => 'oriss@hotmail.com',
                'password' => '$2a$12$5SIoi0DZs9PzKJkbHy/DdOp9j79kfTYWnKSNvNl/lYossGx97XTU2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 3,
                'name' => 'assa',
                'username' => 'assa',
                'email' => 'assa@hotmail.com',
                'password' => '$2a$12$aXJK.1DIVu.9rw0hTNAbeOJfOZHVvO8bpmDCLFJX7A3n8uHN.yX3y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 12,
                'name' => 'tripur',
                'username' => 'tripur',
                'email' => 'tripur@hotmail.com',
                'password' => '$2a$12$MkDReCJfjQm.P6tV1QrAK.t2ldVntGfxWi46i/6LT46dtvkD.QU/a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 15,
                'name' => 'parthik',
                'username' => 'parthik',
                'email' => 'parthik@hotmail.com',
                'password' => '$2a$12$GBEXvbRrCAxwFRhtwOauju1lfqMvaxlVm0U4A4fRK8zeFQkPMqPZe',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 17,
                'name' => 'srijit',
                'username' => 'srijit',
                'email' => 'srijit@hotmail.com',
                'password' => '$2a$12$kVZwSrJwVWG68jRhnOs79e5TfaIvhNvSXvqZ1o7qEGlVtwb5v9yaq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 19,
                'name' => 'sampa',
                'username' => 'sampa',
                'email' => 'sampa@hotmail.com',
                'password' => '$2a$12$zrP5z1ieZdG9d/TbQf5b..xjxL98TOF/HTgoV4Ng0NC1RRQwA8u56',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'branch_dtl_id' => 20,
                'name' => 'Arnab32',
                'username' => 'Arnab32',
                'email' => 'arnab32@hotmail.com',
                'password' => '$2a$12$Jf70ZXSBQSbWHdb.ueP/2.WkoCjV8qhPzPIFSp5G23LHJ1v1/X21K',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        // test
        foreach ($data as $i => $item) {
            $Admin = new Admin();
            $Admin->fill($item);
            $Admin->save();
        }
    }

}
