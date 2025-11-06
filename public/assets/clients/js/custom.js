$(document).ready(function() {
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
});