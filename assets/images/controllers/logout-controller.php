<?php

require 'connection.php';
require dirname(__DIR__) . 'login.php';

$_SESSION = array();

session_destroy();

header("Location: ?page=homepage");

exit();