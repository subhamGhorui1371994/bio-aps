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
            <h3 class="panel-title text-bold">Add Resource Person</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/branch') }}" class="btn btn-primary">List Resource Person</a>
            </div>
        </div>
        <div class="panel-body">
            {{-- {{dd($branchData->BR_ADDRESS);}} --}}
            {{ Form::open(['method' => 'PATCH', 'route' => ['branch.update', $branchData->ID], 'class' => 'form-vertical', 'id' => 'branch_update_form','files' => true ]) }}


            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="branch-name">Branch Name:</label><br>
                        <input type="text" class="form-control" id="branch-name" name="branch-name"
                            placeholder="Enter Branch Name" value="{{ $branchData->BRANCH_NAME ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="branch-person">Contact Person:</label><br>
                        <input type="text" class="form-control" id="branch-person" name="branch-person"
                            placeholder="Enter Contact Person" value="{{ $branchData->BR_CONTACT_PERSON ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="number">Contact No:</label><br>
                        <input type="number" class="form-control" id="number" name="number"
                            placeholder="Enter Contact Number" value="{{ $branchData->BR_PHONE ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            value="{{ $branchData->EMAIL ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="address">Address:</label><br>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address"
                            value="{{ $branchData->BR_ADDRESS ?? '' }}" rows="1"></textarea>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="city">City Name:</label><br>
                        <input type="text" class="form-control" id="city" name="city"
                            placeholder="Enter City Name" value="{{ $branchData->BR_CITY ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="state">Setect State :</label><br>
                        <select id="state" name="state" class="form-control">
                            <option value="" selected disabled>Setect State</option>
                            @if ($stateList)
                                @foreach ($stateList as $k => $state)
                                    <option value="{{ $branchData->BR_STATE ?? '' }}">{{ $state }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="validation-errors"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="country">Country Name:</label><br>
                        <input type="text" class="form-control" id="country" name="country"
                            placeholder="Enter Country Name" value="INDIA">
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label for="pin">Pin No:</label><br>
                        <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter Pin"
                            value="{{ $branchData->BR_PIN ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label for="date">Open Date:</label><br>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ $branchData->BR_DATE ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label for="gst">Gst:</label><br>
                        <input type="text" class="form-control" id="gst" name="gst"
                            placeholder="Enter GST" value="{{ $branchData->BR_GST ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label for="branch-bill-prefix">Bill No Branch Prefix:</label><br>
                        <input type="text" class="form-control" id="branch-bill-prefix" name="branch-bill-prefix"
                            placeholder="Enter Bill No Branch Prefix" value="{{ $branchData->PREFIX ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label class="control-label text-bold" for="signature">Upload Signature</label>
                        <input type="file" name="signature" id="signature" class="form-control px-1"
                            accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png"
                            data-msg-required="Please select a footer image file.">
                        <span class="validation-errors"></span>
                    </div>
                </div>
                <div class="col-sm-2 px-2">
                    <div class="form-group">
                        <label for="branch-name">&nbsp;</label><br>
                        <input type="submit" class="form-control bg-primary" id="branch-name" value="Save">
                    </div>
                </div>
            </div>


            {{-- <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Submit <i
                        class="icon-arrow-right14 position-right"></i></button>
            </div> --}}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

{{-- @section('footer_script')
    <link href="{{ URL::asset('assets/admin/js/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#resource_person_type').select2({
                placeholder: 'Select Resource Person Type',
                allowClear: true,
            });

            $('#course').select2({
                placeholder: 'Select Course',
                allowClear: true,
            });

            $('.resource-person-course').hide();

            $('#resource_person_type').change(function() {
                let value = $(this).val();
                if (value === 'Teaching Staff') {
                    $('#course').attr('required', true);
                    $('.resource-person-course').show();
                } else {
                    $('#course').attr('required', false);
                    $('.resource-person-course').hide();
                }
            }).trigger('change');

            $('#portfolio_form').validate({
                ignore: [],
                errorPlacement: function errorPlacement(error, element) {
                    $(element).parents('div.form-group').find('span.validation-errors').append(error);
                },
                onfocusout: false,
                highlight: function(element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').addClass(errorClass);
                    } else {
                        $(element).addClass(errorClass);
                    }
                },
                unhighlight: function(element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').removeClass(errorClass);
                    } else {
                        $(element).removeClass(errorClass);
                    }
                },
            });

        });
    </script>
@endsection --}}
@section('footer_script')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#state').select2();

            $("#branch_update_form").validate({
                rules: {
                    'branch-name': "required",
                    'branch-person': "required",
                    number: "required",
                    state: "required",
                    gst: "required",
                    date: "required",
                    address: "required",
                    city: "required",
                    pin: "required",
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
