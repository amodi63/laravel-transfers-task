@extends('layouts.admin.master')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Roles</h5>
@endsection
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
                Roles Management</a>
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
          <span class="text-muted mt-3 font-weight-bold font-size-sm">
            Roles Management
          </span>
        </h3>

          <div class="card-toolbar">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary font-weight-bolder font-size-sm mr-3">
               Add Role</a>
          </div>

      </div>

      <!--begin::Form-->
      <div class="card-body">
        <table  id="DataTable" class="table table-head-custom table-head-bg table-borderless table-vertical-center">
          <thead>
          <tr class="text-center text-uppercase">
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach ($roles as $index => $role)

            <tr class="list-users">
              <td class="text-center">{{ $index + $roles->firstItem() }}</td>
              <td class="text-center">{{ $role->name }}</td>
              <td class="text-center">
                  <a class="btn btn-icon btn-success  btn-xs" href="{{ route('admin.roles.edit',$role->id) }}">
                    <i class="flaticon-edit"></i>
                  </a>

                  <a class="btn btn-icon btn-danger btn-xs" href="{{ route('admin.roles.destroy', $role->id) }}"
                    onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this role?')) {
                        document.getElementById('delete-form').submit();
                    }">
                     <i class="flaticon2-delete"></i>
                 </a>
                 
                 <form id="delete-form" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                     @csrf
                     @method('DELETE')
                 </form>
                  <a class="btn btn-icon btn-danger  btn-xs"
                     href="{{ route('role.permissions.index', [$role->id]) }}">
                    <i class="flaticon-safe-shield-protection"></i>
                  </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection

