<?php

namespace App\Http\Controllers\Admin\Quotation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddQuotationController extends Controller
{

    public function index(){
        $validityArray = [
          '30' => '30 Days',
          '60' => '60 Days',
          '90' => '90 Days',
          '120' => '120 Days',
          '180' => '180 Days',
          '365' => '365 Days',
        ];
        $allCustomer = DB::table('employee_dtl')->pluck('EMPLOYEE_NAME', 'ID');

        return view('admin.Quotation.add-quotation', compact('allCustomer', 'validityArray'));
    }

    public function addAddQuotation(Request $request)
    {

        $validator = Validator::make(
            [
                'currency' => $request->post('currency'),
                'name' => $request->post('name'),
                'designation' => $request->post('designation'),
                'department' => $request->post('department'),
                'kindAttention' => $request->post('kind-attention'),
                'enquiryNo' => $request->post('enquiry-no'),
                'quotationNo' => $request->post('quotation-no'),
                'date' => $request->post('date'),
                'days' => $request->post('days'),
                'email' => $request->post('email'),
                'customer' => $request->post('customer'),
                'salesPerson' => $request->post('sales-person'),
            ],
            [
                'currency' => 'required',
                'name' => 'required',
                'designation' => 'required',
                'department' => 'required',
                'kindAttention' => 'required',
                'enquiryNo' => 'required',
                // 'quotationNo' => 'required',
                'date' => 'required',
                'days' => 'required',
                'customer' => 'required',
                // 'salesPerson' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/quotation')->withErrors($validator)->withInput();
        }
        return redirect()->back()->withSuccess("Submit Successfully");
        // p('success form submit');
    }
}
