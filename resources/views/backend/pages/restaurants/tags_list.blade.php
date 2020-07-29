@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection

@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">{{ __('tags.tags') }}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#tagsModal">
                    <i class="la la-plus"></i>Add Tag</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="restaurant_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('tags.name') }}</th>
                            <th>{{ __('tags.status') }}</th>
                            <th>{{ __('tags.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#tagsModal" onclick="set_for_edit(
                                                '{{ $tag->id }}',
                                                '{{ $tag->name }}'
                                )"><i class="far fa-edit text-primary"></i></a>  
                                <a href="{{ route('backend.restaurant.tags.delete', $tag->id) }}" onclick="return confirm('Are you sure want to delete ?')"><i class="far fa-trash-alt ml-2 text-danger"></i></a>
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


    <!-- Modal-->
    <div class="modal fade" id="tagsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tag_modal_title">{{ __('tags.modal_create_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    

                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{ route('backend.restaurant.tags.add_submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                      <div class="card-body">
                       <div class="form-group">
                        <label>{{ __('tags.name') }}</label>
                        <input type="text" class="form-control"  placeholder="Tag Name" name="name" required />
                       </div>
                      </div>
                      <div class="card-footer">
                       <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                       <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                     </form>
                     <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script src="{{asset('backend')}}/assets/js/customs/restaurant_tag_list.js"></script>
@endsection
