<?php

$controller_name = $this->router->fetch_class();
$action = $this->router->fetch_method();

$_common_css = [];
$_custom_css  = [
	"home" => [
		"css/vendor/socicon.min.css",
		"css/vendor/material-icons.min.css",
		"css/vendor/bootstrap.min.css",
		"css/vendor/slick.css",
		"css/vendor/magnific-popup.css",
		"css/vendor/slidebars.min.css",
		"css/vendor/layers.css",
		"css/vendor/settings.css",
		"css/vendor/navigation.css",
		"css/theme.min.css",
		"css/custom.css",
	],
	"product" => [
		"css/vendor/socicon.min.css",
		"css/vendor/material-icons.min.css",
		"css/vendor/bootstrap.min.css",
		"css/vendor/slick.css",
		"css/vendor/magnific-popup.css",
		"css/vendor/slidebars.min.css",
		"css/theme.min.css",
		"stylesheets/vendor/socicon.min.css",
		"stylesheets/vendor/material-icons.min.css",
		"stylesheets/theme.min.css",
		

	],

];

$_custom_js = [
	"home" => [
		"js/vendor/modernizr.custom.js",
		"js/vendor/detectizr.min.js",
	],
	"product" => [
		"js/vendor/modernizr.custom.js",
		"js/vendor/detectizr.min.js",
		"js/vendor/jquery-2.1.4.min.js",
		"js/vendor/preloader.min.js",
		"js/vendor/bootstrap.min.js",
		"js/vendor/nouislider.min.js",
		"js/vendor/jquery.magnific-popup.min.js",
		"js/vendor/wNumb.js",
		"js/vendor/slick.min.js",
		"js/vendor/isotope.pkgd.min.js",
		"js/vendor/velocity.min.js",
		"js/vendor/slidebars.min.js",
		"js/vendor/jquery.themepunch.revolution.min.js",
	]
];
$_common_js = [];
if (isset($_custom_js["$controller_name/$action"])) {
    $_common_js = array_merge($_common_js, $_custom_js["$controller_name/$action"]);
    $_common_css = array_merge($_common_css, $_custom_css["$controller_name/$action"]);
}

if (isset($_custom_js["$controller_name"])) {
    $_common_js = array_merge($_common_js, $_custom_js["$controller_name"]);
    $_common_css = array_merge($_common_css, $_custom_css["$controller_name"]);
}

foreach ($_common_css as $value) { ?>
	<link href="<?= $this->config->item('css_images_js_base_url').$value ?>" rel="stylesheet" type="text/css" media="all" />	
<?php } 

foreach ($_common_js as $value) { ?>
	<script src="<?= $this->config->item('css_images_js_base_url').$value ?>"></script>
<?php } ?>
  