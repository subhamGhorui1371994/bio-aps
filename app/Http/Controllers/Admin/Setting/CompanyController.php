<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDtl;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $breadcrumb_title = 'Setting / Add Company';
        $isAdmin = false;
        $session = get_admin_session();
        if ($session['userMail']='admin') {
            $isAdmin = true;
        }
        return view('admin.setting.company',compact('isAdmin','breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function company_list_ajax(Request $request)
    {
        $limit = $offset = 0;

        $order_column_by = $order_column = $search = '';

        if (isset($request->start)) {
            $offset = $request->start;
        }
        if (isset($request->length)) {
            $limit = $request->length;
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['dir'])) {
                $order_column_by = $request->order[0]['dir'];
            }
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['column'])) {
                if ($request->order[0]['column'] == 0) {
                    $order_column = 'CO_NAME';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'ADDRESS';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'EMAIL';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = CompanyDtl::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }
    public function support_company_list_ajax(Request $request)
    {
        $limit = $offset = 0;

        $order_column_by = $order_column = $search = '';

        if (isset($request->start)) {
            $offset = $request->start;
        }
        if (isset($request->length)) {
            $limit = $request->length;
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['dir'])) {
                $order_column_by = $request->order[0]['dir'];
            }
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['column'])) {
                if ($request->order[0]['column'] == 0) {
                    $order_column = 'CO_NAME';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'ADDRESS';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'EMAIL';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = CompanyDtl::getListSupportDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }

    public function addCompany(Request $request)
    {

        $validator = Validator::make(
            [
                'name' => $request->post('name'),
                'address' => $request->post('address'),
                'country' => $request->post('country'),
                'state' => $request->post('state'),
                'pin' => $request->post('pin'),
                'contact' => $request->post('contact'),
                'email' => $request->post('email'),
                'gstin' => $request->post('gstin'),
                'pan' => $request->post('pan'),
                'url' => $request->post('url'),
            ],
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'country' => 'required',
                'state' => 'required',
                'pin' => 'required|min:4|max:6',
                'contact' => 'required',
                'email' => 'required|email',
                'gstin' => 'required',
                'pan' => 'required',
                'url' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect('admin/company')->withErrors($validator)->withInput();
        }

        $company = new CompanyDtl();

        $company->CO_NAME = $request->post('name');
        $company->CO_LOGO = '';
        $company->ADDRESS = $request->post('address');
        $company->COUNTRY = $request->post('country');
        $company->STATE = $request->post('state');
        $company->CITY = $request->post('city');
        $company->PIN = $request->post('pin');
        $company->PHONE = $request->post('contact');
        $company->EMAIL = $request->post('email');
        $company->GSTIN = $request->post('gstin');
        $company->PAN = $request->post('pan');
        $company->URL = $request->post('url');

        $company->save();
        return redirect()->back()->withSuccess("Submit Successfully");
    }
    public function show($ID, Request $request){
        $companyDtlData = CompanyDtl::where('ID', $ID)->first();
        return view('admin.setting.company-details', compact('companyDtlData'));
    }
}
