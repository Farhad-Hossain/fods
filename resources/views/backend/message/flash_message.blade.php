@if(session()->has('message'))
    <div class="alert alert-{{ session()->pull('type') }}" id="report-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->pull('message') }}
    </div>
@endif

