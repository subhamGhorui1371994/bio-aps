@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Quotation</h3>
        </div>
        <div class="panel-body">
            {{-- <div class="table-responsive"> --}}
            {{-- <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table> --}}
            {{ Form::open(['url' => url('admin/add-quotation'), 'class' => '', 'id' => 'quotationForm']) }}
            @csrf

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="currency" class="text-bold">CURRENCY TYPE :</label><br>
                        <select id="currency" name="currency" class="form-control">
                            <option value="inr" selected> ₹ INR</option>
                            <option value="foreign">FOREIGN</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="name" class="text-bold">TO:</label><br>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="designation" class="text-bold">DESIGNATION:</label><br>
                        <input type="text" class="form-control" id="designation" name="designation"
                               placeholder="Enter Designation" value="{{ old('designation') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="department" class="text-bold">DEPARTMENT:</label><br>
                        <input type="text" class="form-control" id="department" name="department"
                               placeholder="Enter Department" value="{{ old('department') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kind-attention" class="text-bold">KIND ATTENTION:</label><br>
                        <input type="text" class="form-control" id="kind-attention" name="kind-attention"
                               placeholder="Enter Name" value="{{ old('kind-attention') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="enquiry-no" class="text-bold">ENQUIRY NO:</label><br>
                        <input type="number" class="form-control" id="enquiry-no" name="enquiry-no"
                               placeholder="ENQUIRY NO" value="{{ old('enquiry-no') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="quotation-no" class="text-bold">QUOTATION NO:</label><br>
                        <input type="text" class="form-control" id="quotation-no" name="quotation-no"
                               placeholder="QUOTATION NO" disabled value="{{ $quotationNo }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date" class="text-bold">DATE:</label><br>
                        <input type="date" class="form-control" id="date" name="date"
                               value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="days" class="text-bold">VALIDITY :</label><br>
                        <select id="days" name="days" class="form-control">
                            @foreach ($validityArray as $k => $validity)
                                <option value={{ $k }}> {{ $validity }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <label for="customer" style="width: 100%" class="text-bold">CUSTOMER:</label>
                        <select name="customer" id="customer" class="form-control"></select>
{{--                        <input class="form-control" id="customer" name="customer">--}}
                        <div class="input-group-btn" style="vertical-align: bottom !important;">
                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                    data-target="#exampleModalCenter"><i class="icon-eye"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 consignee_same_customer" style="display:none;">
                    <div class="form-group">
                        <label for="customer" class="mr-3 text-bold">CONSIGNEE SAME AS CUSTOMER:</label>
                        <label for="c_s_c_yes" class="mr-3"><input type="radio" name="consignee_same_customer"
                                                                   id="c_s_c_yes" value="yes" checked> Yes</label>
                        <label for="c_s_c_no"><input type="radio" name="consignee_same_customer" id="c_s_c_no"
                                                     value="no"> No</label>
                        <input type="text" class="form-control" id="customer_consignee" name="customer_consignee"
                               style="display: none"
                               placeholder="Enter Consignee" value="{{ old('customer_consignee') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sales-person" class="text-bold">SALES PERSON :</label><br>

                        <select id="sales-person" name="sales-person" class="form-control">
                            <option value="" selected disabled>SELECT EMPLOYEE</option>
                            @if ($allCustomer)
                                @foreach ($allCustomer as $k => $customer)
                                    <option value="{{ $customer }}">{{ $customer }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-center text-bold">PRODUCT</div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-bold">SAMPLE COMPANY NAME</div>
                        <div class="col-md-6 text-right text-bold">SAMPLE MANAGER NAME</div>
                    </div>
                </div>
                <div class="col-md-12 products_main_div">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bank_name" class="text-bold">BANK</label>
                        <select class="form-control input-col input-sm" id="bank_name" name="bank_name" required="">
                            <option value="">Select Bank</option>
                            @if($bankList)
                                @foreach($bankList as $key => $bank)
                                    <option value="{{$bank->BANK_CODE}},{{$bank->BANK_NAME}}{{$bank->BRANCH_CODE}}">{{$bank->BANK_NAME}}({{$bank->BRANCH_NAME}})</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group curType" style="display:none;">
                        <label for="curType" class="text-bold">EXCHANGE CURRENCY</label>
                        <select class="form-control" id="curType" name="curType">
                            <option value="">Select currency</option>
                            @if($allCurrencies)
                                @foreach($allCurrencies as $code => $name)
                                    <option value="{{$code}}">{{$name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group fcRate" style="display: none">
                        <label for="fcRate" class="text-bold">EXCHANGE RATE</label>
                        <input type="text" name="fcRate" id="fcRate" placeholder="RS 0.00" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">TAXABLE</th>
                                <td style="width: 50%;text-align: right;">0.00</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">SGST</th>
                                <td style="width: 50%;text-align: right;">0.00</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">CGST</th>
                                <td style="width: 50%;text-align: right;">0.00</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">IGST</th>
                                <td style="width: 50%;text-align: right;">0.00</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">
                                    <input type="text" class="form-control text-right" value="OTHER EXP">
                                </th>
                                <td style="width: 50%;text-align: right;">
                                    <input type="number" class="form-control text-right" value="0">
                                    <input type="number" class="form-control text-right" value="18">
                                    <input type="number" class="form-control text-right" value="0.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">
                                    <input type="number" class="form-control text-right" value="0.075">
                                </th>
                                <td style="width: 50%;text-align: right;">
                                    <input type="number" class="form-control text-right" value="0.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 50%;text-align: right;font-weight: bold;">TOTAL AMOUNT</th>
                                <td style="width: 50%;text-align: right;">
                                    <input type="number" class="form-control text-right" value="0.00">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="s_p_no" class="text-bold mr-3"><input type="radio" name="search_by" id="s_p_no" value="part_no" checked> PART NO</label>
                        <label for="s_p_name" class="text-bold"><input type="radio" name="search_by" id="s_p_name" value="product_name"> PRODUCT NAME</label>
                        <select name="search_part_no" id="search_part_no" class="form-control select-remote-data" style="display: none"></select>
                        <select name="search_products" id="search_products" class="form-control select-remote-data" style="display: none"></select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="remarks" style="width: 100%;">&nbsp;</label>
                        <button type="button" class="btn btn-success" id="addNewProduct"><i class="icon-plus2"></i></button>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="remarks" class="text-bold">REMARKS</label>
                        <textarea rows="4" class="form-control" placeholder="Remarks" id="remarks" name="remarks"></textarea>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="remarks" style="width: 100%;">&nbsp;</label>
                        <button type="button" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-4">
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div> --}}
            {{ Form::close() }}
            {{-- </div> --}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Customer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 5%;text-align: left;border-top: unset;">Address:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;" id="c_address"></td>
                                <th style="width: 30%;text-align: left;border-top: unset;">Email:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;" id="c_email"></td>
                            </tr>
                            <tr>
                                <th style="width: 5%;text-align: left;border-top: unset;" id="c_pan">PAN:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;"></td>
                                <th style="width: 30%;text-align: left;border-top: unset;">Contact Person:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;" id="c_c_p"></td>
                            </tr>
                            <tr>
                                <th style="width: 5%;text-align: left;border-top: unset;">GSTN:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;" id="c_gstn"></td>
                                <th style="width: 30%;text-align: left;border-top: unset;">Contact No:</th>
                                <td style="width: 30%;text-align: left;border-top: unset;" id="c_no"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <style>
        hr {
            border-top: 2px solid #1cc09e;
        }
    </style>
    <link type="text/css" href="{{ URL::asset('assets/admin/js/select2-4.0.6/dist/css/select2.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootbox.min.js') }}"></script>
    <script type="text/javascript">
        var g_selected_product, g_selected_customer;
        $(document).ready(function () {
            $('#sales-person').select2();

            $('#currency').change(function () {
                $('.consignee_same_customer').hide();
                $('.curType').hide();
                $('.fcRate').hide();
                if ($(this).val() === 'foreign') {
                    $('.consignee_same_customer').show();
                    $('.curType').show();
                    $('.fcRate').show();
                }
            });

            $('input[name=consignee_same_customer]').change(function () {
                $('#customer_consignee').hide();
                if ($(this).val() === 'no') {
                    $('#customer_consignee').show();
                }
            });

            $("#customer").select2({
                ajax: {
                    url: base_url + "/admin/search-customer",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        console.log(data)
                        params.page = params.page || 1;
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.length
                            }
                        };
                    },
                },
                placeholder: 'Customer: Enter minimum 2 characters',
                minimumInputLength: 2,
                escapeMarkup: function (markup) {
                    return markup;
                },
            }).on('select2:select', function (e) {
                console.log('select2', e.params)
                g_selected_customer = e.params.data.data;
            });

            $('input[name=search_by]').change(function () {
                if ($('#search_part_no').data('select2')) {
                    $('#search_part_no').select2('destroy');
                }
                if ($('#search_products').data('select2')) {
                    $('#search_products').select2('destroy');
                }
                $('#search_part_no').hide();
                $('#search_products').hide();
                if ($('input[name=search_by]:checked').val() === 'part_no') {
                    applySelect2Search('part_no');
                    $('#search_part_no').show();
                } else if ($('input[name=search_by]:checked').val() === 'product_name') {
                    applySelect2Search('product_name');
                    $('#search_products').show();
                }
            }).trigger('change');

            $('#addNewProduct').click(function () {
                if(g_selected_product === undefined) {
                    bootbox.dialog({
                        message: '<p class="text-center mb-0">Please select a product or part no first.</p>',
                    });
                }else {
                    let productName = ($('input[name=search_by]:checked').val() === 'part_no') ? g_selected_product.PART_NO : g_selected_product.PRO_NAME;
                    let newProductRow = $(`<div class="row single_product_row" >
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-2 text-bold">1. PART NO. (PRODUCT)</div>
                            <div class="col-md-1 text-bold">MAKE</div>
                            <div class="col-md-4 text-bold">SPECIFICATION</div>
                            <div class="col-md-1 text-bold">RATE</div>
                            <div class="col-md-2 text-bold">RC DISCOUNT</div>
                            <div class="col-md-2 text-bold">SPECIAL DISCOUNT</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"><input type="text" class="form-control" readonly value="${productName}"></div>
                            <div class="col-md-1"><input type="text" class="form-control" readonly value="${g_selected_product.MAKE}"></div>
                            <div class="col-md-4"><textarea class="form-control" rows="1">${g_selected_product.DESCRIPTION}</textarea></div>
                            <div class="col-md-1"><input type="number" class="form-control" value="${g_selected_product.LIST_PRICE}"></div>
                            <div class="col-md-2"><input type="number" class="form-control"></div>
                            <div class="col-md-2"><input type="number" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="row">
                            <div class="col-md-2 text-bold">DISCOUNT AMT</div>
                            <div class="col-md-1 text-bold">UNIT</div>
                            <div class="col-md-1 text-bold">QTY</div>
                            <div class="col-md-2 text-bold">TAXABLE</div>
                            <div class="col-md-1 text-bold">GST %</div>
                            <div class="col-md-2 text-bold">GST AMT</div>
                            <div class="col-md-1 text-bold">CGST</div>
                            <div class="col-md-1 text-bold">SGST</div>
                            <div class="col-md-1 text-bold">IGST</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-1">
                                <select name="unit_1" class="form-control" id="unit_1">
                                    <option value="ACT">ACT</option>
                                    <option value="box">box</option>
                                    <option value="gm">gm</option>
                                    <option value="kg">kg</option>
                                    <option value="Ltr">Ltr</option>
                                    <option value="ml">ml</option>
                                    <option value="packet">packet</option>
                                    <option value="pair">pair</option>
                                    <option value="pcs" selected="">pcs</option>
                                    <option value="set">set</option>
                                    <option value="Sqft">Sqft</option>
                                </select>
                            </div>
                            <div class="col-md-1"><input type="number" class="form-control"></div>
                            <div class="col-md-2"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-1"><input type="number" class="form-control"></div>
                            <div class="col-md-2"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-1"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-1"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-1"><input type="text" class="form-control" readonly></div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="row">
                            <div class="col-md-2 text-bold">AMOUNT</div>
                            <div class="col-md-8 text-bold">INSTRUMENT DESCRIPTION</div>
                            <div class="col-md-1 text-bold">POSITION</div>
                            <div class="col-md-1 text-bold text-center">REMOVE</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"><input type="text" class="form-control" readonly></div>
                            <div class="col-md-8"><textarea rows="4" class="form-control"></textarea></div>
                            <div class="col-md-1"><input type="text" class="form-control"></div>
                            <div class="col-md-1 text-center">
                                <button type="button" class="btn btn-danger removeProductRow"><i class="icon-close2"></i></button>
                            </div>
                        </div>
                    </div></div>`);
                    newProductRow.find('.removeProductRow').click(function () {
                        $(this).parents('.single_product_row').remove();
                    });
                    $('.products_main_div').append(newProductRow);
                    g_selected_product = undefined;
                    $('#search_part_no').val(null). trigger('change');
                    $('#search_products').val(null). trigger('change');
                }
            })
        });

        function applySelect2Search(type = 'part_no') {
            if (type === 'part_no') {
                $("#search_part_no").select2({
                    ajax: {
                        url: base_url + "/admin/search-part-no",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page || 1
                            };
                        },
                        processResults: function (data, params) {
                            console.log(data)
                            params.page = params.page || 1;
                            return {
                                results: data,
                                pagination: {
                                    more: (params.page * 30) < data.length
                                }
                            };
                        },
                    },
                    placeholder: 'Part No: Enter minimum 2 characters',
                    minimumInputLength: 2,
                    escapeMarkup: function (markup) {
                        return markup;
                    },
                }).on('select2:select', function (e) {
                    console.log('select2', e.params)
                    g_selected_product = e.params.data.data;
                });
            } else {
                $("#search_products").select2({
                    ajax: {
                        url: base_url + "/admin/search-products",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            console.log(data)
                            return {
                                results: data,
                            };
                        },
                    },
                    placeholder: 'Product Name: Enter minimum 2 characters',
                    minimumInputLength: 2,
                    escapeMarkup: function (markup) {
                        return markup;
                    },
                }).on('select2:select', function (e) {
                    console.log('select2', e.params);
                    g_selected_product = e.params.data.data;
                });
            }
        }

    </script>
@endsection
