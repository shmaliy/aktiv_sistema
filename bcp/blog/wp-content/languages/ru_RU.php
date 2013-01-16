<?php
// Make the menu wider and correct some overlapping issues
function ru_accomodate_markup() {
	global $locale, $wp_styles;

	wp_enqueue_style($locale, WP_CONTENT_URL . "/languages/$locale.css", array(), '20081215', 'all');
	wp_enqueue_style("$locale-ie", WP_CONTENT_URL . "/languages/$locale-ie.css", array(), '20081215', 'all');
	$wp_styles->add_data("$locale-ie", 'conditional', 'IE');

	wp_print_styles();
}
add_action('admin_head', 'ru_accomodate_markup');
?>