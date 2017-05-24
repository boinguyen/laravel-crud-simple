@extends('Admin::layouts.default')
@section('title', 'Account | profile')

@section('content')

<h3>Welcome: {{ $user->f_name }}</h3>

@endsection

@push('scripts')

@endpush