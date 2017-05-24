@extends('Web::layouts.blank')
@section('title', 'Login system')

@section('content')

<form method="POST" action="/login" id="frmLogin" name="frmLogin" class="frmLogin">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" id="remember" name="remember" value="1"> Remember me.
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
    <button type="button" class="btn btn-warning">Cancel</button>
</form>

@endsection

@push('scripts')

<script>
$(document).ready(function(){
    var _form = $('.frmLogin');
    _form.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3
            }
        },
        submitHandler:function(_form){
            _form.submit();
        }
    });
});
</script>

@endpush