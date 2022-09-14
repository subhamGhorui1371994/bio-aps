<?php

namespace App\Http\Controllers\admin\add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductUnit;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add Product Preferences';
        // $unit=ProductUnit::where('ID', $ID)->first();
        // $category=ProductCategory::where('ID', $ID)->first();
        // $type=ProductType::where('ID', $ID)->first();
        // $unit = DB::table('product_unit')->where('UNIT_NAME', 'UNIT_ID ')->first();
        // p($unit);
        $unit = DB::table('product_unit')->get();
        $category = DB::table('product_category')->get();
        $type = DB::table('product_type')->get();
        return view('admin.add.category', compact('breadcrumb_title', 'unit','category','type'));
    }
    public function save(Request $request)
    {
        $session = get_admin_session();
        // p($request->post('type'));
        $validator = Validator::make(

            [
                'UNIT_NAME' => $request->post('unitName'),
            ],
            [
                'UNIT_NAME' => 'required',
            ]

        );

        if ($validator->fails()) {
            return redirect('admin/category')->withErrors($validator)->withInput();
        }
        $unit = new ProductUnit();
        $unit->fill([

                'UNIT_NAME' => $request->post('unitName'),
        ]);

        // p($priceList);
        $unit->save();
        return redirect()->back()->withSuccess("Price List Added Successfully");
    }
}
