<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BranchDtl;
use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


class BranchController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add Branch';
        $stateList = DB::table('state_list')->pluck('state_name', 'state_id');
        $branch = DB::table('branch_dtl')->where('PREFIX', '!=', '')->get();

        return view('admin.branch.add-branch', compact('stateList', 'breadcrumb_title', 'branch'));
    }
    public function addBranch(Request $request)
    {
        $session = get_admin_session();
        $validator = Validator::make(
            [
                'BRANCH_NAME' => $request->post('branch-name'),
                'EMAIL' => $request->post('email'),
                'BR_DATE' => $request->post('date'),
                'BR_CONTACT_PERSON' => $request->post('branch-person'),
                'BR_PHONE' => $request->post('number'),
                'BR_ADDRESS' => $request->post('address'),
                'BR_COUNTRY' => $request->post('country'),
                'BR_STATE' => $request->post('state'),
                'BR_CITY' => $request->post('city'),
                'BR_PIN' => $request->post('pin'),
                'BR_GST' => $request->post('gst'),
                'PREFIX' => $request->post('branch-bill-prefix')
            ],
            [
                'BRANCH_NAME' => 'required',
                'EMAIL' => 'required',
                'BR_DATE' => 'required',
                'BR_CONTACT_PERSON' => 'required',
                'BR_PHONE' => 'required',
                'BR_ADDRESS' => 'required',
                'BR_COUNTRY' => 'required',
                'BR_STATE' => 'required',
                'BR_CITY' => 'required',
                'BR_PIN' => 'required',
                'BR_GST' => 'required',
                'PREFIX' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/branch')->withErrors($validator)->withInput();
        }

        $signature_file = $request->file('signature');

        if ($signature_file) {
            $fileName = 'branch-' . time() . '-' . unique_id() . '.' . $signature_file->extension();
            $signature_file->move(public_path('assets/admin/branch/'), $fileName);
            $signature_path = 'assets/admin/branch/' . $fileName;
        }

        $branch = new BranchDtl();

        $branch->fill([
            // 'EMPLOYEE_CODE' => $session['EMP'],
            'EMPLOYEE_CODE' => '',
            // 'BRANCH_CODE' => $session['BRANCH_CODE'],
            'BRANCH_CODE' => '',
            'BRANCH_NAME' => $request->post('branch-name'),
            // 'USERNAME' => $session['userMail'],
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
            'signature' => $signature_path ?? null,
            'PREFIX' => $request->post('branch-bill-prefix'),
            // 'ADMINorBRANCH' => $session['ADMINorBRANCH'],
            'ADMINorBRANCH' => '',
        ]);


        $branch->save();
        return redirect()->back()->withSuccess("Submit Successfully");
    }



    /**
     * @param $branchID
     * @return Application|Factory|View
     */
    public function edit($branchID)
    {
        $branchData = DB::table('branch_dtl')->find($branchID);
        $stateList = DB::table('state_list')->pluck('state_name', 'state_id');
        $breadcrumb_title = 'Add / Branch / Edit';

        return view('admin.branch.edit', compact('breadcrumb_title', 'branchData', 'stateList'));
    }

    /**
     * @param ResourcePerson $branch
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(BranchDtl $branch, Request $request)
    {
        $session = get_admin_session();
        $validator = Validator::make(
            [
                'BRANCH_NAME' => $request->post('branch-name'),
                'EMAIL' => $request->post('email'),
                'BR_DATE' => $request->post('date'),
                'BR_CONTACT_PERSON' => $request->post('branch-person'),
                'BR_PHONE' => $request->post('number'),
                'BR_ADDRESS' => $request->post('address'),
                'BR_COUNTRY' => $request->post('country'),
                'BR_STATE' => $request->post('state'),
                'BR_CITY' => $request->post('city'),
                'BR_PIN' => $request->post('pin'),
                'BR_GST' => $request->post('gst'),
                'PREFIX' => $request->post('branch-bill-prefix'),
            ],
            [
                'BRANCH_NAME' => 'required',
                'EMAIL' => 'required',
                'BR_DATE' => 'required',
                'BR_CONTACT_PERSON' => 'required',
                'BR_PHONE' => 'required',
                'BR_ADDRESS' => 'required',
                'BR_COUNTRY' => 'required',
                'BR_STATE' => 'required',
                'BR_CITY' => 'required',
                'BR_PIN' => 'required',
                'BR_GST' => 'required',
                'PREFIX' => 'required',

            ]
        );

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $signature_file = $request->file('signature');

            if ($signature_file) {
                $fileName = 'branch-' . time() . '-' . unique_id() . '.' . $signature_file->extension();
                $signature_file->move(public_path('assets/admin/branch/'), $fileName);
                $signature_path = 'assets/admin/branch/' . $fileName;


                $updateData = [
                    'EMPLOYEE_CODE' => $session['EMP'],
                    'BRANCH_CODE' => $session['BRANCH_CODE'],
                    'BRANCH_NAME' => $request->post('branch-name'),
                    'USERNAME' => $session['userMail'],
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
                    'signature' => $signature_path ?? null,
                    'PREFIX' => $request->post('branch-bill-prefix'),
                    'ADMINorBRANCH' => $session['ADMINorBRANCH'],
                ];
                $branch->fill($updateData);
                $branch->save();

                return redirect('admin/branch')->withSuccess('Branch updated successfully.');
            } else {

                $updateData = [
                    'EMPLOYEE_CODE' => $session['EMP'],
                    'BRANCH_CODE' => $session['BRANCH_CODE'],
                    'BRANCH_NAME' => $request->post('branch-name'),
                    'USERNAME' => $session['userMail'],
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
                    // 'signature' => $signature_path ?? null,
                    'PREFIX' => $request->post('branch-bill-prefix'),
                    'ADMINorBRANCH' => $session['ADMINorBRANCH'],
                ];
                $branch->fill($updateData);
                $branch->save();

                return redirect('admin/branch')->withSuccess('Branch updated successfully.');
            }
        }
    }

    /**
     * @param $ID
     * @param ResourcePerson $branch
     * @return mixed
     */
    public function destroy($ID, BranchDtl $branch)
    {
        $branch->destroy($ID);

        return redirect()->back()->withSuccess('Branch deleted successfully!!');
    }
}
