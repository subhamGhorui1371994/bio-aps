<?php

namespace App\Http\Controllers\Admin\Quotation;

use App\Models\BankDtl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class QuotationController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        // We will add Quotation list.
    }

    public function searchCustomer(Request $request)
    {
        $searchString = $request->get('q');
        $data = DB::select("SELECT * FROM `customer_dtl` WHERE (`CUSTOMER_NAME` LIKE '%$searchString%')  AND `APPROVAL`=1 ORDER BY `CUSTOMER_NAME` ASC");
        if(!empty($data)) {
            $processedData = [];
            foreach ($data as $key => $value) {
                $processedData[] = [
                    'id' => $value->CUSTOMER_CODE,
                    'text' => $value->CUSTOMER_NAME,
                    'data' => $value
                ];
            }
        } else {
            $processedData = $data;
        }
        return json_encode($processedData);
    }

    public function searchPartNo(Request $request)
    {
        $searchString = $request->get('q');
        $data = DB::select("SELECT * FROM `product` WHERE (`PART_NO` LIKE '%$searchString%') AND `YEAR`!='' ORDER BY `PART_NO` LIMIT 1000");
        if(!empty($data)) {
            $processedData = [];
            foreach ($data as $key => $value) {
                $processedData[] = [
                    'id' => $value->ID,
                    'text' => $value->YEAR . '-' . $value->PART_NO . '-' . $value->VEN_CODE,
                    'data' => $value
                ];
            }
        } else {
            $processedData = $data;
        }
        return json_encode($processedData);
    }

    public function searchProducts(Request $request)
    {
        $searchString = $request->get('q');
        $data = DB::select("SELECT * FROM `product` WHERE `DESCRIPTION` LIKE '%$searchString%' ORDER BY `DESCRIPTION` ASC LIMIT 10");
        if(!empty($data)) {
            $processedData = [];
            foreach ($data as $key => $value) {
                $processedData[] = [
                    'id' => $value->ID,
                    'text' => $value->YEAR . '-' . $value->PART_NO . '-' . $value->VEN_CODE,
                    'data' => $value
                ];
            }
        } else {
            $processedData = $data;
        }
        return json_encode($processedData);
    }

    public function addAddQuotation(Request $request)
    {
        $validityArray = [
            '30' => '30 Days',
            '60' => '60 Days',
            '90' => '90 Days',
            '120' => '120 Days',
            '180' => '180 Days',
            '365' => '365 Days',
        ];
        $session = get_admin_session();

        $quotationNo = "BioQuot/1/" . $session['yr_name'];
        // When we run a raw sql query.
        $maxBill = DB::select("SELECT MAX(BILL_ID+1) AS bill_id FROM `quotation_cust_dtl` WHERE `YEAR`='" . $session['yr_name'] . "' AND `BR_CODE`='" . $session['BRANCH_CODE'] . "' ");

        if (!empty($maxBill[0])) {
            if (!empty($maxBill[0]->bill_id)) {
                $quotationNo = "BioQuot/" . $maxBill[0]->bill_id . "/" . $session['yr_name'];
            }
        }
        // $todayDatessz=date('Y-m-d'); if($todayDatessz>=$_SESSION['from'] && $todayDatessz<=$_SESSION['to']){ $Dayz=$todayDatessz; } else { $Dayz=$_SESSION['to']; }
        $allCurrencies = DB::table('currency')->pluck('NAME', 'PRICE_CURRENCY');
        $allCustomer = DB::table('employee_dtl')->pluck('EMPLOYEE_NAME', 'ID');
        $productUnits = DB::table('product_unit')->pluck('UNIT_NAME', 'UNIT_NAME');
        $vendor_dtl = DB::table('vendor_dtl')->get();
        $bankList = BankDtl::where("CO_ID", 1)->get();
        return view('admin.quotation.add-quotation', compact('allCustomer', 'vendor_dtl', 'productUnits','allCurrencies', 'validityArray', 'quotationNo', 'bankList'));
    }

    /**
     * Insert Quotation
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
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
