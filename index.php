<?php
session_start();
require 'include/connection.php';

$availableRoutes = ['homepage', 'category', 'newingr', 'newprod', 'login', 'logout', 'register', 'admin', 'produits', 'graphs','commandes','panier', ' '];

$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
	$route = $_GET['page'];
}

require 'views/layout.php';