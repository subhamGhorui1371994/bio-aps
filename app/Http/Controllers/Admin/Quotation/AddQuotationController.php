<?php

namespace App\Http\Controllers\Admin\Quotation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AddQuotationController extends Controller
{
    
    public function index(){
        return view('admin.Quotation.add-quotation');
    }

    public function addAddQuotation(){
        //
    }
}
