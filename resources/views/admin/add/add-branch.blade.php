@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Branch</h3>
        </div>
        <div class="panel-body">
            {{-- <div class="table-responsive"> --}}
            {{-- <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table> --}}
            {{ Form::open(['url' => url('admin/add-branch'), 'class' => '', 'id' => 'branchForm','files' => true]) }}
            @csrf

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="branch-name">Branch Name:</label><br>
                        <input type="text" class="form-control" id="branch-name" name="branch-name"
                            placeholder="Enter Branch Name" value="{{ old('branch-name') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="branch-person">Contact Person:</label><br>
                        <input type="text" class="form-control" id="branch-person" name="branch-person"
                            placeholder="Enter Contact Person" value="{{ old('branch-person') }}">
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
                        <label for="gst">Gst:</label><br>
                        <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GST"
                            value="{{ old('gst') }}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="date">Open Date:</label><br>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="address">Address:</label><br>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ old('address') }}"
                            rows="1"></textarea>
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
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
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
                        <label for="branch-bill-prefix">Bill No Branch Prefix:</label><br>
                        <input type="text" class="form-control" id="branch-bill-prefix" name="branch-bill-prefix"
                            placeholder="Enter Bill No Branch Prefix" value="{{ old('branch-bill-prefix') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label text-bold" for="signature">Upload Signature</label>
                        <input type="file" name="signature" id="signature" class="form-control"
                            accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png"
                            data-msg-required="Please select a footer image file.">
                        <span class="validation-errors"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="branch-name">&nbsp;</label><br>
                        <input type="submit" class="form-control bg-primary  mt-2" id="branch-name" value="Save">
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
        });
    </script>
@endsection
