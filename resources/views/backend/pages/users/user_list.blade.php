@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/css/plugin/croppie/croppie.css') !!}" rel="stylesheet" type="text/css" />
    <style>
        #previewimage {
            height: 350px;
            width : 100% !important;
        }
    </style>
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!-- @include('backend.message.emergency_form_validation') -->
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">{!! __('user_list.user_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    @if(strpos(Auth::user()->role(), 'user_add'))
                        <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#add_admin_modal">
                        <i class="la la-plus"></i>Add User
                    </a>    
                    @endif
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads') }}/{{ $user->admin->photo }}" style="height: 70px; width: 70px;">
                            </td>
                            <td class="m_user_id d-none">{{ $user->id }}</td>
                            <td class="m_name">{{ $user->name }}</td>
                            <td class="m_email">{{ $user->email }}</td>
                            <td class="m_phone">{{ $user->admin->phone }}</td>
                            <td class="m_admin_role_id" value="{{ $user->admin_user_role_id }}">{{ $user->adminUserRole->name ?? '' }}</td>
                            <td class="m_designation">{{ $user->admin->designation ?? '' }}</td>
                            <td class="m_description">{{ $user->admin->description }}</td>

                            
                            <td>
                                @if( strpos(Auth::user()->admin->role(), 'user_edit') )
                                <a href="javascript:;" data-toggle="modal" data-target="#edit_user_modal" class="edit_user_btn">Edit</a> | 
                                @endif
                                <a href="{!! route('backend.users.access_form', $user->id) !!}">Role manage</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
 @endsection


@section('modals')
    <!-- Edit Modal-->
    <div class="modal fade" id="edit_user_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_user_list.modal_edit_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('backend.users.editSubmit') }}" id="edit_user_form" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="user_id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required value="{!! old('name') !!}">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Profile Photo</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="profile_photo"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('profile_photo')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required value="{!! old('email') !!}">
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" required value="{!! old('phone') !!}">
                            </div>


                            <div class="form-group col-sm-12 col-md-6">
                                <label>Role</label>
                                <select name="role" class="form-control" required data-size="7" data-live-search="true">
                                    <option value="">Select a role</option>
                                    @foreach($adminUsersRoles as $a_role)
                                        <option value="{{ $a_role->id }}">{{ $a_role->role_name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" required value="{!!old('designation')!!}">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Description</label>
                                <textarea class="form-control" name="description" value="{!! old('description') !!}"></textarea>
                            </div>    
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- 
        Add Admin user
    -->
    <div class="modal fade" id="add_admin_modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.users.create') !!}" method="POST" enctype="multipart/form-data">
                <div class="modal-body" style="height: 400px;">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required value="{!! old('name') !!}">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Profile Photo</label>
                                <div class="d-none img-container" style="border-right:1px solid #ddd;">
                                    <div id="image-preview"></div>
                                </div>
                                <div class="custom-file">
                                        <input type="file"  name="upload_image" id="upload_image" class="image custom-file-input image" required>
                                    <label class="custom-file-label" for="upload_image">Choose file</label>
                                </div>
                            </div>
                            <input type="hidden" name="profile_photo" id="profile_photo" value="">    

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required value="{!! old('email') !!}">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" required value="{!! old('phone') !!}">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required value="{!! old('password') !!}">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Role</label>
                                <select name="role" class="form-control" required data-size="7" data-live-search="true">
                                    <option value="">Select a role</option>
                                    @foreach($adminUsersRoles as $a_role)
                                        <option value="{{ $a_role->id }}">{{ $a_role->role_name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" required value="{{old('designation')}}"></input>
                                @error('role')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Description</label>
                                <textarea class="form-control" name="description" value="{!! old('description') !!}"></textarea>
                            </div>

                        </div>

                        

                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="create_user">Create User</button>
                </div>
                <div class="m-4"></div>
                </form>
            </div>
        </div>
    </div>

<!-- Demo modal -->
    <div class="modal fade" id="img-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.users.create') !!}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="create_user">Create User</button>
                </div>
                <div class="m-4"></div>
                </form>
            </div>
        </div>
    </div>


    
@endsection



 @section('custom_script')
     <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
     <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
     <script src="{!! asset('backend/assets/js/customs/user_page.js') !!}"></script>
     <script src="{{asset('backend')}}/assets/js/datatable.js"></script>

     <script src="{{asset('backend/assets/js/pages/features/miscellaneous/croppie.min.js')}}"></script>

     <script>
         $(document).ready(function(){

           $image_crop = $('#image-preview').croppie({
             enableExif:true,
             viewport:{
               width:200,
               height:150,
               type:'rectangle'
             },
             boundary:{
               width:300,
               height:250
             }
           });

           $('#upload_image').change(function(){
             $(".img-container").removeClass('d-none');
             var reader = new FileReader();

             reader.onload = function(event){
               $image_crop.croppie('bind', {
                 url:event.target.result
               }).then(function(){
                 console.log('jQuery bind complete');
               });
             }
             reader.readAsDataURL(this.files[0]);
           });

           $('#create_user').click(function(event){
             $image_crop.croppie('result', {
               type:'canvas',
               size:'viewport'
             }).then(function(response){
               var _token = $('input[name=_token]').val();
                 $("#profile_photo").val(response);
             });
           });
           
         });  
     </script>
     
 @endsection

