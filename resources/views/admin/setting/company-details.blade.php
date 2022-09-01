@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Company Details</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/company') }}" class="btn btn-primary">Company</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h2>{{$companyDtlData->BANK_NAME}}</h2>
                        </div> --}}
                        <div class="card-body">
                            <h5 class="card-title"><b>ID:</b> {{!empty($companyDtlData->ID) ? $companyDtlData->ID : ''}}</h5>
                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Company Name:</b> {{!empty($companyDtlData->CO_NAME) ? $companyDtlData->CO_NAME: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Comapany Logo:</b> {{!empty($companyDtlData->CO_LOGO) ? $companyDtlData->CO_LOGO : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Email Address:</b> {{!empty($companyDtlData->EMAIL) ? $companyDtlData->EMAIL: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Contact No:</b> {{!empty($companyDtlData->PHONE) ? $companyDtlData->PHONE: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Address:</b> {{!empty($companyDtlData->ADDRESS) ? $companyDtlData->ADDRESS: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>State:</b> {{!empty($companyDtlData->STATE) ? $companyDtlData->STATE: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>City:</b> {{!empty($companyDtlData->CITY) ? $companyDtlData->CITY : ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Country:</b> {{!empty($companyDtlData->COUNTRY) ? $companyDtlData->COUNTRY :''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>PAN No:</b> {{!empty($companyDtlData->PAN) ? $companyDtlData->PAN: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>GSTIN:</b> {{!empty($companyDtlData->GSTIN) ? $companyDtlData->GSTIN: ''}}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Company URL:</b> {{!empty($companyDtlData->URL) ? $companyDtlData->URL:''}}</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('footer_script')

@endsection


                                {{-- public function show($ID, Request $request){
                                    $companyDtlData = CompanyDtl::where('ID', $ID)->first();
                                    return view('admin.setting.company-details', compact('companyDtlData'));
                                } --}}