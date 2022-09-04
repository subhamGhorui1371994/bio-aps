<?php

namespace App\Http\Controllers\Admin\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BranchDtl;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class BranchController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add Brach';
        $stateList = DB::table('state_list')->pluck('state_name', 'state_id');
        $allBranchData = DB::table('branch_dtl')->get();
        // $allBranchData = $allBranchData[0];
        // $EMPLOYEE_CODE= $allBranch->pluck('EMPLOYEE_CODE');
        // dd($allBranchData);
        return view('admin.add.add-branch', compact('stateList', 'breadcrumb_title','allBranchData'));
    }
    public function addBranch(Request $request)
    {
        $validator = Validator::make(
            [

                'EMPLOYEE_CODE' => '',
                'BRANCH_CODE' => '',
                'BRANCH_NAME' => $request->post('branch-name'),
                'USERNAME' => '',
                'LOGIN_PASSWORD' => '',
                'EMAIL' => $request->post('email'),
                'TXT_PASS' => '',
                'BR_DATE' => $request->post('date'),
                'BR_CONTACT_PERSON' => $request->post('branch-person'),
                'BR_PHONE' => $request->post('number'),
                'BR_ADDRESS' => $request->post('address'),
                'BR_COUNTRY' => $request->post('country'),
                'BR_STATE' => $request->post('state'),
                'BR_CITY' => $request->post('city'),
                'BR_PIN' => $request->post('pin'),
                'BR_GST' => $request->post('gst'),
                'STAMP' => '',
                'PREFIX' => $request->post('branch-bill-prefix'),
                'ADMINorBRANCH' => '',
            ],
            [
                // 'EMPLOYEE_CODE' => 'required',
                // 'BRANCH_CODE' => 'required',
                'BRANCH_NAME' => 'required',
                // 'USERNAME' => 'required',
                // 'LOGIN_PASSWORD' => 'required',
                'EMAIL' => 'required',
                // 'TXT_PASS' => 'required',
                'BR_DATE' => 'required',
                'BR_CONTACT_PERSON' => 'required',
                'BR_PHONE' => 'required',
                'BR_ADDRESS' => 'required',
                'BR_COUNTRY' => 'required',
                'BR_STATE' => 'required',
                'BR_CITY' => 'required',
                'BR_PIN' => 'required',
                'BR_GST' => 'required',
                // 'STAMP' => 'required',
                'PREFIX' => 'required',
                // 'ADMINorBRANCH' => 'required',

            ]
        );

        if ($validator->fails()) {
            return redirect('admin/add-branch')->withErrors($validator)->withInput();
        }

        $signature_file = $request->file('signature');

        if ($signature_file) {
            $fileName = 'branch-' . time() . '-' . unique_id() . '.' . $signature_file->extension();
            $signature_file->move(public_path('assets/admin/branch/'), $fileName);
            $signature_path = 'assets/admin/branch/' . $fileName;
        }

        $branch = new BranchDtl();

        // $branch->EMPLOYEE_CODE = '';
        // $branch->BRANCH_CODE = '';
        // $branch->BRANCH_NAME = $request->post('branch-name');
        // $branch->USERNAME = '';
        // $branch->LOGIN_PASSWORD = '';
        // $branch->EMAIL = $request->post('email');
        // $branch->TXT_PASS = '';
        // $branch->BR_DATE = $request->post('date');
        // $branch->BR_CONTACT_PERSON = $request->post('branch-person');
        // $branch->BR_PHONE = $request->post('number');
        // $branch->BR_ADDRESS = $request->post('address');
        // $branch->BR_COUNTRY = $request->post('country');
        // $branch->BR_STATE = $request->post('state');
        // $branch->BR_CITY = $request->post('city');
        // $branch->BR_PIN = $request->post('pin');
        // $branch->BR_GST = $request->post('gst');
        // $branch->STAMP = '';
        // $branch->PREFIX = $request->post('branch-bill-prefix');
        // $branch->ADMINorBRANCH = '';


        $branch->fill([
            'EMPLOYEE_CODE' => '',
            'BRANCH_CODE' => '',
            'BRANCH_NAME' => $request->post('branch-name'),
            'USERNAME' => '',
            'LOGIN_PASSWORD' => '',
            'EMAIL' => $request->post('email'),
            'TXT_PASS' => '',
            'BR_DATE' => $request->post('date'),
            'BR_CONTACT_PERSON' => $request->post('branch-person'),
            'BR_PHONE' => $request->post('number'),
            'BR_ADDRESS' => $request->post('address'),
            'BR_COUNTRY' => $request->post('country'),
            'BR_STATE' => $request->post('state'),
            'BR_CITY' => $request->post('city'),
            'BR_PIN' => $request->post('pin'),
            'BR_GST' => $request->post('gst'),
            'STAMP' => $signature_path ?? null,
            'PREFIX' => $request->post('branch-bill-prefix'),
            'ADMINorBRANCH' => '',
        ]);


        $branch->save();
        return redirect()->back()->withSuccess("Submit Successfully");
    }
}
