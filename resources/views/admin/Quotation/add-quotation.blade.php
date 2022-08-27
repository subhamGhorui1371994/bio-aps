@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <div class="panel panel-flat">

        <div class="container">

            {{ Form::open(['url' => url('add-quotation'), 'class' => '', 'id' => 'quotationForm']) }}
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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="designation">DESIGNATION:</label><br>
                        <input type="text" class="form-control" id="designation" name="designation"
                            placeholder="Enter Designation">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="department">DEPARTMENT:</label><br>
                        <input type="text" class="form-control" id="department" name="department"
                            placeholder="Enter Department">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="kind-attention">KIND ATTENTION:</label><br>
                        <input type="text" class="form-control" id="kind-attention" name="kind-attention"
                            placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="enquiry-no">ENQUIRY NO:</label><br>
                        <input type="number" class="form-control" id="enquiry-no" name="enquiry-no"
                            placeholder="ENQUIRY NO">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="quotation-no">QUOTATION NO:</label><br>
                        <input type="number" class="form-control" id="quotation-no" name="quotation-no"
                            placeholder="QUOTATION NO" disabled>
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
                            <option value="30" selected> 30 Days</option>
                            <option value="60"> 60 Days</option>
                            <option value="90"> 90 Days</option>
                            <option value="120"> 120 Days</option>
                            <option value="180"> 180 Days</option>
                            <option value="365"> 365 Days</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="customar">CUSTOMER:</label><br>
                        <input type="text" class="form-control" id="customar" name="customar" placeholder="Name">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sales-person">SALES PERSON :</label><br>
                        <select id="sales-person" name="sales-person" class="form-control">
                            <option value="" selected disabled>SELECT EMPLOYEE</option>
                        </select>
                    </div>
                </div>
            </div>
            {{ Form::close() }}

        </div>

    </div>
@endsection

@section('footer_script')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("Hello world!");
        });
    </script>
@endsection
