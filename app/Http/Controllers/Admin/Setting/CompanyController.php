<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyDtl;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.setting.company');

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
                }
                elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'ADDRESS';
                }
                elseif ($request->order[0]['column'] == 2) {
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
            // "supportedCompany" => $details['supportedCompany'],
        ]);
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
