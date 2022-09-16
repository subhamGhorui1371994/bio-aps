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
            <h3 class="panel-title text-bold">Add Customer</h3>
        </div>
        <div class="panel-body">
            {{-- <div class="table-responsive"> --}}
            {{-- <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table> --}}
            {{ Form::open(['url' => url('admin/customer'), 'class' => '', 'id' => 'customerForm', 'files' => true]) }}
            @csrf

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Employee-name">Employee Name:</label><br>
                        <input type="text" class="form-control" id="branch-name" name="Employee-name"
                            placeholder="Enter Employee Name" value="{{ old('Employee-name') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="institute-name">Institute Name:</label><br>
                        <input type="text" class="form-control" id="institute-name" name="institute-name"
                            placeholder="Enter Institute Name " value="{{ old('institute-name') }}">
                    </div>
                    </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Address">Address:</label><br>
                        <input type="text" class="form-control" id="Address" name="Address"
                            placeholder="Enter Address " value="{{ old('Address') }}">
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
                        <label for="state">State Name:</label><br>
                        <input type="text" class="form-control" id="state" name="state"
                            placeholder="Enter State Name" value="{{ old('state') }}">
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
                        <label for="PAN">PAN No:</label><br>
                        <input type="text" class="form-control" id="PAN" name="PAN"
                            placeholder="Enter Pan No" value="{{ old('PAN') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="gst">Gst No:</label><br>
                        <input type="text" class="form-control" id="gst" name="gst"
                            placeholder="Enter GST" value="{{ old('gst') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            value="{{ old('email') }}">
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="contact-person">Contact Person:</label><br>
                        <input type="text" class="form-control" id="contact-person" name="contact-person" placeholder="Enter Full Name"
                            value="{{ old('contact-person') }}">
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
                        <label for="url">URL:</label><br>
                        <input type="text" class="form-control" id="url" name="url"
                            placeholder="Enter Ulr:" value="https://">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="remarks">Remarks:</label><br>
                        <input type="sm" class="form-control" id="remarks" name="remarks"
                            placeholder="Enter Remarks " value="{{ old('remarks') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="balance">Opening Balance:</label><br>
                        <input type="number" class="form-control" id="balance" name="balance"
                            placeholder="Enter Opening Balance " value="{{ old('balance') }}">
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
@endsection

<!-- @section('footer_script')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#state').select2();

            $("#branchForm").validate({
                rules: {
                    'branch-name': "required",
                    'branch-person': "required",
                    number: {
                        required: true,
                        maxlength: 10,
                    },
                    gst: "required",
                    date: "required",
                    address: "required",
                    city: "required",
                    // pin: "required",
                    pin: {
                        required: true,
                        maxlength: 8,
                    },
                    country: "required",
                    'branch-bill-prefix': "required",
                    email: "required",
                },
                messages: {
                    number: {
                        required: "Number Field is required",
                    },
                    gst: {
                        required: "The gst Field is required",
                    },
                    date: {
                        required: "Date Field is required",
                    },
                    address: {
                        required: "The address Field is required",
                    },
                    city: {
                        required: "City Field is required",
                    },
                    pin: {
                        required: "The pin Field is required",
                        min:'The pin fied is minimum 4 char',
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
@endsection --> -->
