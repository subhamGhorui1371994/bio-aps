<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $breadcrumb_title = 'Add / Add PriceList';
        $productVendorNames = DB::table('product')->pluck('VEN_NAME', 'ID')->unique();
        $priceList = Product::latest('ID')->take(5)->get();
        // $product = DB::table('product')->latest('ID')->take(5)->get();
        // P($product);
        return view('admin.product.add-pricelist', compact('breadcrumb_title', 'productVendorNames', 'priceList'));
    }
    public function save(Request $request)
    {
        $session = get_admin_session();
        // p($request->post('type'));
        $validator = Validator::make(

            [
                'VEN_NAME' => $request->post('vName'),
                'TYPES' => $request->post('type'),
                'PRO_TYPE' => $request->post('productType'),
                'CATEGORY' => $request->post('catagory'),
                'YEAR' => $request->post('year'),
                'DESCRIPTION' => $request->post('description'),
                'PART_NO' => $request->post('partNo'),
                'HSN' => $request->post('hsn'),
                'GST' => $request->post('gst'),
                'LIST_PRICE' => $request->post('listPrice'),
            ],
            [
                'VEN_NAME' => 'required',
                'TYPES' => 'required',
                'PRO_TYPE' => 'required',
                'CATEGORY' => 'required',
                'YEAR' => 'required',
                'DESCRIPTION' => 'required',
                'PART_NO' => 'required',
                'HSN' => 'required',
                'GST' => 'required',
                'LIST_PRICE' => 'required'
            ]

        );

        if ($validator->fails()) {
            return redirect('admin/product')->withErrors($validator)->withInput();
        }
        $priceList = new Product();
        $priceList->fill([

                'VEN_NAME' => $request->post('vName'),
                'VEN_CODE' => "",
                'MAKE' => "",
                'PRO_NAME' => "",
                'ITEM_NO' => "",
                'TYPES' => $request->post('type'),
                'PRO_TYPE' => $request->post('productType'),
                'CATEGORY' => $request->post('catagory'),
                'YEAR' => $request->post('year'),
                'DESCRIPTION' => $request->post('description'),
                'PART_NO' => $request->post('partNo'),
                'HSN' => $request->post('hsn'),
                'GST' => $request->post('gst'),
                'LIST_PRICE' => $request->post('listPrice'),
        ]);

        // p($priceList);
        $priceList->save();
        return redirect()->back()->withSuccess("Price List Added Successfully");
    }
}
