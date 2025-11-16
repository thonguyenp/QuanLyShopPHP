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
        form.find('#image-preview-container').html('');
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

    // nút xóa danh mục
    $(document).on('click', '.btn-delete-category', function (e) {
        e.preventDefault();
        let button = $(this);
        let categoryId = button.data("id");
        let row = button.closest('tr');

        if (confirm("Bạn có chắc muốn xóa danh mục này")) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/categories/delete",
                type: "POST",
                data: {
                    category_id: categoryId
                },
                success: function (response) {
                    if (response.status) {
                        row.remove();
                        toastr.success(response.message);
                    }
                    else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Có lỗi xảy ra! Vui lòng thử lại: " + error);
                }
            });

        }
    });
    //************
    // Product Management
    //************
    // Xử lý thêm nhiều hình
    $("#product-images").change(function (e) {
        let files = e.target.files;
        console.log(files);
        let previewContainer = $("#image-preview-container");
        previewContainer.empty();

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let img = $("<img>")
                            .attr("src", e.target.result)
                            .addClass("image-preview");
                        previewContainer.append(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        } else {
            previewContainer.html("");
        }
    });
    // Xử lý chỉnh sửa nhiều ảnh
    $(".product-images").change(function (e) {
        let files = e.target.files;
        let productId = $(this).data("id");
        let previewContainer = $("#image-preview-container-" + productId);
        previewContainer.empty();

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let img = $("<img>")
                            .attr("src", e.target.result)
                            .addClass("image-preview");
                        img.css({
                            "max-width": "150px",
                            "max-height": "150px",
                            "margin": "5px",
                            "border-radius": "5px",
                        });
                        previewContainer.append(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    });
    //UPDATE sản phẩm
    $(document).on("click", ".btn-update-submit-product", function (e) {
        e.preventDefault();
        let button = $(this);
        let productId = button.data("id");
        let form = button.closest(".modal").find("form");
        let formData = new FormData(form[0]);

        formData.append("product_id", productId);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        }),
        $.ajax({
            url: "/admin/products/update",
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
                    $("#modalUpdate-" + productId).modal("hide");
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
    // Xóa sản phẩm
    $(document).on('click', '.btn-delete-product', function(e) {
        e.preventDefault();
        let button = $(this);
        let productId = button.data("id");
        let row = button.closest('tr');

        if (confirm("Bạn có chắc muốn xóa danh mục này")) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/products/delete",
                type: "POST",
                data: {
                    product_id: productId
                },
                success: function (response) {
                    if (response.status) {
                        row.remove();
                        toastr.success(response.message);
                    }
                    else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Có lỗi xảy ra! Vui lòng thử lại: " + error);
                }
            });

        }
    })

    //*****************
    // Manufacturer Management
    //*****************
    // Upload hình trong chức năng thêm manufacturer
    $("#manufacturer-image").change(function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#image-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(file);
        } else {
            $("#manufacturer-image-preview").attr("src", "");
        }
    });

    // preview img phần update manufacture
    $('.manufacturer-image').change(function () {
        let file = this.files[0];
        let manufactureId = $(this).data('id');
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('.image-preview').each(function () {
                    if (
                        $(this).closest(".modal").attr("id") ===
                        "modalUpdate-" + manufactureId
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

    //btn update nhãn hàng
    $(document).on('click', '.btn-update-submit-manufacturer', function (e) {
        e.preventDefault();
        let button = $(this);
        let manufacturerId = button.data("id");
        let form = button.closest(".modal").find("form");
        let formData = new FormData(form[0]);

        formData.append("manufacturer_id", manufacturerId);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/admin/manufacturers/update",
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
                    $("#modalUpdate-" + manufacturerId).modal("hide");
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

    // nút xóa nhãn hàng
    $(document).on('click', '.btn-delete-manufacturer', function (e) {
        e.preventDefault();
        let button = $(this);
        let manufacturerId = button.data("id");
        let row = button.closest('tr');

        if (confirm("Bạn có chắc muốn xóa danh mục này")) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/manufacturers/delete",
                type: "POST",
                data: {
                    manufacturer_id: manufacturerId
                },
                success: function (response) {
                    if (response.status) {
                        row.remove();
                        toastr.success(response.message);
                    }
                    else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Có lỗi xảy ra! Vui lòng thử lại: " + error);
                }
            });

        }
    });

    //*****************
    // Order Management
    //*****************
    $(document).on("click", ".confirm-order", function (e) {
    e.preventDefault();
    let button = $(this);
    let orderId = button.data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        type: "POST",
        url: "/admin/orders/confirm",
        data: {
            order_id: orderId,
        },
        success: function (response) {
            if (response.status) {
                toastr.success(response.message);
                button
                    .closest("tr")
                    .find(".order-status")
                    .html(
                        '<span class="badge badge-info">Đang giao hàng</span>'
                    );
                button.hide();
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