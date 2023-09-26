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
        <a href="#" class="text-muted mr-2">Your Balance Transfers</a>
    </li>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card card-custom card-stretch">
        <div class="card-header ">

            <div class="card-title ">
                <h3 class="card-label">All your Balance Transfers

                </h3>
            </div>

        </div>
                <div class="card-body transfers-table">
                    @include('merchant.tbl')
                </div>
       
    </div>
</div>
@endsection
