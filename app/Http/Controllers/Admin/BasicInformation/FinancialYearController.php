<?php

namespace App\Http\Controllers\Admin\BasicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FinancialYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class FinancialYearController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('adminAfterLogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $breadcrumb_title = 'Financial Year';

        return view('admin.basic-information.financial_year.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function financial_year_list_ajax(Request $request)
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
                    $order_column = 'ID';
                }
                elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'FROM';
                }
                elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'TO';
                }
                elseif ($request->order[0]['column'] == 4) {
                    $order_column = 'NAME';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = FinancialYear::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }
    public function setFinancialYear($id){
        $selectedFy = FinancialYear::where('id', $id)->first();
        $currentSessionAuthValue= Session::get('admin');
        $currentSessionAuthValue['auth']['form']=$selectedFy->FROM;
        $currentSessionAuthValue['auth']['to']=$selectedFy->TO;
        $currentSessionAuthValue['auth']['yr_name']=$selectedFy->NAME;
        Session::put('admin',$currentSessionAuthValue);
        Session::put('success', 'Financial year '. $selectedFy->NAME . ' set successfully!');
        return redirect('admin/dashboard');
    }
}
