@extends('layouts.admin.master')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Profile</h5>
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
    <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ ucfirst($user->full_name) }}</span>
    </div>
@endsection
@section('toolbar_action')
    <!--begin::Button-->
    <a href="{{ url()->previous() }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
    <!--end::Button-->
    @if($user->id == auth()->user()->id)
    <div class="btn-group ml-2">
        <button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" id="update-profile-btn">Save
            Changes</button>

    </div>
    @endif
@endsection
@push('style')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('breadcrumb')
@endsection
@section('content')

    <div class="col-12">
        {{-- begin::Card --}}
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                                <path
                                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Profile</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Account</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        @if($user->id == auth()->user()->id)
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                                <path
                                                    d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                                <path
                                                    d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Change Password</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24">
                                                </rect>
                                                <path
                                                    d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                                <path
                                                    d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Settings</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        @endif
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                
                <form class="form" id="profile-form"  action="{{ route('user.profile.update') }}"  method="post"
                    id="kt_form" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7 my-2">
                                    <!--begin::Row-->
                                    <div class="row">
                                       

                                        <label class="col-3"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-10">{{ $user->first_name }} Info:</h6>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Group-->
           
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Avatar</label>
                                        <div class="col-9">
                                            <div class="image-input image-input-empty image-input-outline"
                                                id="kt_user_edit_avatar"

                                                style="background-image: url({{ $user->profile?->profile_image }})">
                                                <div class="image-input-wrapper"></div>
                                                @if($user->user_id == auth()->id())
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_image"
                                                        accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="profile_avatar_remove">
                                                </label>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title=""
                                                    data-original-title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip" title=""
                                                    data-original-title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    @php
                                        if(isset($user) && $user) {
                                            $encryptedUserId = encrypt($user->user_id);
                                        } else {
                                            $encryptedUserId = null; // Handle the case when the user is not found
                                        }
                                    @endphp

                                    @if ($encryptedUserId)
                                        <input type="hidden" name="user_id" value="{{ $encryptedUserId }}">
                                    @endif

                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">First Name</label>
                                        <div class="col-9">
                                        
                                            <input class="form-control form-control-lg form-control-solid" type="text" @disabled($user->user_id != auth()->id())
                                                value="{{ old('first_name', $user->first_name) }}" name="first_name">
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Last Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" @disabled($user->user_id != auth()->id())
                                                name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Birth Of Date</label>
                                        <div class="col-9">
                                            <div class="input-group date input-group-lg input-group-solid">
                                                <input type="text"
                                                    class="form-control form-control-lg form-control-solid"
                                                    id="kt_datepicker_2"
                                                    value="{{ old('date_of_birth', $user->profile?->date_of_birth) }}" @disabled($user->user_id != auth()->id())
                                                    name='date_of_birth' placeholder="Select date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Email Address</label> 
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-lg form-control-solid" name="email"
                                                    value="{{ old('email', $user->email) }}" placeholder="Email" @disabled($user->user_id != auth()->id())>
                                            </div>
                                            <span class="form-text text-muted">We'll never share your email with anyone
                                                else.</span>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    {{-- <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">

                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="password" value="" placeholder="passwrod">
                                            </div>

                                        </div>
                                    </div> --}}
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Contact Phone</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="phone_no"
                                                    value="{{ old('phone_no', $user->profile?->phone_no) }}" @disabled($user->user_id != auth()->id())
                                                    placeholder="Phone">
                                            </div>

                                        </div>
                                    </div>
                                    <!--end::Group-->
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab-->
                        <!--begin::Tab-->
                        <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="my-2">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <label class="col-form-label col-3 text-lg-right text-left"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Acount Information:</h6>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Username</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="username"
                                                    value="{{ old('username', $user->username) }}" @disabled($user->user_id != auth()->id())>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Job Title</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="job_title"
                                                    value="{{ old('job_title', $user->profile->job_title) }}" @disabled($user->user_id != auth()->id())>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Identification Number</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="number" name="id_no"
                                                    value="{{ old('id_no', $user->id_no) }}" @disabled($user->user_id != auth()->id())>
                                            </div>
                                        </div>
                                        <!--end::Group-->

                                        <!--begin::Group-->
                                        {{-- <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Country</label>
                                            <div class="col-9">
                                                <select class="form-control form-control-lg form-control-solid"
                                                    name="country" value="{{ old('country', $user->profile?->country) }}">
                                                    <option>Select Country</option>
                                                    @isset($countries)
                                                        @foreach ($countries as $key => $country)
                                                            <option value="{{ $key }}">
                                                                {{ $country }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div> --}}
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">City</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="city"
                                                    value="{{ old('city', $user->profile?->city) }}" @disabled($user->user_id != auth()->id())>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Address</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="address"
                                                    value="{{ old('address', $user->profile?->address) }}" @disabled($user->user_id != auth()->id())>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        {{-- <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">State</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="text" name="state"
                                                    value="{{ old('state', $user->profile?->state) }}">
                                            </div>
                                        </div>
                                        <!--end::Group--> --}}



                                        <!--begin::Group-->
                                        <div class="form-group row align-items-center">
                                            <label class="col-form-label col-3 text-lg-right text-left">Gender</label>
                                            <div class="col-9">
                                                <div class="radio-inline">

                                                    <x-form.radio name="gender" :options="['male' => 'Male', 'female' => 'Female']"   :disabled="$user->user_id != auth()->id()"  :checked="$user->profile->gender"   />
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Group-->

                                    </div>
                                </div>

                            </div>

                            <!--end::Row-->
                </form>
            </div>
            <!--end::Tab-->


            <!--begin::Tab-->
            <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                <form>

                    <!--begin::Body-->
                    <div class="card-body">
                        @if($user->id == auth()->user()->id)
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <!--begin::Row-->
                                <div class="row mb-5">
                                    <label class="col-3"></label>
                                    <div class="col-9">
                                        <div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
                                            <div class="alert-icon">
                                                <i class="flaticon-warning"></i>
                                            </div>
                                            <div class="alert-text font-weight-bold">Configure user passwords to
                                                expire periodically.
                                                <br>Users will need warning that their passwords are going to
                                                expire, or they might inadvertently get locked out of the system!
                                            </div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">
                                                        <i class="la la-close"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-3"></label>
                                    <div class="col-9">
                                        <h6 class="text-dark font-weight-bold mb-10">Change Or Recover Your
                                            Password:</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                {{-- <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Current
                                        Password</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid mb-1"
                                            type="password" name="password">
                                        <a href='' class="font-weight-bold font-size-sm">Forgot password?</a>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">New
                                        Password</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            name="new_password" value="">
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Verify
                                        Password</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            value="" name="new_password_confirmation">
                                    </div>
                                </div> --}}
                                <!--end::Group-->
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9 d-flex justify-content-end">
                                        <button type="button" class="btn btn-light-primary font-weight-bold "
                                            data-toggle="modal" data-target="#kt_modal_change-password">Change
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                     
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer pb-0">

                    </div>
                    <!--end::Footer-->
                </form>
                <!--begin::Modals-->
                <!--begin::Modal-Two-factor authentication-->
                {{-- <div class="modal fade 2faModal" id="kt_modal_two_factor_authentication" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!--begin::Modal header-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bolder" id="modal-title">2 Factor Authentication</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body">
                                <!--begin::confirm Password Body-->
                                <div id="confirm-content">
                                    <!--begin::Heading-->
                                    <h5 class="text-dark font-weight-bolder mb-7">Confirm Password</h5>
                                    <!--end::Heading-->
                                    <!--begin::Form-->
                                    <form id="confirm-password-form" class="form"
                                        action="{{ route('password.confirm') }}">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">

                                            <input type="password" class="form-control form-control-lg form-control-solid"
                                                placeholder="Enter Your Password" name="password" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                                data-dismiss="modal">Close</button>
                                            <button type="button"
                                                id="confirm-btn"class="btn btn-primary font-weight-bold">Confirm</button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::confirm Password Body-->
                                <!--begin::Enable Body-->
                                <div id="two-factor-enable" class="d-none">
                                    <!--begin::Heading-->
                                    <!--end::Heading-->
                                    <!--begin::Description-->
                                    <label
                                        class="btn btn-outline border border-dashed btn-outline-dotted btn-outline-default p-7 d-flex"
                                        for="kt_modal_two_factor_authentication_option_1">
                                        <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                        <span class="svg-icon svg-icon-4x me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="d-block font-weight-bold text-start">
                                            <span class="font-weight-bolder d-block ">Authenticator Apps</span>
                                            <span class="text-muted fw-bold fs-6">Get codes from an app like Google
                                                Authenticator, Microsoft Authenticator, Authy or 1Password.</span>
                                        </span>
                                    </label>
                                    <!--end::Description-->
                                    <!--begin::Actions-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">Close</button>
                                        <button type="button"
                                            id="enable-btn"class="btn btn-primary font-weight-bold">Enable</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Enable Body-->

                            </div>
                            <!--begin::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal header-->
                </div> --}}
                <!--end::Modal-Two-factor authentication-->
                <!--end::Modals-->
                <!--begin::Notice-->
                {{-- <h3>2 Factor Authentication</h3>
                </div>
                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-check.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                    fill="#000000" opacity="0.3" />
                                <path
                                    d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-bold col-11">
                            <h4 class="text-gray-900 fw-bolder">Secure Your Account</h4>
                            <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security
                                to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        @if (!auth()->user()->two_factor_secret)
                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" id="enBtn"
                                data-toggle="modal" data-target="#kt_modal_two_factor_authentication">Enable</a>
                        @else
                            <form id="disable_2fa_form" action="{{ route('two-factor.disable') }}">
                                @method('delete')
                                <button href="#" class="btn btn-danger px-6 align-self-center text-nowrap"
                                    data-toggle="modal" id="disable_2fa">Disable</button>
                            </form>
                            <!--end::Action-->
                            <!--end::Wrapper-->
                            
                        
                        @endif
                    </div>
                    <!--end::Notice-->
                    
                </div>   <div class="mb-3"> --}}

                <!--begin::2FA Body -->
                {{-- <div id="two-factor-content" class="d-grid">
                    @if (auth()->user()->two_factor_secret)
                      
                        <p class="col-9 mt-5" style="font-size: 16px;margin-left: -12px;">
                            Using an authenticator app like
                            <a href="https://support.google.com/accounts/answer/1066447?hl=en" target="_blank">Google
                                Authenticator</a>,
                            <a href="https://www.microsoft.com/en-us/account/authenticator" target="_blank">Microsoft
                                Authenticator</a>,
                            <a href="https://authy.com/download/" target="_blank">Authy</a>, or
                            <a href="https://support.1password.com/one-time-passwords/" target="_blank">1Password</a>,
                            scan the QR code. It will generate a 6 digit code for you to enter below.
                        </p>
                        <div class="text-gray-500 font-weight-bold  fs-6 mb-10 col-6 mt-10">
                            <!--begin::QR code image-->
                            <div class="pt-2  text-center row">

                                {!! auth()->user()->twoFactorQrCodeSvg() !!}

                            </div>
                            <!--end::QR code image-->
                        </div>
                        <!--end::Description-->
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex col-6 bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-danger svg-icon-2x">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Warning-1-circle.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                            r="10" />
                                        <rect fill="#000000" x="11" y="7" width="2"
                                            height="8" rx="1" />
                                        <rect fill="#000000" x="11" y="16" width="2"
                                            height="2" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">If you having trouble using the QR code, select
                                        manual
                                        entry on your app, and enter your username and the code:
                                        <div class="fw-bolder text-dark pt-2">
                                        @foreach (auth()->user()->recoveryCodes() as $code)
                                           <h6>{{ $code  }} </h6>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--begin::form-->
                        
                        @endif
                </div> --}}
                <!--end::2FA Body-->
            </div>
            <!--end::Tab-->



            <!--begin::Tab-->
            <div class="tab-pane px-7" id="kt_user_edit_tab_4" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-2">
                            <div class="row">
                                <label class="col-form-label col-3 text-lg-right text-left"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-7">Setup Notification:</h6>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label col-3 text-lg-right text-left">Email Notification</label>
                                <div class="col-3">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" checked="checked" name="select">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-form-label col-3 text-lg-right text-left">Mobile Notification</label>
                                <div class="col-3">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" name="select">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="row">
                            <label class="col-form-label col-3 text-lg-right text-left"></label>
                            <div class="col-9">
                                <h6 class="text-dark font-weight-bold mb-7">Activity Related Emails:</h6>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="separator separator-dashed mb-10"></div> --}}
                {{-- <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">When To Email</label>
                            <div class="col-9">
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        <span></span>You have new notifications.</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        <span></span>You're sent a direct message</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox">
                                        <input type="checkbox" checked="checked">
                                        <span></span>Someone adds you as a connection</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">When To Escalate Emails</label>
                            <div class="col-9">
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox">
                                        <span></span>Upon new order</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox">
                                        <span></span>New membership approval</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox">
                                        <span></span>Member registration</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="separator separator-dashed mb-10"></div>
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="row">
                            <label class="col-form-label col-3 text-lg-right text-left"></label>
                            <div class="col-9">
                                <h6 class="text-dark font-weight-bold mb-7">Updates From Keenthemes:</h6>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Email You With</label>
                            <div class="col-9">
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox">
                                        <span></span>News about Metronic product and feature updates</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox">
                                        <span></span>Tips on getting more out of Keen</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" checked="checked">
                                        <span></span>Things you missed since you last logged into Keen</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" checked="checked">
                                        <span></span>News about Metronic on partner products and other services</label>
                                </div>
                                <div class="checkbox-inline mb-2">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" checked="checked">
                                        <span></span>Tips on Metronic business products</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="separator separator-dashed mb-10"></div>
                <!--begin::SecurityRow-->
                <form action="{{ route('user.profile.deactivate-acount') }}" id="deactivate-acount">
                    @method('DELETE')
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-form-label col-3 text-lg-right text-left"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Deactivate Acount:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->
                            {{-- <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Login verification</label>
                                <div class="col-9">
                                    <button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup
                                        login verification</button>
                                    <div class="form-text text-muted mt-3">After you log in, you will be asked for
                                        additional information to confirm your identity and protect your account from being
                                        compromised.
                                        <a href="#">Learn more</a>.
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Password reset
                                    verification</label>
                                <div class="col-9">
                                    <div class="checkbox-inline">
                                        <label class="checkbox mb-2">
                                            <input type="checkbox">
                                            <span></span>Require personal information to reset your password.</label>
                                    </div>
                                    <div class="form-text text-muted">For extra security, this requires you to confirm your
                                        email or phone number when you reset your password.
                                        <a href="#" class="font-weight-bold">Learn more</a>.
                                    </div>
                                </div>
                            </div> --}}
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row mt-2">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <button type="button" class="btn btn-light-danger font-weight-bold btn-sm"
                                        id="deactivate-acount-btn">Deactivate your account ?</button>
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </form>
                <!--end::SecurityRow-->
            </div>
            <!--end::Tab-->
            @endif 
        </div>

    </div>
    <!--begin::Card body-->
    </div>
    {{-- end::Card --}}
    </div>
    {{-- end::Container --}}
    <!--begin::Modals-->
    <!--begin::Modal-Change Password -->
    <div class="modal fade change-password-modal" id="kt_modal_change-password" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!--begin::Modal header-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <h2 class="modal-title font-weight-bolder" id="modal-title">Change Password</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body">
                    <!--begin::confirm Password Body-->
                 
                        <!--begin::Heading-->
                        {{-- <h5 class="text-dark font-weight-bolder mb-7">Confirm Password</h5> --}}
                        <!--end::Heading-->
                        <!--begin::Form-->
                        <form method="post" id="change_pssword-form"
                            action="{{ route('user.profile.change-password') }}">
                          
                            @method('patch')
                            @csrf
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 text-lg-right text-left">Current
                                    Password</label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-lg form-control-solid mb-1" type="password"
                                        name="password">
                                    {{-- <a href='' class="font-weight-bold font-size-sm">Forgot password?</a> --}}
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 text-lg-right text-left">New
                                    Password</label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        name="new_password" value="">
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 text-lg-right text-left">Verify
                                    Password</label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        value="" name="new_password_confirmation">
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Actions-->
                            
                            <div class="modal-footer px-0 py-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="btn-change-password" class="btn btn-primary">Update Password</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                 
                    <!--end::confirm Password Body-->
                    

                </div>
                <!--begin::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal header-->
    </div>
    <!--end::Modal-Change Password -->
    <!--end::Modals-->
@endsection
@push('scripts')
    <script>
        let enableURL = "{{ route('two-factor.enable') }}";
        let recoveryCodeURL = "{{ route('two-factor.recovery-codes') }}";
    </script>
    <script src="{{ asset('assets/js/pages/custom/user/edit-user.js') }}"></script>
    <script src="{{ asset('assets/js/pages/custom/user/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets/js/pages/crud/file-upload/image-input.js') }}"></script>
    <script>
        $(document).ready(function() {

            //Begin Ajax Add Profile Data
            $('#update-profile-btn').on('click', function() {
                var form = $('#profile-form')[0];
                var url = $('#profile-form').attr('action');
             
                $('#update-profile-btn').html('Saving...');
                $('#update-profile-btn').attr('disabled', true);
                $('.text-danger').html('');

                var _data = new FormData(form);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url ,
                    data: _data,
                    method: 'post',
                    processData: false,
                    contentType: false,
                    enctype: "multipart/form-data",
                    success: function(response) {
                        $('#update-profile-btn').attr('disabled', false);
                        $('#update-profile-btn').html('Save Changes');
                        if (response.success == true) {
                            toastr.success(response.message);
                            // setTimeout("window.location.href='{{ url()->previous() }}';",2000);

                        } else {
                            toastr.error(response.message);
                        }

                    },
                    error: function(error) {

                        $('#update-profile-btn').attr('disabled', false);
                        $('#update-profile-btn').html('Save Changes');
                        $.each(error.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                            // $('#' + index + '_error').html(value);
                        });

                    }
                })
            });
            //End Ajax Add Profile Data


            //Begin Ajax Change Password 
            $('#btn-change-password').on('click', function() {
                var form = $('#change_pssword-form')[0];
                $('#btn-change-password').html('Updaing...');
                $('#btn-change-password').attr('disabled', true);
                $('.text-danger').html('');
                var urlChangePassword = $('#change_pssword-form').attr('action');

                var dataForm = new FormData(form);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: urlChangePassword,
                    data: dataForm,
                    method: 'post',
                    processData: false,
                    contentType: false,
                    enctype: "multipart/form-data",
                    success: function(response) {

                        $('#kt_modal_change-password').modal('hide');
                        $('#btn-change-password').attr('disabled', false);
                        $('#btn-change-password').html('Update Password');
                        if (response.success == true) {
                            toastr.success(response.message);
                    
                            $('#change_pssword-form')[0].reset();
                          

                        } else {
                            toastr.error(response.message);
                        }

                    },
                    error: function(error) {

                        $('#btn-change-password').attr('disabled', false);
                        $('#btn-change-password').html('Update Password');
                        $.each(error.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                            // $('#' + index + '_error').html(value);
                        });

                    }
                })
            });
            //End Ajax Change Password  


            //Begin Ajax Deactivate Acount
            $('body').on('click', '#deactivate-acount-btn', function() {
                _deleteURL = $('#deactivate-acount').attr('action');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: _deleteURL,
                            method: "DELETE",
                            success: function(response) {
                                if (response.success == true) {
                                    window.location.href = '/login';


                                    toastr.success(response.message);
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(error) {
                                toster.error('Somthing Error Try Again Later!')
                            }
                        })
                    }
                });


            })
            //End Ajax Deactivate Acount



        })
    </script>
@endpush
