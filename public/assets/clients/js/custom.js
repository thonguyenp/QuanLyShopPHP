$(document).ready(function() {
    // validate register formm
    console.log(111);
    $('#register-form').submit(function(e) {
        let name = $('input[name="name"]').val();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="confirmPassword"]').val();
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
        if (password != confirmPassword)
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
});