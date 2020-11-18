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
                    <span class="text-warning text-bold">Pending</span>
                @endif
                @if ( $review->status == 2 ) 
                    <span class="text-warning text-success">Published</span>
                @endif
            </td>
            <td>
                <a href="{{ route('backend.food.change_review_status', $review->id) }}" onclick="confirm('Change Status ?')" >Change Status</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
