<?php
include 'connection.php';
session_start();
if (isset($_SESSION['login_id'])) {
    $user_id = $_SESSION['login_id'];
}
?>
<div class="container-fluid">
    <form action="" id="add-comment">
        <div id="msg" class="form-group"></div>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <div class="form-group">
            <label for="user-comments">Type Your Comment Here:</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" required><?php echo isset($comment) ? $comment : ''; ?></textarea>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        $('#add-comment').submit(function(e) {
            e.preventDefault();
            start_load()
            $('#msg').html('')

            $.ajax({
                url: '../back-end/save_comment.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Comment successfully Posted.", "success");
                        setTimeout(function() {
                            location.reload()
                        }, 1750)
                    } else if (resp == 0) {
                        $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Oops!!! Failed to Post a Comment.</div>')
                        end_load()
                    }
                }
            })
        })
    })
</script>