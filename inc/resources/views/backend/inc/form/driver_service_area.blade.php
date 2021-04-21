<!--begin::Form-->
<!--begin::Form-->
<form class="form" action="{!! route('backend.area_coverage.area_coverage_submit') !!}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="driver_id" value="{!! Auth::user()->id !!}">
    
    <div class="row">
        <div class="form-group col-sm-12 col-md-6">
            <label>City : {!! Auth::user()->driver->driverCity->name !!}</label>
            <hr>
            {{--
            <select name="city_id" class="form-control">
                @foreach($cities as $c)
                    <option value="{!! $c->id !!}" {!! $c->id == $city->id ? 'selected' : '' !!} >{!! $c->name !!}</option>
                @endforeach
            </select>
            --}}
        </div>  
        
        <div class="col-sm-12 col-md-6"></div>

        @foreach( $areas as $area )
        <div class="col-sm-2">
            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                <input type="checkbox" name="areas[]" value="{!! $area->id !!}" 
                {!! in_array($area->id, $coverageAreaArr) ? 'checked' : '' !!} /> {!! $area->area_name !!}
                <span></span>
            </label>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success mr-2">Save Changes</button>
        <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
            Cancel
        </a>
    </div>
<!--end::Form-->
</form>
