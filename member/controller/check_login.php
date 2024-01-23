<?php
    session_start();

    if (!empty($_SESSION['user_id'])) {
        echo 'logged_in';
    } else {
        echo 'not_logged_in';
    }

?>