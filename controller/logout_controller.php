<?php

require './views/logout.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_logout'])) {

    session_start();
    session_destroy();

    header('Location: index.php');
    exit();
}