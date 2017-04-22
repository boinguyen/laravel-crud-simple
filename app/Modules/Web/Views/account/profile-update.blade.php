@extends('Web::layouts.account')
@section('title', 'Account | profile')

@section('content')
<form method="POST" action="/account/profile/update" id="frmProfileUpdate" name="frmProfileUpdate" class="frmProfileUpdate">
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
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled>
    </div>
    <div class="form-group">
        <label for="f_name">First name</label>
        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First name" value="{{ $user->f_name }}">
    </div>
    <div class="form-group">
        <label for="l_name">Last name</label>
        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last name" value="{{ $user->l_name }}">
    </div>

    <input type="hidden" id="id" name="id" value="{{ $user->id }}" />

    <button type="submit" class="btn btn-primary btnFrmProfileUpdate">Update</button>
    <a class="btn btn-warning" href="/account/profile">Cancel</a>
</form>

@endsection

@push('scripts')
<script src="{{ asset('js/account.js') }}"></script>
@endpush