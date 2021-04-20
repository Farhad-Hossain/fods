@extends('backend.master', ['title'=>'Language Settings'])
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        Present Language : {{ app()->getLocale(session('locale')) }}

        <form action="{{ route('backend.settings.changeLanguageSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Select a language</label>
                <select name="language_code" class="form-control">
                    <option value="en" {{ session('locale')=='en'?'selected':''  }}>English</option>
                    <option value="bn" {{ session('locale')=='bn'?'selected':''  }}>Bengali</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="" value="Save Changes">
            </div>
        </form>
@endsection
