<div class="card-header">
    <div class="card-title">
        <span class="card-icon">
            <i class="flaticon2-heart-rate-monitor text-primary"></i>
        </span>
        <h3 class="card-label">{{ $right_text ?? '' }}</h3>
    </div>
    <div class="card-toolbar">
        <!--begin::Dropdown-->
        <div class="dropdown dropdown-inline mr-2">
            
        </div>
        <!--end::Dropdown-->
        <!--begin::Button-->
        <a href="{{ $right_btn_link ?? '' }}" class="btn btn-primary font-weight-bolder" 

        @if( isset( $btn_modal ) )
            data-toggle="modal" data-target="#{{ $modal_id ?? '' }}"
        @endif
        >
            {{ $right_btn_text ?? '' }}
        </a>
        <!--end::Button-->
    </div>
</div>
