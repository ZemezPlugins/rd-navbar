<?php 

if (strpos($_SERVER['REQUEST_URI'], 'index.php')) {
	$path = dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
} else {
	$path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

//$path = 111;

// Variables
$product_name = "RD Navbar";
$product_desc = "Documentation";
$doc_title = $product_name . " " . $product_desc;

$lang = 'en';
if (isset($_GET['lang'])) {
	$lang = $_GET['lang'];
}

$section_param = 'introduction';
if (isset($_GET['section'])) {
	$section_param = $_GET['section'];
}