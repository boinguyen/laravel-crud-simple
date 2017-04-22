@extends('Web::layouts.account')
@section('title', 'Account | profile')

@section('content')

    @include('Web::_patials._flash_message')

<div class="panel panel-success">
    <div class="panel-heading">Profile detail <a href="/account/profile/update" class="float-right"><i class="fa fa-pencil float-right"></i></a></div>
    <div class="panel-body">
        <div class="form-group">
            <label>Email:</label>
            {{ $user->email }}
        </div>

        <div class="form-group">
            <label>First name:</label>
            {{ $user->f_name }}
        </div>

        <div class="form-group">
            <label>Last name:</label>
            {{ $user->l_name }}
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush