@extends('Web::layouts.blank')
@section('title', 'Register account')

@section('content')

<form method="POST" action="/register" id="frm_register" class="frm_register">
    @if( $errors && count($errors->all()) >0 )
    <div class="err-response">
        <ul>
            @foreach( $errors->all() as $message )
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password confirm</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirm">
    </div>
    <div class="form-group">
        <label for="f_name">First name</label>
        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First name" value="{{ old('f_name') }}">
    </div>
    <div class="form-group">
        <label for="l_name">Last name</label>
        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last name" value="{{ old('l_name') }}">
    </div>
    <button type="submit" class="btn btn-primary btn_register_submit">Register</button>
    <button type="button" class="btn btn-warning">Cancel</button>
</form>

@endsection

@push('scripts')
<script src="{{ asset('js/account.js') }}"></script>
<script>

</script>

@endpush