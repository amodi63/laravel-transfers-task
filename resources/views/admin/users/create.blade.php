@extends('layouts.admin.master')




@section('content')





<div class="card card-custom card-shadowless rounded-top-0 w-75 ">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-10">
                            <!--begin::Wizard Form-->
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                <div class="row justify-content-center">
                                    <div class="col-xl-9">
                                        <!--begin::Wizard Step 1-->
                                        <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                            <h5 class="text-dark font-weight-bold mb-10">Add Users</h5>
                                            <!--begin::Group-->

                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row fv-plugins-icon-container">
                                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="first_name" type="text" value="">
                                                <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row fv-plugins-icon-container">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="last_name" type="text" value="">
                                                <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row fv-plugins-icon-container">
                                                <label class="col-xl-3 col-lg-3 col-form-label">User Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg" name="username" type="text" value="">

                                                <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->

                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row fv-plugins-icon-container">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-solid input-group-lg">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="email" value="">
                                                    </div>
                                                <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <fieldset>

                                                <legend>
                                                    Roles
                                                </legend>
                                                    <div class="row justify-content-between">

                                                        @foreach ($roles as $role)
                                                        <div class="form-group col-6 row">
                                                            <label class="col-6 ">{{ $role->name }}</label>
                                                            <div class="col-6">
                                                                <span class="switch switch-outline switch-icon switch-dark">
                                                                    <label>
                                                                        <input type="checkbox"  name="roles[{{ $role->id }}]" />
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                         @endforeach

                                                    </div>
                                            </fieldset>

                                            <!--end::Group-->
                                        </div>
                                        <!--end::Wizard Step 1-->


                                        <!--begin::Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">

                                            <div>
                                                <button type="submit" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">
                                                    Add
                                                </button>


                                            </div>
                                        </div>
                                        <!--end::Wizard Actions-->
                                    </div>
                                </div>
                            <div></div><div></div><div></div></form>
                            <!--end::Wizard Form-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

@endsection


@push('scripts')
     <script src={{ asset('assets/js/pages/custom/user/add-user.js') }}></script>
      <script src={{ asset("assets/js/pages/crud/forms/validation/rooms/form-controls.js") }}></script>
@endpush
