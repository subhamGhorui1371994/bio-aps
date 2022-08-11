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
                            <h2>{{$employeeDtlData->EMPLOYEE_NAME}}</h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Employee Code:</b> {{!empty($employeeDtlData->EMPLOYEE_CODE) ? $employeeDtlData->EMPLOYEE_CODE : ''}}</h5>
                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Employee Email:</b> {{!empty($employeeDtlData->EMAIL) ? $employeeDtlData->EMAIL : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Contact No:</b> {{!empty($employeeDtlData->CONTACT_NO) ? $employeeDtlData->CONTACT_NO : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>PAN No:</b> {{!empty($employeeDtlData->PAN) ? $employeeDtlData->PAN : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Date Of Birth:</b> {{!empty($employeeDtlData->DOB) ? $employeeDtlData->DOB: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>ID No:</b> {{!empty($employeeDtlData->ID) ? $employeeDtlData->ID : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Branch Code:</b> {{!empty($employeeDtlData->BRANCH_CODE) ? $employeeDtlData->BRANCH_CODE :''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Branch Name:</b> {{!empty($employeeDtlData->BRANCH_NAME) ? $employeeDtlData->BRANCH_NAME:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Date Of Joining:</b> {{!empty($employeeDtlData->DOJ) ? $employeeDtlData->DOJ: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Address:</b> {{!empty($employeeDtlData->ADDRESS) ? $employeeDtlData->ADDRESS:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>City:</b> {{!empty($employeeDtlData->CITY) ? $employeeDtlData->CITY:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>PIN Code:</b> {{!empty($employeeDtlData->PIN) ? $employeeDtlData->PIN:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>State Name:</b> {{!empty($employeeDtlData->STATE_NAME) ? $employeeDtlData->STATE_NAME:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Contry:</b> {{!empty($employeeDtlData->CONTRY) ? $employeeDtlData->CONTRY:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>State:</b> {{!empty($employeeDtlData->STATE) ? $employeeDtlData->STATE:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Employee Designation:</b> {{!empty($employeeDtlData->DESIGNATION) ? $employeeDtlData->DESIGNATION:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Manager:</b> {{!empty($employeeDtlData->MANAGER) ? $employeeDtlData->MANAGER:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>User:</b> {{!empty($employeeDtlData->USER) ? $employeeDtlData->USER:''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>DEPT:</b> {{!empty($employeeDtlData->DEPT) ? $employeeDtlData->DEPT:''}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

@endsection
