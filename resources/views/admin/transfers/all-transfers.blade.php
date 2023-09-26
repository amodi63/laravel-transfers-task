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
    

    
    <div class="col-lg-12">
        <div class="card card-custom card-stretch">
            <div class="card-header bg-light">
                <div class="card-title">
                    <h3 class="card-label">All Users Transfers</h3>
                </div>
                <div class="card-toolbar">
                   
                </div>
            </div>
          
                    <div class="card-body transfers-table">
                        <form class="form-inline mb-3" id="filter-form">
                            <div class="form-group mr-2">
                                <label for="from_date" class="mr-2">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date">
                            </div>
                            <div class="form-group mr-2">
                                <label for="to_date" class="mr-2">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date">
                            </div>
                            <div class="form-group mr-2">
                                <label for="amount" class="mr-2">Transfer Amount</label>
                                <select class="form-control mr-2" id="amount_operator" name="amount_operator">
                                    <option value="=">Equal to</option>
                                    <option value=">">Greater than</option>
                                    <option value="<">Less than</option>
                                </select>
                                <input type="number" class="form-control" id="amount" name="amount">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Filter</button>
                            <button type="button" class="btn btn-secondary" id="clear-btn">Clear</button>
                        </form>
                        @include('admin.transfers.all-transfers-tbl')
                    </div>
           
        </div>
    </div>




@endsection
@push('scripts')
<script>
    var tranfersRoutes = {
        'datatable': "{{ route('transfers.datatable') }}",
        'exportExcel': "{{ route('transfers.export.excel') }}",
    }
</script>
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

    <script src="{{ asset('pages/transfers/index.js') }}"></script>
    <!--end::Page Scripts-->
@endpush
