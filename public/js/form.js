//$(document).ready(function(){
//    $('.btn_register_submit').click(function(){
//        var _form = $('#frm_register');
//        formRegisterValid(_form);
//    });
//});
//
//function formRegisterValid(_form){
//    _form.validate({
//        rules: {
//            email: {
//                required: true
//            }
//        }
//    });
//
//    return _form.valid();
//}

$(document).ready(function(){
    //: Init date picker
    $('.date_expected').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('.date_delivered').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    //: Submit form
    $('.btn_submit').click(function(e){
        e.preventDefault();
        var _form = $('#project_status');
        var valid = formValid(_form);

        if( valid ){
            _form.submit();
        }
    });
});

function formValid(_form){
    _form.validate({
        rules: {
            'milestone': {
                required: true
            }
        }
    });

    return _form.valid();
}