<div class="row">
    @foreach( $city_areas as $city_area )
    <div class="col-sm-2 form-group">
        <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
            <input type="checkbox" name="areas[]"  value="{!! $city_area->id !!}" {!! in_array($city_area->id, $asigned_area_ids_arr ) ? 'checked' : '' !!}
             /> {!! $city_area->area_name !!}
            <span></span>
        </label>     
    </div>
    @endforeach
</div>
