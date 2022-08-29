@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <div class="panel panel-flat">

        <div class="container">

            {{ Form::open(['url' => url('admin/add-quotation'), 'class' => '', 'id' => 'quotationForm']) }}
            @csrf
            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="currency">CURRENCY TYPE :</label><br>
                        <select id="currency" name="currency" class="form-control">
                            <option value="inr" selected> ₹ INR</option>
                            <option value="foreign">FOREIGN</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name">To:</label><br>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                               value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="designation">DESIGNATION:</label><br>
                        <input type="text" class="form-control" id="designation" name="designation"
                               placeholder="Enter Designation" value="{{ old('designation') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="department">DEPARTMENT:</label><br>
                        <input type="text" class="form-control" id="department" name="department"
                               placeholder="Enter Department" value="{{ old('department') }}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="kind-attention">KIND ATTENTION:</label><br>
                        <input type="text" class="form-control" id="kind-attention" name="kind-attention"
                               placeholder="Enter Name" value="{{ old('kind-attention') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="enquiry-no">ENQUIRY NO:</label><br>
                        <input type="number" class="form-control" id="enquiry-no" name="enquiry-no"
                               placeholder="ENQUIRY NO" value="{{ old('enquiry-no') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="quotation-no">QUOTATION NO:</label><br>
                        <input type="number" class="form-control" id="quotation-no" name="quotation-no"
                               placeholder="QUOTATION NO" disabled value="{{ old('quotation-no') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="date">Date:</label><br>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="days">VALIDITY :</label><br>
                        <select id="days" name="days" class="form-control">
                            @foreach($validityArray as $k => $validity)
                                <option value={{$k}}> {{$validity}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="customer">CUSTOMER:</label><br>
                        <input type="text" class="form-control" id="customer" name="customer" placeholder="Name"
                               value="{{ old('customer') }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sales-person">SALES PERSON :</label><br>

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
                {{-- <div class="col-sm-4">
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div> --}}
            </div>
            {{ Form::close() }}

        </div>

    </div>
@endsection

@section('footer_script')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sales-person').select2();
        });
    </script>
@endsection
