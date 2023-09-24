




    <div class="dropdown dropdown-inline"> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 mt-4"
            data-toggle="dropdown" aria-expanded="false"> <span class="svg-icon svg-icon-md"> <svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path
                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                            fill="#000000"></path>
                    </g>
                </svg> </span> </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;">
            <ul class="nav nav-hoverable flex-column updated-menu">
                
                <li class="nav-item">
                    <a href="#" class="nav-link btn btn-sm btn-clean btn-icon userViewBtn"
                         data-placement="bottom" title="View">
                        <i class="fa fa-eye"></i>
                        <span class="nav-text">View</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class=" nav-link btn btn-sm btn-clean btn-icon userEditBtn"
                        data-id="{{ $row->id }}" data-url="#" 
                        data-placement="bottom" title="Edit">
                        <i class="fa fa-edit"></i>
                        <span class="nav-text">Edit</span>
                    </a>
                </li>
                <li class="nav-item"> 
                    <a href="javascript:void(0);" class=" nav-link btn btn-sm btn-clean btn-icon userDelBtn"
                        data-url="#"  data-placement="bottom"
                        data-id="{{ $row->id }}" title="Delete">
                        <i class="fa fa-trash"></i>
                        <span class="nav-text">Delete</span>
                    </a>
                </li>
               
            </ul>
        </div>
           

  