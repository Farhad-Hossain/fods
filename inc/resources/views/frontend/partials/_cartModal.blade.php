@if(!empty($contents))
    @foreach($contents as $content)
        <div class="m-2 p-2">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="{{ asset('uploads') }}/{{ $content->options['food_info']->image1 ?? '' }}" class="w-100" style="width: 100px; height: 80px;">
                </div>
                <div class="col-sm-12 col-md-8">
                    <h4>{{ $content->name }}</h4>
                    <p>{{ $content->price }} / Per unit -- {{ $content->qty }} piece</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
@if(!empty($extra_contents))
    @foreach($extra_contents as $content)
        <div class="m-2 p-2">
            <p class="h4">Extra Foods</p>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="{{ asset('uploads') }}/{{ $content->options['extra_food_info']->photo ?? '' }}" class="w-100" style="width: 100px; height: 80px;">
                </div>        
                <div class="col-sm-12 col-md-8">
                    <h4>{{ $content->name }}</h4>
                    <p>{{ $content->price }} / Per unit -- {{ $content->qty }} pieces</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
