@extends('layouts.admin-template')
@section('content')
    {!! showMessage() !!}


    <div class="panel panel-flat">
        <div class="container">
            <div class="contact-form-two">
                <div class="sec-title">
                    <span class="border-bottom"> <h2>Add Company</h2></span>

                </div>
                {{ Form::open(['url' => url('admin/add-company'), 'class' => 'row col-offset-md-3', 'id' => '']) }}
                @csrf
                {{-- <form class="col-md-8 col-offset-md-3 "> --}}
                <div class="col-12 form-group">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="Name" placeholder="Enter Company Name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12 form-group">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress"
                        placeholder="Enter Company Address">
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row form-group ">
                    <div class="col-sm-3">
                        <label for="inputcountry" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" id="inputcountry"
                            placeholder="Enter Company Country">
                            @error('country')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="inputstate" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" id="inputstate"
                            placeholder="Enter Company State">
                            @error('state')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="inputcity" class="form-label">City</label><br>
                        <select id="inputcity" class="form-control">
                            <option selected>Choose...</option>
                            <option>Kolkata</option>
                            <option>Mumbai</option>
                            <option>Delhi</option>
                            <option>Chennai</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="PIN" class="form-label">PIN</label>
                        <input type="text" class="form-control" name="pin" id="PIN" placeholder="Enter PIN No">
                        @error('pin')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <samp>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="Contact" class="form-label">Contact No.</label>
                        <input type="text" class="form-control" name="contact" id="contactno"
                            placeholder="Enter Company Contact No">
                            @error('contact')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Company Email Address">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="GSTIN" class="form-label">GSTIN</label>
                        <input type="test" class="form-control" name="gstin" id="GSTIN"
                            placeholder="Enter Company GSTIN">
                            @error('gstin')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="PAN" class="form-label">PAN No.</label>
                        <input type="text" class="form-control" name="pan" id="PAN"
                            placeholder="Enter PAN No.">
                            @error('pan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="companyurl" class="form-label">Company URL</label>
                        <input type="text" class="form-control" name="companyurl" id="url"
                            placeholder="Enter Company URL">
                            @error('companyurl')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    @endsection
