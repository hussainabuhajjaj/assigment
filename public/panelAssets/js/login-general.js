"use strict";

// Class Definition
var KTLoginGeneral = function () {

    var login = $('#kt_login');

    var showErrorMsg = function (form, type, msg) {
        var alert = $('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
			<div class="alert-text">' + msg + '</div>\
			<div class="alert-close">\
                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
            </div>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

    // Private Functions


    var displaySignInForm = function () {
        login.removeClass('kt-login--forgot');


        login.addClass('kt-login--signin');
        KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
        //login.find('.kt-login__signin').animateClass('flipInX animated');
    }

    var displayForgotForm = function () {
        login.removeClass('kt-login--signin');
        login.addClass('kt-login--forgot');

        //login.find('.kt-login--forgot').animateClass('flipInX animated');
        KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

    }

    var handleFormSwitch = function () {
        $('#kt_login_forgot').click(function (e) {
            e.preventDefault();
            displayForgotForm();
        });

        $('#kt_login_forgot_cancel').click(function (e) {
            e.preventDefault();
            displaySignInForm();
        });


    }

    var handleSignInFormSubmit = function () {
        $('#kt_login_signin_submit').click(function (e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    password: {
                        required: 'يرجى إدخال كلمة المرور',
                    },
                    email: {
                        required: 'يرجى إدخال البريد الإلكتروني',
                        email: 'يرجى إدخال بريد إلكتروني صحيح'
                    }
                },
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            $.ajax({
                url: "login",
                method: "post",
                data: {
                    email: form.find('input[name=email]').val(),
                    password: form.find('input[name=password]').val(),
                    remember : form.find('input[name=remember]')[0].checked,
                },
                success: function (response) {
                    if (response.status == 200) {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        window.location.href = response.redirectUrl;
                    }
                },
                error: function (response) {
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    showErrorMsg(form, 'danger', response.responseJSON.msg);
                }
            });
        });
    };


    var handleForgotFormSubmit = function () {
        $('#kt_login_forgot_submit').click(function (e) {

            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            $.ajax({
                url: "password/email",
                method: "post",
                data: {
                    email: form.find('input[name=email]').val(),
                },
                success: function (response) {
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    form.clearForm(); // clear form
                    form.validate().resetForm(); // reset validation states

                    // display signup form
                    displaySignInForm();
                    var signInForm = login.find('.kt-login__signin form');
                    signInForm.clearForm();
                    signInForm.validate().resetForm();

                    showErrorMsg(signInForm, 'success', response.msg);
                },
                error: function (response) {
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    showErrorMsg(form, 'danger', response.responseJSON.msg);
                }
            });

            // form.ajaxSubmit({
            //     url: 'password/email',
            //     accept : "application/json",
            //     success: function(response, status, xhr, $form) {
            //     	// similate 2s delay
            //     	setTimeout(function() {
            //     		btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
            //             form.clearForm(); // clear form
            //             form.validate().resetForm(); // reset validation states
            //
            //             // display signup form
            //             displaySignInForm();
            //             var signInForm = login.find('.kt-login__signin form');
            //             signInForm.clearForm();
            //             signInForm.validate().resetForm();
            //
            //             showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');
            //     	}, 2000);
            //     },
            //     error : function (response) {
            //         showErrorMsg(form, 'danger', response.responseJSON.msg);
            //     }
            // });
        });
    }

    // Public Functions
    return {
        // public functions
        init: function () {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleForgotFormSubmit();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    KTLoginGeneral.init();
});
