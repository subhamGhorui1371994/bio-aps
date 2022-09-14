<?php

namespace App\Http\Controllers\Admin\BasicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductUnit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;


class ProductUnitController extends Controller
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
        $breadcrumb_title = 'Basic Information / Product Unit';

        return view('admin.basic-information.product_unit.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function product_unit_list_ajax(Request $request)
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
                    $order_column = 'UNIT_ID';
                }
                elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'UNIT_NAME';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = ProductUnit::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }

    public function save(Request $request)
    {
        $session = get_admin_session();
        // p($request->post('type'));
        $validator = Validator::make(

            [
                'UNIT_NAME' => $request->post('unit-name'),
            ],
            [
                'UNIT_NAME' => 'required',
            ]

        );

        if ($validator->fails()) {
            return redirect('admin/add-product-preferences')->withErrors($validator)->withInput();
        }
        $unit = new ProductUnit();
        $unit->fill([

                'UNIT_NAME' => $request->post('unit-name'),
        ]);

        // p($priceList);
        $unit->save();
        return redirect()->back()->withSuccess("Product Unit Added Successfully");
    }
}
