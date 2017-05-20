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

@endsection

@push('scripts')

<script src="{{ asset('adminx/js/account.js') }}"></script>

<script>
function loadDataSource(){
    datatables.dataTable({
        //stateSave: true,
        serverSide: true,
        processing: true,
        //order: [[0,'desc']],
        ajax: {
            url: "{{ URL::to('admin/account/getList') }}",
            type: 'get'
        },
        columns: [
            {name: 'id', data: 'id'},
            {name: 'email', data: 'email'},
            {name: 'full_name', data: 'full_name'},
            {name: 'role', data: 'role'},
            {name: 'status', data: 'status'},
            {name: 'actions', data: 'actions'}
        ],
        'aoColumnDefs': [
            {'bSortable': false, 'aTargets': ['nosort']},
            {'className': "dt-center", "targets": [2]}
        ]
    });
}
</script>

@endpush