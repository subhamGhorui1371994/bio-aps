<?php

namespace App\Http\Controllers\Admin\BasicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;


class ProductCategoryController extends Controller
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
        $breadcrumb_title = 'Basic Information / Product Category';

        return view('admin.basic-information.product_category.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function product_category_list_ajax(Request $request)
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
                    $order_column = 'CAT_ID';
                }
                elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'CATEGORY_NAME';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = ProductCategory::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }
    public function save(Request $request)
    {
        $validator = Validator::make(

            [
                'CATEGORY_NAME' => $request->post('category-name'),
            ],
            [
                'CATEGORY_NAME' => 'required',
            ]

        );

        if ($validator->fails()) {
            return redirect('admin/add-product-preferences')->withErrors($validator)->withInput();
        }
        $category = new ProductCategory();
        $category->fill([

                'CATEGORY_NAME' => $request->post('category-name'),
        ]);

        $category->save();
        return redirect()->back()->withSuccess("Product Category Added Successfully");
    }
}
