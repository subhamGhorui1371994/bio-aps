<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add Vendor';
        $stateList = DB::table('state_list')->pluck('state_name', 'state_id');
        $employeeName = DB::table('employee_dtl')->pluck('EMPLOYEE_NAME','ID');
        // $branch = DB::table('branch_dtl')->where('PREFIX', '!=', '')->get();

        return view('admin.vendor.vendor', compact('stateList', 'breadcrumb_title','employeeName'));
    }
}
