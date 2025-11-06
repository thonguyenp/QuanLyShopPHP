$(document).ready(function() {
    // *******************
    // Page login, register
    // *******************
    // validate register form
    $('#register-form').submit(function(e) {
        let name = $('input[name="name"]').val();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let password_confirmation = $('input[name="password_confirmation"]').val();
        let checkbox = $('input[name="checkbox"]').is(':checked');
        
        let errorMessage = "";

        if (name.length < 3)
        {
            errorMessage +=  "Họ và tên phải có ít nhất 3 ký tự <br>";
        }
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email))
        {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6)
        {
            errorMessage +=  "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (password != password_confirmation)
        {
            errorMessage +=  "Mật khẩu nhập lại không khớp <br>";
        }
        if (!checkbox)
        {
            errorMessage +=  "Bạn phải đồng ý với điều khoản <br>";
        }
        if (errorMessage != "")
        {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // validate login form
    $('#login-form').submit(function(e) {
        console.log(111)
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        
        let errorMessage = "";
        if (!emailRegex.test(email))
        {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6)
        {
            errorMessage +=  "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (errorMessage != "")
        {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // validate reset password form
    $('#reset-password-form').submit(function(e) {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let password_confirmation = $('input[name="password_confirmation"]').val();
        
        let errorMessage = "";

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email))
        {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6)
        {
            errorMessage +=  "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (password != password_confirmation)
        {
            errorMessage +=  "Mật khẩu nhập lại không khớp <br>";
        }
        if (errorMessage != "")
        {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // *******************
    // Page account
    // *******************
    // When clicking on the image => open input file
    $('.profile-pic').click(function() {
        $("#avatar").click();
    });
    // When selecting an image => display preview image
    $("#avatar").change(function() {
        let input = this;
        if (input.files && input.files[0])
        {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#update-account').on('submit', (function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let urlUpdate = $(this).attr('action');
        console.log(formData);
    }));
});