@extends('Admin::layouts.default')
@section('title', 'Admin | User list')

@section('content')

<div class="table-responsive">
    <table id="data-table" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        $('#data-table').dataTable({
            stateSave: true,
            serverSide: true,
            //order: [[0,'desc']],
            ajax: {
                url: "{{ URL::to('admin/account/getList') }}",
                type: 'POST',
                data: {}

            }
        });
    });
</script>

@endpush