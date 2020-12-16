<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th>Food Name</th>
            <th>Reviewer</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $review->food->food_name }}</td>
            <td>{{ $review->reviewer->name }}</td>
            <td>
                @for($i = 0; $i < $review->count_stars; $i++)
                    <i class="fas fa-star text-info"></i>
                @endfor
            </td>
            <td>{{ $review->review_content }}</td>
            <td>
                @if ( $review->status == 1 ) 
                    <span class="text-warning text-bold">Not published yet</span>
                @endif
                @if ( $review->status == 2 ) 
                    <span class="text-success">Published</span>
                @endif
            </td>
            <td>
                <a href="javascript:;" onclick="rise_edit_modal(
                    '{{ route('backend.food.review.edit') }}',
                    '{{ $review->id }}',
                    '{{ $review->count_stars }}',
                    '{{ $review->review_content }}'
                    )">Edit </a> | 
                <a href="{{ route('backend.food.change_review_status', $review->id) }}" onclick="confirm('Change Status ?')" >Change Status</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->

<!-- Edit Modal -->
@section('modals')
    <div class="modal fade" id="edit_review_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuisine_modal_title">Edit Review Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                     <!--begin::Form-->
                     <form action="" id="edit_form" method="POST" >
                        @csrf
                          <div class="card-body">
                            <input type="hidden" name="review_id">

                            <div class="form-group">
                                <label>Review Content</label>
                                <textarea name="review_content" class="form-control" rows="5"></textarea>
                            </div>
                          </div>

                          <div class="card-footer">
                           <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                           <button type="reset" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                          </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
@endsection
