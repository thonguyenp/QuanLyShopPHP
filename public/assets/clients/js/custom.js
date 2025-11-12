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
    // Đưa sản phẩm lên trang shop
    let currentPage = 1;

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
            url: "products/filter?page=" + currentPage,
            type: 'GET',
            data: {
                category_id: category_id,
                min_price: minPrice,
                max_price: maxPrice,
                sort_by: sort_by,
            },
            beforeSend: function () {
                $('#spinner').show();
                $('#product-content').hide();
            },
            success: function (response) {
                $('#product-content').html(response.products);
                $('.pagination-wrapper').html(response.pagination);
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
    // Xử lý phân trang
    $(document).on('click', '.pagination-link', function (e) {
        e.preventDefault();
        let pageUrl = $(this).attr('href');
        let page = pageUrl.split('page=')[1];
        currentPage = page;
        fetchProducts();
    });

    $('.category-filter').on('click', function (e) {
        // e.preventDefault();
        $('.category-filter').removeClass('active');
        $(this).addClass('active');
        currentPage = 1;
        fetchProducts();
    });

    $('#sort-by').on('change', function () {
        fetchProducts();
    });
    // ******
    // Price Range
    // ******


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
        currentPage = 1;

        fetchProducts();
    }
    // Bind sự kiện onchange cho range
    $('#minRange, #maxRange').on('input', updateDualRange);

    //**************
    // Page detail product
    //**************

    // Xử lý nếu là quantity không nằm trong cart
    if (window.location.pathname != '/cart') {
        $(document).on('click', '.quantity button', function () {
            var button = $(this);
            var input = button.closest('.quantity').find('input'); // tìm input đúng trong cùng group
            var oldValue = parseInt(input.val());
            var maxStock = parseInt(input.data('max'));

            // Nếu là nút cộng
            if (button.hasClass('btn-plus')) {
                if (oldValue < maxStock) {
                    input.val(oldValue + 1);
                }
            }
            // Nếu là nút trừ
            else if (button.hasClass('btn-minus')) {
                if (oldValue > 1) {
                    input.val(oldValue - 1);
                }
            }
        });
    }
    // Nếu quantity nằm trong cart
    else {
        $(document).on('click', '.quantity button', function () {
            let button = $(this);
            let input = button.closest('.quantity').find('input'); // tìm input đúng trong cùng group
            let oldValue = parseInt(input.val());
            let maxStock = parseInt(input.data('max'));
            let productId = input.data('id');
            let newValue = oldValue;

            // Nếu là nút cộng
            if (button.hasClass('btn-plus')) {
                if (oldValue < maxStock) {
                    newValue = oldValue + 1;
                }
            }
            // Nếu là nút trừ
            else if (button.hasClass('btn-minus')) {
                if (oldValue > 1) {
                    newValue = oldValue - 1;
                }
            }

            if (newValue != oldValue) {
                updateCart(productId, newValue, input);
            }
        });

    }

    // Xử lý thêm vào giỏ hàng
    $(document).on('click', '.add-to-cart-btn', function (e) {
        e.preventDefault(); // chặn load trang nếu href="#"

        let button = $(this);                      // nút vừa click
        let productId = button.data('id');         // lấy id sản phẩm
        // Nếu lấy ở trong product detail thì lấy theo quantity, còn ở những nơi khác thì quantity luôn là 1
        let quantity = button.prev('.quantity').find('input').val() > 1 ? button.prev('.quantity').find('input').val() : 1;

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/cart/add",
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                // Khi bấm vào thì hiện lên modal và thay đổi text của id cart_count
                $('#add_to_cart_modal-' + productId).modal('show');
                $('#cart_count').text(response.cart_count);
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax add cart của detail product');
            },
        });
    });

    //**************
    // Mini Cart
    //**************
    // Khi bấm nút cart thì hiện cart sidebar
    $('#mini-cart-icon').on('click', function (e) {
        $.ajax({
            url: "/mini-cart",
            type: 'GET',
            success: function (response) {
                if (response.status) {
                    $('#cartSidebar .mini-cart-container').html(response.html);
                }
                else {
                    toastr.error('Không thể tải giỏ hàng');
                }
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax add cart của detail product');
            },
        });
    })

    // Khi bấm nút xóa item thì xóa khỏi cart sidebar
    $(document).on('click', '.mini-cart-item-delete', function (e) {
        console.log(111111);
        let productId = $(this).data('id');
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/cart/remove",
            type: 'POST',
            data: {
                product_id: productId
            },
            success: function (response) {
                if (response.status) {
                    $('#cart_count').text(response.cart_count);
                    $('#mini-cart-icon').click();
                }
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax add cart của detail product');
            },
        });
    })

    //**************
    // Cart Page
    //**************
    // Hàm cập nhập lại cart page
    function updateCart(productId, quantity, input) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/cart/update",
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                input.val(response.quantity);
                input.closest('tr').find('.cart-product-subtotal').text(response.total);
                $('.cart-total').text(response.total);
                $('.cart-grand-total').text(response.grandtotal);
            },
            error: function (xhr) {
                alert(xhr.responseJSON.error);
            },
        });

    }
    // Hàm xử lí btn remove trong cart page
    $('.remove-from-cart').on('click', function (e) {
        let productId = $(this).data('id');
        let row = $(this).closest('tr');

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "/cart/remove-cart",
            type: 'POST',
            data: {
                product_id: productId,
            },
            success: function (response) {
                row.remove();
                $('.cart-total').text(response.total);
                $('.cart-grand-total').text(response.grandtotal);
                if ($('.cart-product-remove').length == 0) {
                    location.reload();
                }
            },
            error: function (xhr) {
                alert(xhr.responseJSON.error);
            },
        });
    })
    //**************
    // Checkout Page
    //**************
    // Lấy ra danh sách địa chỉ
    $('#list_address').change(function () {
        var addressId = $(this).val();

        $.ajax({
            url: "/checkout/get-address",
            type: 'GET',
            data: {
                address_id: addressId,
            },
            success: function (response) {
                if ($(response.success)) {
                    $('input[name="ltn_name"]').val(response.data.full_name);
                    $('input[name="ltn_phone"]').val(response.data.phone);
                    $('input[name="ltn_address"]').val(response.data.address);
                    $('input[name="ltn_city"]').val(response.data.city);
                    $('input[name="address_id"]').val(response.data.id);

                }
            },
            error: function (xhr) {
                alert(xhr.responseJSON.error);
            },
        });

    });

    //**************
    // Rating Product
    //**************
    if (window.location.pathname.startsWith('/product')) {
        let selectRating = 0;
        // Xử lí khi rê chuột vào ngôi sao
        $('.rating-star').hover(function (e) {
            let value = $(this).data('value');
            highlightStar(value);
        }, function () {
            highlightStar(selectRating);
        });

        // Xử lí khi rê chuột vào ngôi sao
        $('.rating-star').click(function (e) {
            e.preventDefault();
            selectRating = $(this).data('value');
            $('#rating-value').val(selectRating); // cập nhật input ẩn
            highlightStar(selectRating);
        });
        // Làm sáng ngôi sao 
        function highlightStar(value) {
            $('.rating-star').each(function () {
                let starValue = $(this).data('value');
                if (starValue <= value) {
                    $(this).find('i').removeClass('far').addClass('fas'); // full star
                } else {
                    $(this).find('i').removeClass('fas').addClass('far'); // empty star
                }
            });
        }
        // Xử lý submit comment
        $('#review-form').submit(function (e) {
            e.preventDefault();

            let productId = $(this).data('product-id');
            let rating = $('#rating-value').val();
            let content = $('#review-content').val();

            // Kiểm tra rating
            if (rating == 0) {
                $('#review-error').html('<div class="alert alert-danger">Vui lòng chọn số sao</div>');
                return;
            }

            // Kiểm tra nội dung
            if (content.trim() === '') {
                $('#review-error').html('<div class="alert alert-danger">Vui lòng nhập nội dung đánh giá</div>');
                return;
            }

            $('#review-error').empty(); // xóa lỗi cũ

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/review",
                type: 'POST',
                data: {
                    product_id: productId,
                    rating: rating,
                    comment: content
                },
                success: function (response) {
                    $('#review-content').val('');
                    highlightStar(0);
                    selectRating = 0;
                    toastr.success(response.message);

                    loadReview(productId);
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.error || 'Có lỗi xảy ra');
                },
            });
        });
        // Load lại review bằng Ajax
        function loadReview(productId) {
            $.ajax({
                url: "/review/" + productId,
                type: 'GET',
                success: function (response) {
                    $('.ltn_comment-inner').html(response);
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.error || 'Có lỗi xảy ra');
                },
            });
        }
    }

    //**************
    // Contact Page
    //**************
    $('#contact-form').on('submit', function (e) {
        let name = $('input[name="name"]').val();
        let phone = $('input[name="phone"]').val();
        let email = $('input[name="email"]').val();
        let message = $('textarea[name="message"]').val();
        let errorMessage = "";

        if (name.length < 3) {
            errorMessage += "Họ và tên phải có ít nhất 3 ký tự.<br>";
        }

        if (phone.length < 10 || phone.length > 11) {
            errorMessage += "Số điện thoại phải từ 10-11 số.<br>";
        }

        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errorMessage += "Email không hợp lệ.<br>";
        }

        if (errorMessage !== "") {
            toastr.error(errorMessage, "Lỗi");
            e.preventDefault();
        }

    });
    //**************
    // Wishlist Page
    //**************
    // Xử lý thêm vào wishlist
    $(document).on('click', '.add-to-wishlist', function (e) {
        e.preventDefault(); // chặn load trang nếu href="#"

        let button = $(this);                      // nút vừa click
        let productId = button.data('id');         // lấy id sản phẩm
        // Nếu lấy ở trong product detail thì lấy theo quantity, còn ở những nơi khác thì quantity luôn là 1
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/wishlist/add",
            type: 'POST',
            data: {
                product_id: productId,
            },
            success: function (response) {
                if (response.status)
                {
                    $('#liton_wishlist_modal-' + productId).modal('show');
                    toastr.success('Đã thêm vào danh sách yêu thích');
                }
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax của add to wishlist');
            },
        });
    });
});