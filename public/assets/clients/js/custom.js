$(document).ready(function () {
    // *******************
    // Page login, register
    // *******************
    // validate register form
    $('#register-form').submit(function (e) {
        let name = $('input[name="name"]').val();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let password_confirmation = $('input[name="password_confirmation"]').val();
        let checkbox = $('input[name="checkbox"]').is(':checked');

        let errorMessage = "";

        if (name.length < 3) {
            errorMessage += "Họ và tên phải có ít nhất 3 ký tự <br>";
        }
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email)) {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6) {
            errorMessage += "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (password != password_confirmation) {
            errorMessage += "Mật khẩu nhập lại không khớp <br>";
        }
        if (!checkbox) {
            errorMessage += "Bạn phải đồng ý với điều khoản <br>";
        }
        if (errorMessage != "") {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // validate login form
    $('#login-form').submit(function (e) {
        console.log(111)
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();

        let errorMessage = "";
        if (!emailRegex.test(email)) {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6) {
            errorMessage += "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (errorMessage != "") {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // validate reset password form
    $('#reset-password-form').submit(function (e) {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let password_confirmation = $('input[name="password_confirmation"]').val();

        let errorMessage = "";

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email)) {
            errorMessage += "Email không hợp lệ <br>";
        }

        if (password.length < 6) {
            errorMessage += "Mật khẩu có ít nhất 6 ký tự <br>";
        }
        if (password != password_confirmation) {
            errorMessage += "Mật khẩu nhập lại không khớp <br>";
        }
        if (errorMessage != "") {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }
    });
    // *******************
    // Page account
    // *******************
    // When clicking on the image => open input file
    $('.profile-pic').click(function () {
        $("#avatar").click();
    });
    // When selecting an image => display preview image
    $("#avatar").change(function () {
        let input = this;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    // When clicking on submit button
    $('#update-account').on('submit', (function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('_method', 'PUT'); // 👈 thêm dòng này
        let urlUpdate = $(this).attr('action');

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: urlUpdate,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.text-end button[type=submit]').text('Đang cập nhật...').attr('disabled', true);
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    // Update new img
                    if (response.avatar) {
                        $('#preview-image').attr('src', response.avatar);
                    }
                    else {
                        toastr.error(response.message);
                    }
                }
            },
            error: function (xhr) {
                console.error(xhr); // 👈 Giúp bạn xem log thật sự trong console

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Có lỗi validation
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    // Có message lỗi tổng quát
                    toastr.error(xhr.responseJSON.message);
                } else {
                    // Không phải JSON => in ra lỗi HTTP hoặc server
                    toastr.error("Đã xảy ra lỗi máy chủ (" + xhr.status + ")");
                }
            },

            complete: function () {
                $('.text-end button')
                    .text('Cập nhật')
                    .attr('disabled', false);
            }
        });
    }));

    // validate change password form
    $('#change-password-form').submit(function (e) {
        e.preventDefault();
        let current_password = $('input[name="current_password"]').val();
        let new_password = $('input[name="new_password"]').val();
        let confirm_new_password = $('input[name="confirm_new_password"]').val();

        let errorMessage = "";

        if (current_password.length < 6) {
            errorMessage += "Mật khẩu mới có ít nhất 6 ký tự <br>";
        }

        if (new_password.length < 6) {
            errorMessage += "Mật khẩu mới có ít nhất 6 ký tự <br>";
        }
        if (new_password != confirm_new_password) {
            errorMessage += "Mật khẩu nhập lại không khớp <br>";
        }
        if (errorMessage != "") {
            toastr.error(errorMessage, "Lỗi");
            return;
        }

        let formData = $(this).serialize();
        let urlUpdate = $(this).attr('action');

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: urlUpdate,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('.text-end button[type=submit]').text('Đang cập nhật...').attr('disabled', true);
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#change-password-form')[0].reset();
                }
                else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                console.error(xhr); // 👈 Giúp bạn xem log thật sự trong console

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Có lỗi validation
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    // Có message lỗi tổng quát
                    toastr.error(xhr.responseJSON.message);
                } else {
                    // Không phải JSON => in ra lỗi HTTP hoặc server
                    toastr.error("Đã xảy ra lỗi máy chủ (" + xhr.status + ")");
                }
            },

            complete: function () {
                $('.text-end button')
                    .text('Cập nhật')
                    .attr('disabled', false);
            }
        });
    });

    //validate add address form
    $('#addAddressForm').submit(function (e) {
        e.preventDefault();

        let isValid = true;

        // delete old error notifications
        $('error-message').remove();

        let fullName = $('#full_name').val().trim();
        let phone = $('#phone').val().trim();

        if (fullName.length < 3) {
            isValid = false;
            $('#full_name').after(
                '<p class="error-message text-danger">Họ và tên không được ít hơn 3 ký tự</p>'
            )
        }
        let phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').after(
                '<p class="error-message text-danger">Số điện thoại không hợp lệ</p>'
            )
        }
        if (isValid) {
            this.submit();
        }
    });
    // *************
    // Page Product
    // *************
    $('.category-filter').on('click', function (e) {
        // e.preventDefault();
        $('.category-filter').removeClass('active');
        $(this).addClass('active');
        fetchProducts();
    });


    $('#sort-by').on('change', function () {
        fetchProducts();
    });
});
// ******
// Price Range
// ******
// Đưa sản phẩm lên trang shop
function fetchProducts() {
    let category_id = $('.category-filter.active').data('id') || '';
    let minPrice = parseInt($('#minValue').text().replace(/\./g, '')) || 0;
    let maxPrice = parseInt($('#maxValue').text().replace(/\./g, '')) || 0;
    let sort_by = $('#sort-by').val();

    console.log(category_id);
    console.log(minPrice);
    console.log(maxPrice);
    console.log(sort_by);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "products/filter",
        type: 'GET',
        data: {
            category_id : category_id,
            min_price : minPrice,
            max_price : maxPrice,
            sort_by : sort_by,
        },
        beforeSend: function () {
            $('#spinner').show();
            $('#product-content').hide();
        },
        success: function (response) {
            $('#product-content').html(response.products);
        },
        complete: function () {
            $('#spinner').hide();
            $('#product-content').show();
        },
        error: function (xhr) {
            alert('có lỗi xảy ra với Ajax fetchProduct');
        },
    });
    
}

// Format lại số trong price range
function numberWithDots(x) {
    // Format số kiểu 1.000.000
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Phương thức cho price range hoạt động
function updateDualRange() {
    let min = parseInt(document.getElementById('minRange').value);
    let max = parseInt(document.getElementById('maxRange').value);

    // Cập nhật giá trị hiển thị
    document.getElementById('minValue').innerText = numberWithDots(min);
    document.getElementById('maxValue').innerText = numberWithDots(max);

    // Cập nhật thanh màu cam
    let slider = document.querySelector('.range-slider');
    let range = slider.querySelector('#sliderRange');
    let minPercent = (min - parseInt(slider.querySelector('#minRange').min)) / (parseInt(slider.querySelector('#minRange').max) - parseInt(slider.querySelector('#minRange').min)) * 100;
    let maxPercent = (max - parseInt(slider.querySelector('#maxRange').min)) / (parseInt(slider.querySelector('#maxRange').max) - parseInt(slider.querySelector('#maxRange').min)) * 100;

    range.style.left = minPercent + "%";
    range.style.width = (maxPercent - minPercent) + "%";

    fetchProducts();
}

