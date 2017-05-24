@extends('Web::layouts.account')
@section('title', 'dashboard')

@section('content')

<div>
    <h2>Welcome {{ $user->f_name.' '.$user->l_name }}!</h2>
</div>

@endsection

@push('scripts')

@endpush