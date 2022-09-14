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




    <div class=" panel row col-md-12">

        <div class="">
            <h3 class="text-bold alert alert-primary">ADD PRODUCT PREFERENCES:</h3>
        </div>

        <div class="col-sm-4">
            <div class="panel">
                <div class="panel-heading bg-success mb-3">
                    <div style="width: fit-content;display: inline-block;">
                        <h1 class="p-0 m-0">Unit Details:</h1>
                    </div>
                    <div style="width: fit-content;display: inline-block;float: right;">
                        <h1 class="p-0 m-0">
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#unitName"
                                data-whatever=""><i class="icon-plus2"></i></button>
                        </h1>
                    </div>
                </div>
                @if ($unit)
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                    <tr class="success">
                                        <th>S.NO</th>
                                        <th>Unit Name</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                @foreach ($unit as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->UNIT_ID }}</td>
                                            <td>{{ $item->UNIT_NAME }}</td>
                                            <td>
                                                <a href="{{ url('/admin/product/' . $item->UNIT_ID . '/edit') }}">View &
                                                    Edit</a>
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
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading bg-info mb-3">
                    <div style="width: fit-content;display: inline-block;">
                        <h1 class="p-0 m-0">Category Details:</h1>
                    </div>
                    <div style="width: fit-content;display: inline-block;float: right;">
                        <h1 class="p-0 m-0">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#catName"
                                data-whatever=""><i class="icon-plus2"></i></button>
                        </h1>
                    </div>
                </div>
                @if ($category)
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                    <tr class="success">
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                @foreach ($category as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->CAT_ID }}</td>
                                            <td>{{ $item->CATEGORY_NAME }}</td>
                                            <td>
                                                <a href="{{ url('/admin/product/' . $item->CAT_ID . '/edit') }}">View & Edit</a>
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
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading bg-danger mb-3">
                    <div style="width: fit-content;display: inline-block;">
                        <h1 class="p-0 m-0">Type Details:</h1>
                    </div>
                    <div style="width: fit-content;display: inline-block;float: right;">
                        <h1 class="p-0 m-0">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#typeName"
                                data-whatever=""><i class="icon-plus2"></i></button>
                        </h1>
                    </div>
                </div>
                @if ($type)
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                    <tr class="success">
                                        <th>ID</th>
                                        <th>Type Name</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                @foreach ($type as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->TYPE_ID }}</td>
                                            <td>{{ $item->TYPE_NAME }}</td>
                                            <td>
                                                <a href="{{ url('/admin/product/' . $item->TYPE_ID . '/edit') }}">View &
                                                    Edit</a>
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
        </div>
    </div>


    <div class="modal fade" id="unitName" tabindex="-1" role="dialog" aria-labelledby="unitNameLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unitNameLabel">Add UNIT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['url' => url('admin/product-unit'), 'class' => '', 'id' => 'unitForm']) }}
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="unit-name" id="unitName" placeholder="Enter Product Unit Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" value="Submit">ADD</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="catName" tabindex="-1" role="dialog" aria-labelledby="catNameabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="catNameLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => url('admin/product-category'), 'class' => '', 'id' => 'categoryForm']) }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="category-name" id="categoryName" placeholder="Enter Product Category Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Submit">ADD</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="typeName" tabindex="-1" role="dialog" aria-labelledby="typeNameLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="typeNameLabel">Add TYPE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => url('admin/product-type'), 'class' => '', 'id' => 'productTypeForm']) }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="type-name" id="productTypeName" placeholder="Enter Product TYPE Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Submit">ADD</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
