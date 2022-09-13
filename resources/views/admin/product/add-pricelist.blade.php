@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}
    <style>
        .help-block {
            color: red;
        }

        .error {
            color: red;
        }
    </style>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Price List</h3>
        </div>
        <div class="panel-body">
            {{-- <div class="table-responsive"> --}}
            {{-- <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table> --}}
            {{ Form::open(['url' => url('admin/product'), 'class' => '', 'id' => 'addPriceListForm', 'files' => true]) }}
            @csrf

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-4">
                    <div class="form-group">
                        <select id="vName" name="vName" value="{{ old('vName') }}" class="form-control">
                            <option value="" selected disabled>Setect</option>
                            @if ($productVendorNames)
                                @foreach ($productVendorNames as $k => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span id="vname"></span>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select id="type" name="type" value="{{ old('type') }}" class="form-control">
                            <option value="P" selected>PRODUCT</option>
                            <option value="S">SERVICE</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select id="productType" name="productType" value="{{ old('productType') }}" class="form-control">
                            <option value="" selected disabled>Product Type</option>
                            <option value="CONSUMABLES">CONSUMABLES</option>
                            <option value="INSTRUMENTS">INSTRUMENTS</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <select id="catagory" name="catagory" value="{{ old('catagory') }}" class="form-control">
                            <option value="" selected disabled>Product Catagory</option>
                            <option value="ACD">ACD</option>
                            <option value="joints">joints</option>
                            <option value="OTHERS">OTHERS</option>
                            <option value="PFDL">PFDL</option>
                            <option value="Service">Service</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select id="year" name="year" value="{{ old('year') }}" class="form-control">
                            <option value="22-23" selected>22-23</option>
                            <option value="21-22">21-22</option>
                            <option value="20-21 ">20-21</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-4">
                    <div class="form-group">
                        <textarea class=" form-control" id="description" name="description" placeholder="SHORT DESCRIPTION" cols=""
                            rows="2" value="{{ old('description') }}"></textarea>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="text" name="partNo" id="partNo" class="form-control"
                            placeholder="Enter Part No." value="{{ old('partNo') }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="number" name="hsn" id="hsn" class="form-control" placeholder="HSN Code"
                            value="{{ old('hsn') }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="number" name="gst" id="gst" class="form-control" placeholder="GST %"
                            value="{{ old('gst') }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="number" name="listPrice" id="listPrice" class="form-control" placeholder="List Price"
                            value="{{ old('listPrice') }}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="" value="Save">
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            {{-- </div> --}}
        </div>
        @if ($priceList)
            <hr>
            <div class="panel-heading">
                <h3 class="panel-title text-bold">LAST 5 PRODUCTS ADDED:-</h3>
                <br>
            </div>
            <br>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr class="success">
                                <th>S.NO</th>
                                <th>VENDOR</th>
                                <th>PART_NO</th>
                                <th>DESCRIPTION</th>
                                <th>HSN</th>
                                <th>GST</th>
                                <th>LIST PRICE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        @foreach ($priceList as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->ID }}</td>
                                    <td>{{ $item->VEN_NAME }}</td>
                                    <td>{{ $item->PART_NO }}</td>
                                    <td>{{ $item->DESCRIPTION }}</td>
                                    <td>{{ $item->HSN }}</td>
                                    <td>{{ $item->GST }}</td>
                                    <td>{{ $item->LIST_PRICE }}</td>
                                    <td>
                                        <a href="{{ url('/admin/product/' . $item->ID . '/edit') }}">View & Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <br>
        @endif
    </div>
@endsection

@section('footer_script')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#vName').select2();

            $("#addPriceListForm").validate({
                rules: {
                    vName: "required",
                    type: "required",
                    productType: "required",
                    catagory: "required",
                    year: "required",
                    description: "required",
                    partNo: "required",
                    hsn: "required",
                    gst: "required",
                    listPrice: "required",
                },
                messages: {
                    vName: {
                        required: "Vendor Name is required",
                    },
                    type: {
                        required: "This Field is required",
                    },
                    productType: {
                        required: "Product Type Field is required",
                    },
                    catagory: {
                        required: "The Catagory Field is required",
                    },
                    description: {
                        required: "The Description Field is required",
                    },
                    partNo: {
                        required: "Part No Field is required",
                    },
                    hsn: {
                        required: "HSN Field is required",
                    },
                    gst: {
                        required: "GST Field is required",
                    },
                    listPrice: {
                        required: "List Price Field is required",
                    },
                }
            });

            function myFunction() {
                const inpObj = document.getElementById("vname");
                if (!inpObj.checkValidity()) {
                    document.getElementById("vname").innerHTML = inpObj.validationMessage;
                } else {
                    document.getElementById("vname").innerHTML = "Input OK";
                }
            }
        });
    </script>
@endsection
