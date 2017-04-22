
$(document).ready(function () {
    var _formRegister = $('#frm_register');
    var _frmProfileUpdate = $('.frmProfileUpdate');

    //: Valid form register
    _formRegister.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            password_confirmation: {
                required: true,
                //equalTo: '#password'
            },
            f_name: {
                required: true
            },
            l_name: {
                required: true
            }
        },
        submitHandler: function ( _formRegister ) {
            if (_formRegister.valid()) {
                console.log('OK');
            } else {
                console.log('Fail');
            }
            return false;
        }
    });

    //: Valid form update
    _frmProfileUpdate.validate({
        rules: {
            f_name: {
                required: true
            },
            l_name: {
                required: true
            }
        },
        submitHandler: function ( _frmProfileUpdate ) {
            if (_frmProfileUpdate.valid()) {
                console.log('OK');
            } else {
                console.log('Fail');
            }
            return false;
        }
    });
});