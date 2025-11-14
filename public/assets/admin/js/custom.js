$(document).ready(function() {
    //*****************
    // User Management
    //*****************
    $(document).on('click', '.upgradeStaff', function(e) {
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

    $(document).on('click', '.changeStatus', function(e) {
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

});