@extends('Admin::layouts.default')
@section('title', 'Admin | User list')

@section('content')
<br/>
<form method="POST" action="/admin/account/{{ $user->id }}" id="frmAccount" name="frmAccount" class="frmAccount form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
        <label for="email" class="col-md-4 control-label">Email</label>
        <div class="col-md-8">
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="f_name" class="col-md-4 control-label">First Name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First name" value="{{ $user->f_name }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="l_name" class="col-md-4 control-label">Last Name</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last name" value="{{ $user->l_name }}" required>
        </div>
    </div>

    <input type="hidden" id="id" name="id" value="{{ $user->id }}" />

    <br/>
    <div class="form-group">
        <label for="" class="col-md-4 control-label"></label>
        <div class="col-md-8">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>

</form>

@endsection

@push('scripts')

<script src="{{ asset('adminx/js/account.js') }}"></script>

@endpush