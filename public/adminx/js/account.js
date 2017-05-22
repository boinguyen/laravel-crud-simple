var datatables = $('#data-table');
var csrf = $('input[name=_token]').val();

$(document).ready(function () {
    loadDataSource();

    //: Confirm del modal
    $(document).on('click', '.user-del', function(){
        $('#user_id').val($(this).data('id'));
        $('.modal-confirm-del-user').modal('show');
    });

    //: Confirm del btn
    $(document).on('click', '.btn-confirm', function(){
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'delete',
            data: {_token: csrf},
            url: '/admin/account/'+user_id,
            success: function(res){
                $('.modal-confirm-del-user').modal('hide');
                datatables.dataTable().fnFilter(this.value);
            },
            error: function(res){
                console.log(res);
            }
        });
    });
});

function loadDataSource(){
    datatables.dataTable({
        //stateSave: true,
        serverSide: true,
        processing: true,
        //order: [[0,'desc']],
        ajax: {
            url: "/admin/account/getList",
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