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
            <h3 class="panel-title text-bold">Add Vendor</h3>
        </div>
        <div class="panel-heading">
            <p class="font-bold"><span style="color:red">
                    <b>NOTE :</b> DO NOT USE ANY ABBREVIATION LIKE "MR.", "MRS.", "M/S", "MASTER" BEFORE <b>COMPANY
                        NAME</b>...<br>
                    <b>NOTE :</b> LEAVE GSTIN <b>BLANK</b> IF UNREGISTERED<br>
                    <b>NOTE :</b> ADDITIONAL INFORMATION FOR BANK DETAILS CAN BE ADDED IN EDIT MODE</span>
            </p>
        </div>
        <div class="panel-body">
            {{-- <div class="table-responsive"> --}}
            {{-- <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table> --}}
            {{ Form::open(['url' => url('admin/vendor'), 'class' => '', 'id' => 'vendorForm']) }}
            @csrf

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="company-name">Company Name:</label><br>
                        <input type="text" class="form-control" id="company-name" name="company-name"
                            placeholder="Enter Branch Name" value="{{ old('company-name') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="address">Address:</label><br>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"
                            value="{{ old('address') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="city">City Name:</label><br>
                        <input type="text" class="form-control" id="city" name="city"
                            placeholder="Enter City Name" value="{{ old('city') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pin">Pin No:</label><br>
                        <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter Pin"
                            value="{{ old('pin') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="state">Setect State :</label><br>
                        <select id="state" name="state" class="form-control">
                            <option value="" selected disabled>Setect State</option>
                            @if ($stateList)
                                @foreach ($stateList as $k => $state)
                                    <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="country">Country Name:</label><br>
                        <input type="text" class="form-control" id="country" name="country"
                            placeholder="Enter Country Name" value="INDIA">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="pan">Pan No:</label><br>
                        <input type="number" class="form-control" id="pan" name="pan" placeholder="Enter Pan"
                            value="{{ old('pan') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="gstin">GSTIN No:</label><br>
                        <input type="number" class="form-control" id="gstin" name="gstin" placeholder="Enter GSTIN"
                            value="{{ old('gstin') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="vendor-person">Contact Person:</label><br>
                        <input type="text" class="form-control" id="vendor-person" name="vendor-person"
                            placeholder="Enter Contact Person" value="{{ old('vendor-person') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="number">Contact No:</label><br>
                        <input type="number" class="form-control" id="number" name="number"
                            placeholder="Enter Contact Number" value="{{ old('number') }}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="url">URL:</label><br>
                        <input type="url" class="form-control" id="url" name="url"
                            placeholder="Enter URL" value="{{ old('url') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="make">Make:</label><br>
                        <input type="text" class="form-control" id="make" name="make"
                            placeholder="Enter Make" value="{{ old('make') }}" disabled>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="remarks">Remarks:</label><br>
                        <textarea id="remarks" name="remarks" class="form-control" placeholder="Enter Remarks" rows="1"
                            value="{{ old('remarks') }}"></textarea>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="employee-name">Setect Branch Manager :</label><br>
                        <select id="employee-name" name="employee-name" class="form-control">
                            <option value="" selected disabled>Setect Branch Manager</option>
                            @if ($employeeName)
                                @foreach ($employeeName as $k => $employee)
                                    <option value="{{ $employee }}">{{ $employee }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="branch-name" value="Save">
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            {{-- </div> --}}
        </div>
    </div>
@endsection

@section('footer_script')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#state').select2();
            $('#employee-name').select2();

            $("#vendorForm").validate({
                rules: {
                    'company-name': "required",
                    address: "required",
                    city: "required",
                    pin: {
                        required: true,
                        maxlength: 8,
                    },
                    state: "required",
                    country: "required",
                    pan: "required",
                    gstin: "required",
                    'vendor-person': "required",
                    number: {
                        required: true,
                        maxlength: 10,
                    },
                    email: "required",
                    url: "required",
                    make: "required",
                    remarks: "required",
                    'employee-name': "required",
                },
                messages: {
                    number: {
                        required: "Number Field is required",
                    },
                    city: {
                        required: "City Field is required",
                    },
                    pin: {
                        required: "The pin Field is required",
                        min: 'The pin fied is minimum 4 char',
                    },
                    state: {
                        required: "State Field is required",
                    },
                    country: {
                        required: "The country Field is required",
                    },
                    email: {
                        required: "State Field is required",
                        email: "Email must be a valid email address",
                    },
                }
            });
        });
    </script>
@endsection
