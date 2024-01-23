<?php

require 'connection.php';
require dirname(__DIR__) . 'login.php';

$_SESSION = array();

session_unset();
session_destroy();

header("Location: ?page=index.php");

exit();