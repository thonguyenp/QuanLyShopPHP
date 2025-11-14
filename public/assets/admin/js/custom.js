$(document).ready(function () {
    //*****************
    // User Management
    //*****************
    $(document).on('click', '.upgradeStaff', function (e) {
        let button = $(this);
        let userId = button.data('userid');
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/admin/user/upgrade",
            type: 'POST',
            data: {
                user_id: userId,
            },
            success: function (response) {
                if (response.status) {
                    toastr.success('Đã update thành nhân viên')
                    button.closest('.profile_view').find('brief i').text('STAFF')
                    button.hide();
                } else {
                    toast.error(response.message);
                }
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax của upgrade user');
            },
        });
    });

    $(document).on('click', '.changeStatus', function (e) {
        let button = $(this);
        let userId = button.data('userid');
        let status = button.data('status');

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/admin/user/updateStatus",
            type: 'POST',
            data: {
                user_id: userId,
            },
            success: function (response) {
                if (response.status) {
                    toastr.success('Đã update thành nhân viên')
                    status == 'banned' ? button.text('Đã chặn') : button.text('Đã xóa');
                    button.addClass('disabled').prop('disabled', true);
                } else {
                    toast.error(response.message);
                }
            },
            error: function (xhr) {
                alert('có lỗi xảy ra với Ajax của upgrade user');
            },
        });

    });
    //*****************
    // Category Management
    //*****************
    // Upload hình trong chức năng thêm category
    $("#category-image").change(function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#image-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(file);
        } else {
            $("#category-image-preview").attr("src", "");
        }
    });
    // Btn reset trong chức năng thêm category
    $('.btn_reset').on('click', function () {
        let form = $(this).closest('form');
        form.trigger('reset');
        form.find('input[type="file"]').val('');
        form.find('#image-preview').html('');
        form.find('#image-preview').attr('src', '');
    });
    // preview img phần update category
    $('.category-image').change(function () {
        let file = this.files[0];
        let categoryId = $(this).data('id');
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('.image-preview').each(function () {
                    if (
                        $(this).closest(".modal").attr("id") ===
                        "modalUpdate-" + categoryId
                    ) {
                        $(this).attr("src", e.target.result);
                    }
                });
            };
            reader.readAsDataURL(file);
        } else {
            $("#image-preview").attr("src", "");
        }
    });
    // update category
        $(document).on('click', '.btn-update-submit-category', function (e) {
        e.preventDefault();
        let button = $(this);
        let categoryId = button.data("id");
        let form = button.closest(".modal").find("form");
        let formData = new FormData(form[0]);

        formData.append("category_id", categoryId);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/admin/categories/update",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                button.prop("disabled", true);
                button.text("Đang cập nhật...");
            },
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                    $("#modalUpdate-" + categoryId).modal("hide");
                    location.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + error);
            }
        });
    });

});