@extends('Web::layouts.account')
@section('title', 'Account | profile')

@section('content')

<div class="row">
    <div class="col-md-2">Email:</div>
    <div class="col-md-10">{{ $user->email }}</div>
</div>

<div class="row">
    <div class="col-md-2">First name:</div>
    <div class="col-md-10">{{ $user->f_name }}</div>
</div>

<div class="row">
    <div class="col-md-2">Last name:</div>
    <div class="col-md-10">{{ $user->l_name }}</div>
</div>

@endsection

@push('scripts')

@endpush