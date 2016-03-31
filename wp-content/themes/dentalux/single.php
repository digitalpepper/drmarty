<?php
/**
Template Name: Single post
 */

get_header(); 

$single_style = ancora_get_custom_option('single_style');

while ( have_posts() ) { the_post();

	// Move ancora_set_post_views to the javascript - counter will work under cache system
	if (ancora_get_custom_option('use_ajax_views_counter')=='no') {
		ancora_set_post_views(get_the_ID());
	}

	//ancora_sc_clear_dedicated_content();
	ancora_show_post_layout(
		array(
			'layout' => $single_style,
			'sidebar' => !ancora_sc_param_is_off(ancora_get_custom_option('show_sidebar_main')),
			'content' => ancora_get_template_property($single_style, 'need_content'),
			'terms_list' => ancora_get_template_property($single_style, 'need_terms')
		)
	);

}

get_footer();
?>