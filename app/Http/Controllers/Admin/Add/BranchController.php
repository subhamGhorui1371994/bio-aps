<?php

namespace App\Http\Controllers\Admin\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BranchDtl;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;



use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


class BranchController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add Brach';
        $stateList = DB::table('state_list')->pluck('state_name', 'state_id');
        // $allBranch = BranchDtl::where('PREFIX', '!=', '')->pluck('BRANCH_NAME', 'ID');
        $branch = DB::table('branch_dtl')->where('PREFIX', '=', '')->get();
        // $branch = $branch[0];
        // $EMPLOYEE_CODE= $allBranch->pluck('EMPLOYEE_CODE');
        // dd($branch);
        // $session = get_admin_session();
        // dd($session);
        // $session['BRANCH_CODE'];
        return view('admin.add.branch.add-branch', compact('stateList', 'breadcrumb_title', 'branch'));
    }
    public function addBranch(Request $request)
    {
        $session = get_admin_session();
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
            return redirect('admin/branch')->withErrors($validator)->withInput();
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
            'STAMP' => $signature_path ?? null,
            'PREFIX' => $request->post('branch-bill-prefix'),
            'ADMINorBRANCH' => $session['ADMINorBRANCH'],
        ]);


        $branch->save();
        return redirect()->back()->withSuccess("Submit Successfully");
    }

    /**
     * @return Application|Factory|View
     */
    // public function create()
    // {
    //     $breadcrumb_title = 'Branch';
    //     $resourcePersonTypes = ['' => 'Select Type', 'Teaching Staff' => 'Teaching Staff', 'Non Teaching Staff' => 'Non Teaching Staff', 'Administrative' => 'Administrative'];

    //     return view('admin.branch.add', compact('breadcrumb_title', 'resourcePersonTypes'));
    // }

    /**
     * @param $branch
     * @return Application|Factory|View
     */
    public function edit($branch)
    {
        // p($branch);
        $breadcrumb_title = 'Branch';
        $resourcePersonTypes = ['' => 'Select Type', 'Teaching Staff' => 'Teaching Staff', 'Non Teaching Staff' => 'Non Teaching Staff', 'Administrative' => 'Administrative'];

        return view('admin.add.branch.edit', compact('breadcrumb_title', 'branch', 'resourcePersonTypes'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    // public function store(Request $request)
    // {
    //     // $validate_value['resource_person_type'] = $request->post('resource_person_type');
    //     // $validate_rule['resource_person_type'] = 'required';
    //     $validate_value['name'] = $request->post('name');
    //     $validate_rule['name'] = 'required';
    //     $validate_value['phone'] = $request->post('phone');
    //     $validate_rule['phone'] = 'required|email';
    //     $validate_value['email'] = $request->post('email');
    //     $validate_rule['email'] = 'required';
    //     $validate_value['subject'] = $request->post('subject');
    //     $validate_rule['subject'] = 'required';
    //     $validate_value['date'] = $request->post('date');
    //     $validate_rule['date'] = 'required';
    //     $validate_value['time'] = $request->post('time');
    //     $validate_rule['time'] = 'required';
    //     $validate_value['message'] = $request->post('message');
    //     $validate_rule['message'] = 'required';

    //     $validator = Validator::make($validate_value, $validate_rule);

    //     if ($validator->fails()) {
    //         $validation_errors = $validator->errors()->all();
    //         return redirect('admin/branch/create')->withErrors(implode(', ', $validation_errors));
    //     } else {

    //         $resource_person_type = $request->post('resource_person_type');
    //         $selectedCourses = $request->post('course') ?? [];

    //         if ($resource_person_type === 'Teaching Staff') {
    //             if (empty($selectedCourses)) {
    //                 return redirect()->back()->withErrors('If the Branch is teaching staff then course field is required. Please select at least one course.');
    //             }
    //         }

    //         $createData = [
    //             'resource_person_type' => $resource_person_type,
    //             'name' => $request->post('name'),
    //             'email' => $request->post('email') ?? 'NA',
    //             'mobile' => $request->post('mobile') ?? 'NA',
    //             'experience' => $request->post('experience') ?? 'NA',
    //             'designation' => $request->post('designation') ?? 'NA',
    //             'qualification' => $request->post('qualification') ?? 'NA',
    //             'salary' => $request->post('salary') ?? 'NA',
    //             'course' => json_encode($selectedCourses),
    //             'bed' => in_array('bed', $selectedCourses),
    //             'dled' => in_array('dled', $selectedCourses),
    //         ];

    //         $resourcePersonImage = $request->file('photo');

    //         if ($resourcePersonImage) {
    //             if (!in_array($resourcePersonImage->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
    //                 return redirect()->back()->withErrors('Please select only image file.');
    //             }
    //             $fileName = str_replace(' ', '-', strtolower($createData['name'])) . '-image-' . time() . '.' . $resourcePersonImage->extension();
    //             $resourcePersonImage->move(public_path('uploads/branch/'), $fileName);
    //             $createData['photo'] = 'uploads/branch/' . $fileName;
    //         } else {
    //             $createData['photo'] = 'assets/img/blank-profile-picture.png';
    //         }

    //         $branch = new BranchDtl();
    //         $branch->fill($createData);
    //         $branch->save();

    //         return redirect('admin/branch')->withSuccess('New image added successfully.');
    //     }
    // }

    /**
     * @param ResourcePerson $branch
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(BranchDtl $branch, Request $request)
    {
        $validate_value['name'] = $request->post('name');
        $validate_rule['name'] = 'required';
        $validate_value['phone'] = $request->post('phone');
        $validate_rule['phone'] = 'required';
        $validate_value['email'] = $request->post('email');
        $validate_rule['email'] = 'required|email';
        $validate_value['subject'] = $request->post('subject');
        $validate_rule['subject'] = 'required';
        $validate_value['date'] = $request->post('date');
        $validate_rule['date'] = 'required';
        $validate_value['time'] = $request->post('time');
        $validate_rule['time'] = 'required';
        $validate_value['message'] = $request->post('message');
        $validate_rule['message'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {
            $updateData = [
                'name' => $request->post('name'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email') ?? 'NA',
                'subject' => $request->post('subject'),
                'date' => $request->post('date'),
                'time' => $request->post('time'),
                'message' => $request->post('message') ?? 'NA',
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $branch->fill($updateData);
            $branch->save();

            return redirect('admin/branch')->withSuccess('Branch updated successfully.');
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
