$(document).ready(function() {
    $('#addCommentForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'index.php?r=site%2Fadd-comment',
            method: 'POST',
            data: formData,
            dataType: 'JSON',
            success: function(data) {
                if (data.error != '') {
                    $('#addCommentForm')[0].reset();
                    $('#comment_message').html(data.error);
                }
                $('#display_comments').html(data.html);
            }
        })
    });


    $(document).on('click', '.reply', function() {
        var comment_id = $(this).attr('data-cid');
        $('#comment_id').val(comment_id);
        $('#comment_content').focus();
    });

    $(document).on('click', '.showreply', function() {
        var comment_id = $(this).attr('data-cid');
        var control = $('#resps' + comment_id)[0];
        if (control.style.display === "none") {
            control.style.display = "block";
            this.innerHTML = 'Hide replies';
        } else {
            control.style.display = "none";
            this.innerHTML = 'Show replies';
        }
    });

});