@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Bank Details</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/bank-dtl') }}" class="btn btn-primary">Company Banks</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{$bankDtlData->BANK_NAME}}</h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Bank Code:</b> {{!empty($bankDtlData->BANK_CODE) ? $bankDtlData->BANK_CODE : ''}}</h5>
                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>A/C Holder:</b> {{!empty($bankDtlData['A/C_HOLDER']) ? $bankDtlData['A/C_HOLDER']: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>A/C Number:</b> {{!empty($bankDtlData['A/C_NUMBER']) ? $bankDtlData['A/C_NUMBER']: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Branch Name:</b> {{!empty($bankDtlData->BRANCH_NAME) ? $bankDtlData->BRANCH_NAME : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Address:</b> {{!empty($bankDtlData->ADDRESS) ? $bankDtlData->ADDRESS : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>IFSC Code:</b> {{!empty($bankDtlData->IFSC_CODE) ? $bankDtlData->IFSC_CODE : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>MICR:</b> {{!empty($bankDtlData->MICR) ? $bankDtlData->MICR: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>SWIFT Code:</b> {{!empty($bankDtlData->SWIFT_CODE) ? $bankDtlData->SWIFT_CODE : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>BR Code:</b> {{!empty($bankDtlData->BR_CODE) ? $bankDtlData->BR_CODE : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>OP BL:</b> {{!empty($bankDtlData->OP_BL) ? $bankDtlData->OP_BL :''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>CL BL:</b> {{!empty($bankDtlData->CL_BL) ? $bankDtlData->CL_BL: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Year:</b> {{!empty($bankDtlData->YEAR) ? $bankDtlData->YEAR: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>CO ID:</b> {{!empty($bankDtlData->CO_ID) ? $bankDtlData->CO_ID:''}}</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('footer_script')

@endsection
