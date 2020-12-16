<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="restaurant_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th></th>
            <th>{{ __('common.name') }}</th>
            <th>{{ __('common.category') }}</th>
            <th>{{ __('common.status') }}</th>
            <th>{{ __('common.price') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($extra_foods as $extra_food)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td><img src="{{ asset('uploads') }}/{{ $extra_food->photo }}" style="width: 60px; height: 50px;"></td>
            <td>{{ $extra_food->name }}</td>
            <td>
                @if ( $extra_food->category == 1 ) 
                    {{ 'Vegiterian' }}
                @elseif ( $extra_food->category == 2 ) 
                    {{ 'Non Vegiterian' }}
                @endif
            </td>
            @if( $extra_food->status == 1 )
                <td><b class="text-success">Active</b></td>
            @else
                <td><b class="text-danger">Disabled</b></td>
            @endif
            <td>{{ $extra_food->price }}</td>
            <td>
                <a href="javascript:;" class="text-primary mr-2" onclick="arise_modal_for_edit(
                    '{!! $extra_food->id !!}',
                    '{!! $extra_food->restaurant_id !!}',
                    '{!! $extra_food->name !!}',
                    '{!! $extra_food->category !!}',
                    '{!! $extra_food->price !!}',
                    '{!! $extra_food->status !!}',
                )" data-toggle="modal" data-target="#extra_food_edit_modal">
                    <i class="far fa-edit text-primary"></i>
                </a>
                <a href="{{ route('backend.food.extra_food.delete', $extra_food->id) }}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                    <i class="far fa-trash-alt text-danger"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
