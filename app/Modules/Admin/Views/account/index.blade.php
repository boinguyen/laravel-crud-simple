@extends('Admin::layouts.default')
@section('title', 'Admin | User list')

@section('content')
<br/>
<div class="table-responsive">
    <table id="data-table" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full name</th>
                <th>Role</th>
                <th>Status</th>
                <th class="nosort">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
{{ csrf_field() }}

<!-- modal -->
<div class="modal fade modal-confirm-del-user" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete user?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure delete this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary btn-confirm">OK</button>
      </div>
        <input type="hidden" id="user_id" name="user_id" />
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@push('scripts')

<script src="{{ asset('adminx/js/account.js') }}"></script>

@endpush