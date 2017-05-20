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
        var hotel_id = $('#user_id').val();
        $.ajax({
            type: 'delete',
            data: {_token: csrf},
            url: '/admin/account/'+hotel_id,
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