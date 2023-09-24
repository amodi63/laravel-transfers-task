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
                 Roles' Management </a>
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
        <div>

          <input type="button" onclick='selects()'  class="btn btn-primary btn-sm" value="Select All"/>  
          <input type="button" onclick='deSelect()'  class="btn btn-danger btn-sm" value="Deselect All"/>
        </div>
      </div>
      

      <form id="formPermission">
        @csrf
        <!--begin::Form-->
        <div class="card-body">
          @if($type == 'role')
          <p><span>Role's name:</span> <span> {{$model->name}}</span></p>
          @else
          <p><span>User's name:</span> <span> {{$model->name}}</span></p>
          @endif
          @foreach ($screen as $index => $scr)
            <div class="accordion accordion-toggle-arrow" id="collapsedPermission{{$index}}">
              <div class="card">
                <div class="card-header">
                  <div class="card-title " data-toggle="collapse" data-target="#collapseOne{{$index+1}}"
                       aria-expanded="true">
                    {{$scr->name}}
                  </div>
                </div>
                <div id="collapseOne{{$index+1}}" class="collapse show" data-parent="#collapsedPermission{{$index}}"
                     style="">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="checkbox-inline ">
                        @foreach ($scr->permission as $index => $permission)
                        @if($permission->checked  == 1 )
                          <label class="checkbox checkbox-primary">
                            <input name="permission[]" value="{{$permission->id}}" class="chk" type="checkbox" checked="checked"  >
                            {{$permission->title}}
                            <span></span>
                          </label>
                        @elseif($permission->checked  == 2)
                        <label class="checkbox checkbox-danger checkbox-disabled">
                          <input name="permission[]" value="{{$permission->id}}" type="checkbox"checked="checked" disabled="disabled">
                          {{$permission->title}}
                          <span></span>
                        </label>
                        @else
                        <label class="checkbox checkbox-primary">
                          <input name="permission[]" value="{{$permission->id}}" class="chk" type="checkbox">
                          {{$permission->title}}
                          <span></span>
                        </label>
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="card-footer" align="left">
          <button type="submit" class="btn btn-primary font-weight-bold">save</button>
           @if($type == 'role')
           <a href="{{route('admin.roles.index') }}" class="btn btn-info font-weight-bold">back</a>
            @else
            <a href="{{route('admin.users.index') }}" class="btn btn-info font-weight-bold">back</a>

            @endif
        </div>
      </form>


    </div>
  </div>
@endsection

@push('scripts')

  <script>

    $(document).on('submit','#formPermission',function (e) {
      e.preventDefault();
     var data =$(this).serialize();
     var url = '{{$route}}';
      $.ajax({
        url: url,
        type: 'post',
        data: data,
        dataTypes: 'json',
         beforeSend: function () {
          $('#formPermission #submit').prop('disabled', true);
          $('.spinner').show();
        },
        success: function (data) {
          if (data.status == true) {
            $('#formPermission #submit').prop('disabled', false);
            toaster('Success','Permissions assigned successfully', 'success');
             KTUtil.scrollTop();
          } else {
            toaster('','Something went wrong', 'danger');
          }
          $('.spinner').hide();
          //type=>success ,danger,warning,info,primary,dark
        },
        error: function (jqXhr) {
          $('#formPermission #submit').prop('disabled', false);
        }
      })
    });

    function selects(){  
                var ele=document.getElementsByClassName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
    function deSelect(){  
        var ele=document.getElementsByClassName('chk');  
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
              
        }  
    }             
  </script>
@endpush