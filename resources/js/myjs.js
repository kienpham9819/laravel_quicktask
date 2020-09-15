$(document).ready(function() {
    $(".noti").delay(2000).slideUp();

    $(".btn_delete").click(function() {
        if (!confirm('Are you sure ?')) {
            return false;
        } else {
            return true;
        }
    });
});
