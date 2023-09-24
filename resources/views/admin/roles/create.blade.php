@extends('layouts.admin.master')
@section('breadcrumb')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
  <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-1">

      <!--begin::Page Heading-->
      <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">
          Permissions </h5>
        <!--end::Page Title-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
          <li class="breadcrumb-item">
            <a href="" class="text-muted">
              Add Role</a>
          </li>

        </ul>
        <!--end::Breadcrumb-->
      </div>
      <!--end::Page Heading-->
    </div>
    <!--end::Info-->

  </div>
</div>
@endsection

@section('content')

<div class="col-md-12">
  <div class="card card-custom gutter-b ">


    <div class="card-header border-0 py-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label font-weight-bolder text-dark">Permissions</span>
        @if($type == 'create')
        <span class="text-muted mt-3 font-weight-bold font-size-sm">Add Role</span>
        @else
        <span class="text-muted mt-3 font-weight-bold font-size-sm">Edit Role</span>
        @endif
      </h3>
    </div>

    <form class="form" id="addFrom" method="post" action="{{$route}}">
      @csrf
      <!--begin::Form-->
      <div class="card-body">
        <div class="row">

          <div class="form-group col-md-12">
            <div class="row">
              <label class="col-form-label text-right   col-md-2 ">Role's name in Arabic:</label>
              <div class=" col-md-8">
                <input class="form-control " type="text" autocomplete="off" name="name_ar" id="name_ar"
                  @isset($role)value="{{$role->title['name_ar']}}" @endisset>
              </div>
            </div>
          </div>


          <div class="form-group col-md-12">
            <div class="row">
              <label class="col-form-label text-right   col-md-2 ">Role's name in English:</label>
              <div class=" col-md-8">
                <input class="form-control " type="text" autocomplete="off" name="name" id="name"
                  @isset($role)value="{{$role->title['name_en']}}" @endisset>


              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="card-footer align-items-center flex-wrap flex-column flex-sm-row text-center">
        <button type="submit" id="submit" class="btn btn-primary   text-uppercase font-weight-bolder ">
          save
        </button>
        <a href="{{route('admin.roles.index')}}" id=" " class="btn btn-danger font-weight-bolder font-size-sm">back</a>
      </div>
    </form>

  </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/role_validators.js')}}"></script>

<script>
  $(document).on('submit', '#addFrom', function (e) {
        e.preventDefault();
                
        validation_role.validate().then(function (status) {
          if (status != 'Valid'){
            return false;
            KTUtil.scrollTop();
          } else {
            var data = $('#addFrom').serialize();
            var url = $('#addFrom').attr('action');
            @if($type == 'create')
              var method ="post"
            @else
              var method ="put"

            @endif 
            $.ajax({
              url: url,
              type: method,
              data: data,
              dataTypes: 'json',
              async: false,
              beforeSend: function () {
                $('#addFrom #submit').prop('disabled', true);
                $('.spinner').show();
              },
              success: function (data) {
                if (data.status == true) {
                  $('#addFrom #submit').prop('disabled', false);
                  @if($type == 'create')
                  toaster('Success','Role has been ceated successfully', 'success');
                  @else
                  toaster('Success','Role has been edited successfully', 'success');
                  @endif

                  cleanForm();
                  KTUtil.scrollTop();
                } else {
                    toaster('','Something went wrong', 'danger');
                }
                $('.spinner').hide();
                //type=>success ,danger,warning,info,primary,dark
              },
              error: function (jqXhr) {
                $('#addFrom #submit').prop('disabled', false);
              }
            })
          }
        })
      });

      function cleanForm() {
        $("#addFrom #name").val('');
         $("#addFrom #name_ar").val('');
      }

</script>
@endpush