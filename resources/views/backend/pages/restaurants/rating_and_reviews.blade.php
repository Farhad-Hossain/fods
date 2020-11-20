@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            @include('backend.inc.card_header', array(
                'right_text'=>'Restaurants Rating & Reviews',
                'right_btn_text'=>'Restaurants',
                'right_btn_link'=>route('backend.restaurant.list')
            ))
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label"></h3>
                </div>
                <div class="card-toolbar">
                   
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('rest.restaurant_name') !!}</th>
                            <th>Customer name</th>
                            <th>{!! __('rest.stars') !!}</th>
                            <th>{!! __('rest.reviews') !!}</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ratings as $rating)
                        <tr>
                            <th>{!! $loop->iteration !!}</th>
                            <td>{!! $rating->restaurant->name !!}</td>
                            <td>{{ $rating->customer->name ?? '' }}</td>
                            <td class="">
                                @for( $i = 0; $i < $rating->star_count; $i++ )
                                    <i class="fas fa-star text-danger"></i>
                                @endfor
                            </td>
                            <td>{{ $rating->review }}</td>
                            <td>
                              @if ( $rating->status == 1 )
                                <span class="text-warning font-weight-bold">Pending</span>
                              @endif
                              @if ( $rating->status == 2 )
                                <span class="text-success font-weight-bold">Published</span>
                              @endif
                            </td>
                            <td>
                                <a href="javascript:;" onclick="arise_modal(
                                    '{{ $rating->id }}',
                                    '{{ $rating->review }}'
                                )">Edit</a> | 
                                <a href="{{ route('backend.restaurant.change_review_status', $rating->id) }}" onclick="return confirm('Are you sure ?')">Change Status</a>
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
      <div class="modal fade" id="edit_review_modal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Review</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('backend.restaurant.edit_review') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <input type="hidden" name="rating_id" value="">
                  <div class="form-group">
                    <label>Review Content</label>
                    <textarea rows="5" class="form-control" name="review_content"></textarea>
                  </div>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>

      <div class="modal fade" id="reviews_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Reviews</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <table class="table" id="datatable_modal_table">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Customer</th>
                          <th>Review Cntent</th>
                      </tr>
                  </thead>
                  <tbody>   
                      
                  </tbody>
              </table>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script src="{{asset('backend')}}/assets/js/customs/rating_and_reviews.js"></script>

    <script type="text/javascript">
       function arise_modal(rating_id, review_content) {
          $("input[name='rating_id']").val(rating_id);
          $("textarea[name='review_content']").text(review_content);

          $("#edit_review_modal").modal();
       }
    </script>
@endsection
