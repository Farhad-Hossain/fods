@if(session()->has('message'))
    <div class="alert alert-{{ session()->pull('type') }}" id="report-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->pull('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p> * {{ $error }}</p>
        @endforeach
    </div>
@endif
