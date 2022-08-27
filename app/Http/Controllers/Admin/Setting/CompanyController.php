<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.setting.company');

    }
    public function addCompany(Request $request){

        $validator = Validator::make(
            [
                'name' => $request->post('name'),
                'address' => $request->post('address'),
                'country' => $request->post('country'),
                'state' => $request->post('state'),
                'pin' => $request->post('pin'),
                'email' => $request->post('message'),
                'contactno' => $request->post('contactno'),
                'gstin' => $request->post('gstin'),
                'pan' => $request->post('pan'),
                'companyurl' => $request->post('companyurl'),
            ],
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'country' => 'required',
                'state' => 'required',
                'pin' => 'required|min:7|max:7',
                'email' => 'required|email',
                'contact' => 'required|min:10|max:10',
                'gstin' => 'required',
                'pan' => 'required',
                'companyurl' => 'required|url',
            ]
        );
        if ($validator->fails()) {
            return redirect('admin/company')->withErrors($validator)->withInput();
        }
    }

}
