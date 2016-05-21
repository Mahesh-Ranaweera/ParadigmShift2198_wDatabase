<?php
#contain error msgs 

    function db_entryConn()
    {
        echo '<div class="submit_msg_post">
            <strong><i class="fa fa-check"></i> Success!</strong><br>
            <text>User Registered Successfully!</text>
            <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
            </div>';
    }

    function db_postConn()
    {
        echo '<div class="submit_msg_post">
            <strong><i class="fa fa-check"></i> Success!</strong><br>
            <text>New Post successfully posted!</text>
            <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
            </div>';
    }

    function db_entryError()
    {
        echo '<div class="submit_msg_error">
            <strong><i class="fa fa-exclamation-triangle"></i> Error</strong><br>
            <text>Registration Erro</text>
            <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
            </div>';
    }

    function db_conn_error()
    {
        echo '<div class="submit_msg_error">
            <strong><i class="fa fa-exclamation-triangle"></i> Error</strong><br>
            <text>Connection Error</text>
            <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
            </div>';
        
    }

    function conn_passw_error()
    {
        echo "<div class='submit_msg_error'>
            <strong><i class='fa fa-exclamation-triangle'></i> Error</strong><br>
            <text>Passwords don't match, Try Again</text>
            <div class='exit_btn'><i class='fa fa-times fa-2x'></i></div>
            </div>";
    }

?>