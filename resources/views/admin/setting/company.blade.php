@extends('layouts.admin-template')
@section('content')
    {!! showMessage() !!}


    <div class="panel panel-flat">
        <div class="container">
            <div class="contact-form-two">
                <div class="sec-title">
                    <span class="border-bottom">
                        <h2>Add Company</h2>
                    </span>

                </div>
                {{ Form::open(['url' => url('admin/add-company'), 'class' => 'row col-offset-md-3', 'id' => '']) }}
                @csrf
                {{-- <form class="col-md-8 col-offset-md-3 "> --}}
                <div class="col-12 form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Company Name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12 form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address"
                        placeholder="Enter Company Address">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row form-group ">
                    <div class="col-sm-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" id="country"
                            placeholder="Enter Company Country">
                        @error('country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" id="state"
                            placeholder="Enter Company State">
                        @error('state')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <label for="city" class="form-label">City</label><br>
                        <select name="city" id="city" class="form-control">
                            <option selected>Choose...</option>
                            <option>Kolkata</option>
                            <option>Mumbai</option>
                            <option>Delhi</option>
                            <option>Chennai</option>
                        </select>
                        @error('city')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @error('city')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="col-sm-3">
                        <label for="pin" class="form-label">PIN</label>
                        <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter PIN No">
                        @error('pin')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="contact" class="form-label">Contact No.</label>
                        <input type="text" class="form-control" name="contact" id="contact"
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
                        <label for="gstin" class="form-label">GSTIN</label>
                        <input type="test" class="form-control" name="gstin" id="gstin"
                            placeholder="Enter Company GSTIN">
                        @error('gstin')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="pan" class="form-label">PAN No.</label>
                        <input type="text" class="form-control" name="pan" id="pan"
                            placeholder="Enter PAN No.">
                        @error('pan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="url" class="form-label">Company URL</label>
                        <input type="text" class="form-control" name="url" id="url"
                            placeholder="Enter Company URL">
                        @error('url')
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
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Company Name</h3>
            {{-- <div class="heading-elements">
                    <a href="{{ url('admin/service/create') }}" class="btn btn-primary">Add Service</a>
                </div> --}}
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="companylist" style="width: 100%"></table>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <link href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" id="theme" rel="stylesheet">

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootbox.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#companylist').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: base_url + '/admin/company',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                },
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: []
                }, ],
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'CO_NAME',
                        title: 'COMPANY NAME'
                    },
                    {
                        data: 'ADDRESS',
                        title: 'ADDRESS'
                    },
                    {
                        data: 'EMAIL',
                        title: 'EMAIL'
                    },
                    // {title: 'Created', data: 'created_at', className: 'text-center'},
                    {
                        title: 'Action',
                        data: null,
                        className: 'text-center',
                        width: '10%',
                        mRender: function(data, type, row) {
                            // return '<a href="' + base_url + '/admin/notice/' + row.id + '/edit" style="margin-right: 1.5rem"><i class="icon-eye"></i></a>';
                            // return '<a href="' + base_url + '/bank-dtl-data/' + row.ID + '" style="margin-right: 1.5rem"><i class="icon-eye"></i></a>';
                            // return '<a href="' + base_url + '/admin/bank-dtl-data/' + row.ID + '" style="margin-right: 1.5rem"><i class="icon-eye"></i></a>';
                            return '<a href="' + base_url + '/admin/setting/company/' + row.ID +
                                '" style="margin-right: 1.5rem"><i class="icon-eye"></i></a>'; //routes note
                        },
                    },
                ],
                initComplete: function(settings, json) {

                    $('#portfolioList tbody').on('click', 'tr td .delete-action', function(e) {

                        var delete_id = $(this).data('id');

                        bootbox.confirm('Are you sure you want to delete this notice?',
                            function(result) {
                                if (result === true) {
                                    window.location.href = base_url +
                                        '/admin/company/delete/' + delete_id;
                                }
                            },
                        );
                    });

                },
            });
        });
    </script>
@endsection
