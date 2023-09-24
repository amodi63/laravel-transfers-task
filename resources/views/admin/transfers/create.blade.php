@extends('layouts.admin.master')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ auth()->user()->first_name }} Transfers</h5>
@endsection
@push('style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted mr-2">Transfers</a>
    </li>
@endsection
@section('content')
    <div class="col-lg-12 mb-10"  >
        
        <!--begin::Card-->

        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">

                <div class="card-title d-flex justify-content-between w-100 ">
                    <h3 class="card-label">Trasfares
                    </h3>
                    
                    
                    <span  class="label label-lg label-light-primary label-inline  ">Total Amount: @if(auth()->user()->balance > 0 ) {{ auth()->user()->balance }} @endif</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('transfers.store') }}" id="transfer-form" method="post" >
                    @csrf
                <div class="row">
                    
                    <div class="col-md-4">
                        <!-- Select input -->
                        <div class="form-group">
                            <label class="">Merchant Name</label>
                        
                                <select class="form-control select2" id="kt_select2_4"  name="merchant_id">
                                    <option value="" >Select</option>
                                    @foreach ($merchants as $merchant)
                                        <option value="{{ $merchant->id }}">{{ $merchant->first_name .' ' .  $merchant->last_name }}</option>
                                    @endforeach
                                    
                                </select>
                                <span class="merchant_error"></span>
                          
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- Number input -->
                        <div class="form-group">
                            <label for="numberInput1">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- Number input -->
                        <div class="form-group">
                            <label for="numberInput2">Deductions</label>
                            {{-- <input type="text" disabled class="form-control" value="{{ number_format(Transfer::FIXED_DEDUCTIONS * 100, 1) }}%" id="fixed_deductions"> --}}
                            <div class="input-group">
                                <input type="text" class="form-control" id="deduction_entered" name="deduction_entered" aria-label="Deductions">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-between align-items-center">
                        <!-- Save and Clear buttons -->
                        <div class="btn-group ml-auto  gap-3">
                        
                            <button type="button" class="btn btn-primary" id="saveTransferBtn">
                                
                                Save</button>
                            <button class="btn btn-secondary ml-2" id="clearBtn">Clear</button>
                        </div>
                    </div>

                </div>
                </form>
            </div>
            


        </div>
    </div>
    <!--end::Card-->

    
    <div class="col-lg-12">
        <div class="card card-custom card-stretch">
            <div class="card-header ">

                <div class="card-title ">
                    <h3 class="card-label">All Your Transfers 
                    </h3>
                </div>

            </div>
                    <div class="card-body transfers-table">
                        @include('admin.transfers.transfers-users-tbl')
                    </div>
           
        </div>
    </div>




@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors-->
     <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <!--begin::Page Scripts(used by this page)-->
  
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/toastr.js?v=7.2.9') }}"></script>

    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('pages/transfers/create.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
