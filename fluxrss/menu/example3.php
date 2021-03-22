<?php

$customWPMenu = new WordPressMenu( array(
			'slug' => 'wpmenu',
			'title' => 'WP FLUX RSS',
			'desc' => 'Paramettrage Shortcode avec URL',
			'icon' => 'dashicons-welcome-widgets-menus',
			'position' => 99,
		));

$customWPMenu->add_field(array(
	'name' => 'hidden',
	'title' => 'Settings',
	'desc' => 'exemple shortcode : [display-rss url="http://flux.rss"] ',
	));



// Creating tab with our custom wordpress menu

// Creating second menu
/*$customWPSubMenu = new WordPressSubMenu( array(
			'slug' => 'wpsubmenu',
			'title' => 'WP SubMenu',
			'desc' => 'Settings for custom WordPress SubMenu',
		),
		$customWPMenu);*/