@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Employee Details</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/employee-dtl') }}" class="btn btn-primary">Back To Employee Detail</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$employeeDtlData->EMPLOYEE_NAME}}</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Employee Code: {{!empty($employeeDtlData->EMPLOYEE_CODE) ? $employeeDtlData->EMPLOYEE_CODE : ''}}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

@endsection
