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
            <h3 class="panel-title text-bold">Edit & Upadte Branch</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/branch') }}" class="btn btn-primary">Back To Branch</a>
            </div>
        </div>
        <div class="panel-body">
            {{-- {{dd($branchData->BR_ADDRESS);}} --}}
            {{ Form::open(['method' => 'PATCH', 'route' => ['branch.update', $branchData->ID], 'class' => 'form-vertical', 'id' => 'branch_update_form', 'files' => true]) }}
            @csrf
            <div class="row col-md-12">

                <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                    <div class="col-md-10">
                        <div class="row" style="">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="branch-name">Branch Name:</label><br>
                                    <input type="text" class="form-control" id="branch-name" name="branch-name"
                                        placeholder="Enter Branch Name" value="{{ $branchData->BRANCH_NAME ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="branch-person">Contact Person:</label><br>
                                    <input type="text" class="form-control" id="branch-person" name="branch-person"
                                        placeholder="Enter Contact Person"
                                        value="{{ $branchData->BR_CONTACT_PERSON ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="number">Contact No:</label><br>
                                    <input type="number" class="form-control" id="number" name="number"
                                        placeholder="Enter Contact Number" value="{{ $branchData->BR_PHONE ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="email">Email:</label><br>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="{{ $branchData->EMAIL ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-3">
                                {{-- <div class="form-group">
                            <label for="address">Address:</label><br>
                            <textarea type='text'; class="form-control" id="address" name="address" placeholder="Enter Address"
                                value="{{ $branchData->BR_ADDRESS ?? '' }}" rows="1"></textarea>
                        </div> --}}
                                <div class="form-group">
                                    <label class="control-label text-bold" for="address">Address:</label><br>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Enter Address" value="{{ $branchData->BR_ADDRESS ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="city">City Name:</label><br>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="Enter City Name" value="{{ $branchData->BR_CITY ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="state">Setect State :</label><br>
                                    <select id="state" name="state" class="form-control">
                                        @if ($stateList)
                                            @foreach ($stateList as $k => $state)
                                                @if ($branchData->BR_STATE === $state)
                                                    <option value="{{ $state }}" selected>{{ $state }}
                                                    </option>
                                                @else
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="country">Country Name:</label><br>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Enter Country Name" value="INDIA">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="pin">Pin No:</label><br>
                                    <input type="number" class="form-control" id="pin" name="pin"
                                        placeholder="Enter Pin" value="{{ $branchData->BR_PIN ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="date">Open Date:</label><br>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $branchData->BR_DATE ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="gst">Gst:</label><br>
                                    <input type="text" class="form-control" id="gst" name="gst"
                                        placeholder="Enter GST" value="{{ $branchData->BR_GST ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="branch-bill-prefix">Bill No Branch Prefix:</label><br>
                                    <input type="text" class="form-control" id="branch-bill-prefix"
                                        name="branch-bill-prefix" placeholder="Enter Bill No Branch Prefix"
                                        value="{{ $branchData->PREFIX ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label text-bold" for="signature">Upload Signature</label>
                                    <input type="file" name="signature" id="signature" class="form-control px-1"
                                        accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png"
                                        data-msg-required="Please select a footer image file.">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2 " style="margin-top: 25px;margin-bottom: 25px;">
                        <div class="signature col-sm-2 ">
                            <label class="control-label text-bold" for="signature">Signature</label>
                            {{-- <textarea class="" id="signature" name="signature" placeholder="signature">{{ $branchData->signature ?: old('signature') }}</textarea> --}}
                            {{-- @if ($branchData->signature)
                            <img src="{{ url($branchData->signature) }}" alt="signature-pic" width="130px">
                        @endif --}}

                            @if (!empty($branchData->signature))
                                <img src="{{ url($branchData->signature) }}" alt="signature-pic" width="130px">
                            @else
                                <img src="{{ url('') }}" alt="signature-pic">
                            @endif
                        </div>

                    </div>

                </div>


                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Update<i
                            class="icon-arrow-right14 position-right"></i></button>
                </div>

                {!! Form::close() !!}
            </div>

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
