<?php

namespace App\Http\Controllers\Admin\BasicInformation;

use App\Models\BranchDtl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BranchDtlController extends Controller
{

    public function setBranchCode($id){
        $selectedBranchCode = BranchDtl::where('id', $id)->first();

        $currentSessionAuthValue= Session::get('admin');
        $currentSessionAuthValue['auth']['BRANCH_CODE']=$selectedBranchCode->BRANCH_CODE;

        Session::put('admin',$currentSessionAuthValue);
        Session::put('success', 'Branch Code '. $selectedBranchCode->BRANCH_CODE . ' set successfully!');
        return redirect()->back();
    }
}
