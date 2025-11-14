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
});