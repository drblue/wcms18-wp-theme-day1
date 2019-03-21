<?php

require("inc/bs4navwalker.php");

function mbt_register_menus() {
	register_nav_menus([
		'main-menu' => 'Main Menu',
	]);
}
add_action('init', 'mbt_register_menus');
