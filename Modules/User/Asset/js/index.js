import 'jquery-ajax';
import 'jquery-toast-plugin';
import 'jquery-validation';

import NavBar from './components/nav-bar'
import Content from './components/content'


const User = {
    init() {
        this.activeNavbar();
        this.btnClickSubmit();
        this.validateForm();
    },
    activeNavbar() {
        $(document).ready(function () {
            let $content =  window.location.href.split('#')[1];
            if($content === undefined) {
                $content = 'edit-profile';
            }
            $(document).find('#'+$content).show();
            $(document).find('#navbar-'+$content).addClass('js-navbar-active');
        });
        $('.navbar-item').click(function (e) {
            // e.preventDefault();
            let $this = $(this);
            if(!$this.hasClass('js-navbar-active')) {
                $this.addClass('js-navbar-active');
                $this.siblings().removeClass('js-navbar-active');
                let $content = $this.find('.navbar-item-link').attr('href');
                // $(document).find('js-navbar-active')
                $(document).find('#user-content .js-content-item').siblings().hide();
                $(document).find($content).show();
            }
        });
    },
    submitForm(form) {
        $('#phone').prop('disabled', false);
        let $this = $(form),
            $FormData = new FormData($this[0]);
            $.ajax({
                url: $this.attr('action'),
                type: 'POST',
                data: $FormData,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function (response) {
                    console.log(response);
                    $('#phone').prop('disabled', true);
                    $.toast({
                        heading: response.status,
                        text: response.message,
                        showHideTransition: 'fade',
                        icon: 'success',
                        hideAfter: 3000,
                        position: 'top-center',
                    })
                    setTimeout(function () {
                        document.location.reload();
                    }, 3000)
                },
                error: function (response) {
                    $('#phone').prop('disabled', true);
                    console.log(response, 'error', 1);
                    if (response.status == 422) {
                        let $text = '';
                        for (let key in response['responseJSON']['errors']) {
                            $text += '+ ' + response['responseJSON']['errors'][key][0] + '<br>';
                        }
                        $.toast({
                            heading: 'Error',
                            text: $text,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 8000,
                            position: 'top-center',
                        })
                    }
                    else if (response.status == 400) {
                        $.toast({
                            heading: 'Error',
                            text: 'Your old password is incorrect',
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 8000,
                            position: 'top-center',
                        })
                    }
                    else {
                        $.toast({
                            heading: response.status,
                            text: response.messages,
                            showHideTransition: 'fade',
                            icon: 'error',
                            hideAfter: 8000,
                            position: 'top-center',
                        })
                    }
                }
            });
    },
    btnClickSubmit() {
        $('#btn-submit-edit-profile').click(function (e) {
            e.preventDefault();
            if($('#form-edit-profile').valid())
            {
                User.submitForm('#form-edit-profile');
            }
            else{
                User.toastErrorField();
            }
        });
        $('#btn-submit-change-password').click(function (e) {
            e.preventDefault();
            if($('#form-change-password').valid())
            {
                User.submitForm('#form-change-password');
            }
            else{
                User.toastErrorField();
            }
        });
        // $('#btn-submit-data-privacy').click(function (e) {
        //     e.preventDefault();
        //     User.submitForm('#form-privacy-setting');
        // });
        $('#form-notification input').change(function (e) {
            let $this = $(this),
                $url = $('#form-notification').attr('action'),
                $name = $this.attr('name'),
                $status = $this.is(':checked');

            $.ajax({
                url: $url,
                type: 'POST',
                data: {
                        name: $name,
                        value: $status
                },
            })
        });
        $('#form-privacy-setting input').change(function (e) {
            let $this = $(this),
                $url = $('#form-privacy-setting').attr('action'),
                $name = $this.attr('name'),
                $status = $this.is(':checked');

            $.ajax({
                url: $url,
                type: 'POST',
                data: {
                    name: $name,
                    value: $status
                },
            })
        });
    },
    toastErrorField(){
        $.toast({
            heading: 'Warning !',
            text: 'Please fill in all the required information to continue !',
            showHideTransition: 'fade',
            icon: 'error',
            hideAfter: 8000,
            position: 'top-center',
        })
    },
    validateForm() {
        $(document).ready(function(){
            $.validator.addMethod( "notEqualTo", function( value, element, param ) {
                return this.optional( element ) || !$.validator.methods.equalTo.call( this, value, element, param );
            }, "Please enter a different value, values must not be the same." );
            $('#form-change-password').validate({
                onkeyup: true,
                onchange: true,
                rules: {
                    old_password: {
                        'required': true,
                        'minlength': 8,
                    },
                    new_password: {
                        'required': true,
                        'minlength': 8,
                        'notEqualTo': '#old_password',
                    },
                    confirm_password: {
                        'required': true,
                        'minlength': 8,
                        'equalTo': '#new_password',
                    }
                },
                messages: {
                    old_password  : {
                        required: "Please enter a old password",
                        minlength: "Your old password must at least 8 characters"
                    },
                    new_password  : {
                        required: "Please enter a new password",
                        minlength: "Your new password must at least 8 characters",
                        notEqualTo: "Your new password must be different from old password"
                    },
                    confirm_password  : {
                        required: "Please enter a confirm password",
                        equalTo: "Your confirm password must be same as new password"
                    }
                }
            });
            $("#form-edit-profile").validate({
                rules: {
                    onkeyup: true,
                    onchange: true,
                    username: {
                        'required': true,
                        'minlength': 8,
                    },
                    first_name: {
                        'required': true,
                        'minlength': 2,
                    },
                    last_name: {
                        'required': true,
                        'minlength': 2,
                    },
                    email: {
                        'required': true,
                        'email': true,
                    },
                    phone: {
                        'required': true,
                        'number': true,
                        'minlength': 8,
                        'maxlength': 11,
                    },
                    gender: {
                        'required': true,
                        'number': true,
                    },
                    bio:{
                        maxlength: 255,
                    },
                    birthday: {
                        date: true,
                    }

                },
                messages: {
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must at least 8 characters",
                    },
                    first_name: {
                        required: "Please enter a first name",
                        minlength: "Your first name must at least 2 characters",
                    },
                    last_name: {
                        required: "Please enter a last name",
                        minlength: "Your last name must at least 2 characters",
                    },
                    email: {
                        required: "Please enter a email",
                        email: "Your email must be a valid email",
                    },
                    phone: {
                        required: "Please enter a phone",
                        number: "Your phone must be a number",
                        minlength: "Your phone must at least 8 characters",
                        maxlength: "Your phone must at most 11 characters",
                    },
                    gender: {
                        required: 'Please select gender',
                    },
                    bio: {
                        maxlength: "Your bio must at most 255 characters",
                    },
                    birthday: {
                        date: "Your birthday must be a valid date",
                    }
                }
    });
        });
    }
}

$(function () {
    NavBar.init();
    Content.init();
    User.init();
})
