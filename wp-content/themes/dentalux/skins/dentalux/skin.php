<?php
/**
 * dentalux skin file for theme.
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Theme init
if (!function_exists('ancora_skin_theme_setup_dentalux')) {
	add_action( 'ancora_action_init_theme', 'ancora_skin_theme_setup_dentalux', 1 );
	function ancora_skin_theme_setup_dentalux() {

		// Add skin fonts in the used fonts list
		add_filter('ancora_filter_used_fonts',			'ancora_filter_used_fonts_dentalux');
		// Add skin fonts (from Google fonts) in the main fonts list (if not present).
		add_filter('ancora_filter_list_fonts',			'ancora_filter_list_fonts_dentalux');

		// Add skin stylesheets
		add_action('ancora_action_add_styles',			'ancora_action_add_styles_dentalux');
		// Add skin inline styles
		add_filter('ancora_filter_add_styles_inline',		'ancora_filter_add_styles_inline_dentalux');
		// Add skin responsive styles
		add_action('ancora_action_add_responsive',		'ancora_action_add_responsive_dentalux');
		// Add skin responsive inline styles
		add_filter('ancora_filter_add_responsive_inline',	'ancora_filter_add_responsive_inline_dentalux');

		// Add skin scripts
		add_action('ancora_action_add_scripts',			'ancora_action_add_scripts_dentalux');
		// Add skin scripts inline
		add_action('ancora_action_add_scripts_inline',	'ancora_action_add_scripts_inline_dentalux');

		// Return links color (if not set in the theme options)
		add_filter('ancora_filter_get_link_color',		'ancora_filter_get_link_color_dentalux', 10, 1);
		// Return links dark color
		add_filter('ancora_filter_get_link_dark',			'ancora_filter_get_link_dark_dentalux',  10, 1);

		// Return main menu items color (if not set in the theme options)
		add_filter('ancora_filter_get_menu_color',		'ancora_filter_get_menu_color_dentalux', 10, 1);
		// Return main menu items dark color
		add_filter('ancora_filter_get_menu_dark',			'ancora_filter_get_menu_dark_dentalux',  10, 1);

		// Return user menu items color (if not set in the theme options)
		add_filter('ancora_filter_get_user_color',		'ancora_filter_get_user_color_dentalux', 10, 1);
		// Return user menu items dark color
		add_filter('ancora_filter_get_user_dark',			'ancora_filter_get_user_dark_dentalux',  10, 1);

		// Add color schemes
		ancora_add_color_scheme('original', array(

			'title'					=> __('Original', 'ancora'),
			// Old settings
			'menu_color' => '#6f51c7',		// rgb(29,187,144)
			'menu_dark'  => '#018763',		// rgb(1,135,99)
			'link_color' => '#34b8c0',		// rgb(30,170,206)
			'link_dark'  => '#007c9c',		// rgb(0,124,156)
			'user_color' => '#ffb20e',		// rgb(255,178,14)
			'user_dark'  => '#cc8b00'		// rgb(204,139,0)
			)
		);
		ancora_add_color_scheme('contrast', array(
			'title'		 =>	__('Contrast', 'ancora'),
			// Old settings
			'menu_color' => '#26c3d6',		// rgb(38,195,214)
			'menu_dark'  => '#24b6c8',		// rgb(36,182,200)
			'link_color' => '#f55c6d',		// rgb(245,92,109)
			'link_dark'  => '#e24c5d',		// rgb(226,76,93)
			'user_color' => '#2d3e50',		// rgb(45,62,80)
			'user_dark'  => '#233140'		// rgb(35,49,64)
			)
		);
		ancora_add_color_scheme('modern', array(
			'title'		 =>	__('Modern', 'ancora'),
			// Old settings
			'menu_color' => '#f9c82d',		// rgb(249,200,45)
			'menu_dark'  => '#e6ba29',		// rgb(230,186,41)
			'link_color' => '#a7d163',		// rgb(167,209,99)
			'link_dark'  => '#98bf5a',		// rgb(152,191,90)
			'user_color' => '#fe7d60',		// rgb(254,125,96)
			'user_dark'  => '#eb7459'		// rgb(235,116,89)
			)
		);
		ancora_add_color_scheme('pastel', array(
			'title'		 =>	__('Pastel', 'ancora'),
			// Old settings
			'menu_color' => '#0dcdc0',		// rgb(13,205,192)
			'menu_dark'  => '#0bbaae',		// rgb(11,186,174)
			'link_color' => '#a7d163',		// rgb(167,209,99)
			'link_dark'  => '#98bf5a',		// rgb(152,191,90)
			'user_color' => '#0ead99',		// rgb(14,173,153)
			'user_dark'  => '#0c9c88'		// rgb(12,156,136)
			)
		);
	}
}





//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
if (!function_exists('ancora_filter_used_fonts_dentalux')) {
	//add_filter('ancora_filter_used_fonts', 'ancora_filter_used_fonts_dentalux');
	function ancora_filter_used_fonts_dentalux($theme_fonts) {
		$theme_fonts['Lato'] = 1;
        $theme_fonts['Damion'] = 1;
		return $theme_fonts;
	}
}

// Add skin fonts (from Google fonts) in the main fonts list (if not present).
// To use custom font-face you not need add it into list in this function
// How to install custom @font-face fonts into the theme?
// All @font-face fonts are located in "theme_name/css/font-face/" folder in the separate subfolders for the each font. Subfolder name is a font-family name!
// Place full set of the font files (for each font style and weight) and css-file named stylesheet.css in the each subfolder.
// Create your @font-face kit by using Fontsquirrel @font-face Generator (http://www.fontsquirrel.com/fontface/generator)
// and then extract the font kit (with folder in the kit) into the "theme_name/css/font-face" folder to install
if (!function_exists('ancora_filter_list_fonts_dentalux')) {
	//add_filter('ancora_filter_list_fonts', 'ancora_filter_list_fonts_dentalux');
	function ancora_filter_list_fonts_dentalux($list) {
		// Example:
		// if (!isset($list['Advent Pro'])) {
		//		$list['Advent Pro'] = array(
		//			'family' => 'sans-serif',																						// (required) font family
		//			'link'   => 'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic',	// (optional) if you use Google font repository
		//			'css'    => ancora_get_file_url('/css/font-face/Advent-Pro/stylesheet.css')									// (optional) if you use custom font-face
		//			);
		// }
		$list['Lato'] = array('family'=>'sans-serif', 'link'=>'Lato: 400,700,900');
        $list['Damion'] = array('family'=>'sans-serif');
		return $list;
	}
}


//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------
// Add skin stylesheets
if (!function_exists('ancora_action_add_styles_dentalux')) {
	//add_action('ancora_action_add_styles', 'ancora_action_add_styles_dentalux');
	function ancora_action_add_styles_dentalux() {
		// Add stylesheet files
		ancora_enqueue_style( 'ancora-skin-style', ancora_get_file_url('skins/dentalux/skin.css'), array(), null );
	}
}

// Add skin inline styles
if (!function_exists('ancora_filter_add_styles_inline_dentalux')) {
	//add_filter('ancora_filter_add_styles_inline', 'ancora_filter_add_styles_inline_dentalux');
	function ancora_filter_add_styles_inline_dentalux($custom_style) {

		// Color scheme
		$scheme = ancora_get_custom_option('color_scheme');
		if (empty($scheme)) $scheme = 'original';

		global $ANCORA_GLOBALS;

		// Links color
		$clr = ancora_get_custom_option('link_color');
		if (empty($clr) && $scheme!= 'original')	$clr = ancora_get_link_color();
		if (!empty($clr)) {
			$ANCORA_GLOBALS['color_schemes'][$scheme]['link_color'] = $clr;
			$rgb = ancora_hex2rgb($clr);
			$custom_style .= '
				a,
				.bg_tint_dark a,
				.bg_tint_dark h1 a,
				.bg_tint_dark h2 a,
				.bg_tint_dark h3 a,
				.bg_tint_dark h4 a,
				.bg_tint_dark h5 a,
				.bg_tint_dark h6 a,
                .bg_tint_light a,
                .link_color,
                .link_dark,
                .sc_table table tr td:nth-child(2),
                .menu_user_wrap .menu_user_contact_area,
                .bg_tint_dark .logo .logo_text,
                .bg_tint_light .menu_main_responsive_button,
                .bg_tint_dark .menu_main_responsive_button,
                .search_wrap.search_style_regular .search_form_wrap .search_submit,
                .search_wrap.search_style_regular .search_icon,
                .top_panel_style_light .content .search_wrap.search_style_regular .search_form_wrap .search_submit,
                .top_panel_style_light .content .search_wrap.search_style_regular .search_icon,
                .search_wrap.search_style_regular .search_form_wrap .search_submit:hover,
                .search_wrap.search_style_regular .search_icon:hover,
                .top_panel_style_2 .search_wrap.search_style_regular .search_icon,
                .search_results .post_more,
                .search_results .search_results_close,
                .tparrows.default,
                .post_title .post_icon,
                blockquote > a,
                blockquote > p > a,
                blockquote cite,
                .post_item_related .post_title a,
                .post_item_related:nth-child(3n+2) .post_title a,
                .post_item_related:nth-child(3n+3) .post_title a,
                .isotope_item_courses .post_category a,
                .isotope_item_courses .post_rating .reviews_stars_bg,
                .isotope_item_courses .post_rating .reviews_stars_hover,
                .isotope_item_courses .post_rating .reviews_value,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_category a,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_category a,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_rating .reviews_stars_bg,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_rating .reviews_stars_bg,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_rating .reviews_stars_hover,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_rating .reviews_stars_hover,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_rating .reviews_value,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_rating .reviews_value,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_category a,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_category a,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_rating .reviews_stars_bg,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_rating .reviews_stars_bg,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_rating .reviews_stars_hover,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_rating .reviews_stars_hover,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_rating .reviews_value,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_rating .reviews_value,
                .isotope_item_courses .post_info_wrap .post_button .sc_button,
                .isotope_item_courses_1 .post_title a,
                .isotope_item_courses_1:nth-child(3n+2) .post_title a,
                .isotope_item_courses_1:nth-child(3n+2) .post_category a,
                .isotope_item_courses_1:nth-child(3n+2) .post_item .post_rating .reviews_stars_bg,
                .isotope_item_courses_1:nth-child(3n+2) .post_item .post_rating .reviews_stars_hover,
                .isotope_item_courses_1:nth-child(3n+2) .post_item .post_rating .reviews_value,
                .isotope_item_courses_1:nth-child(3n+3) .post_title a,
                .isotope_item_courses_1:nth-child(3n+3) .post_category a,
                .isotope_item_courses_1:nth-child(3n+3) .post_item .post_rating .reviews_stars_bg,
                .isotope_item_courses_1:nth-child(3n+3) .post_item .post_rating .reviews_stars_hover,
                .isotope_item_courses_1:nth-child(3n+3) .post_item .post_rating .reviews_value,
                .pagination_single > .pager_numbers,
                .pagination_single a:hover,
                .pagination_slider .pager_cur:hover,
                .pagination_slider .pager_cur:focus,
                .pagination_pages > .active,
                .pagination_pages > a:hover,
                .pagination_wrap .pager_next,
                .pagination_wrap .pager_prev,
                .pagination_wrap .pager_last,
                .pagination_wrap .pager_first,
                .reviews_block .reviews_item:nth-child(3n+1) .reviews_stars_hover,
                .reviews_block .reviews_item:nth-child(3n+2) .reviews_stars_hover,
                .reviews_block .reviews_item:nth-child(3n+3) .reviews_stars_hover,
                .post_item:nth-child(3n+1) .post_rating .reviews_stars_bg,
                .post_item:nth-child(3n+1) .post_rating .reviews_stars_hover,
                .post_item:nth-child(3n+1) .post_rating .reviews_value,
                .post_item:nth-child(3n+2) .post_rating .reviews_stars_bg,
                .post_item:nth-child(3n+2) .post_rating .reviews_stars_hover,
                .post_item:nth-child(3n+2) .post_rating .reviews_value,
                .post_item:nth-child(3n+3) .post_rating .reviews_stars_bg,
                .post_item:nth-child(3n+3) .post_rating .reviews_stars_hover,
                .post_item:nth-child(3n+3) .post_rating .reviews_value,
                .post_author .post_author_title a,
                .comments_list_wrap .comment_info > span.comment_author,
                .comments_list_wrap .comment_info > .comment_date > .comment_date_value,
                .post_item_404 .page_title span,
                .body_style_fullscreen .post_featured .post_button a,
                .layout_single-courses .post_info .post_info_date,
                .layout_single-courses .post_info .post_info_posted:before,
                .widget_area .widget_text a,
                .widget_area .post_info a,
                .widget_area .widget_calendar td a,
                .widget_area .widget_calendar .month_cur a,
                .widget_area .widget_product_tag_cloud a,
                .widget_area .widget_tag_cloud a,
                .sc_audio_container .mejs-controls .mejs-button.mejs-unmute button,
                .sc_audio_container .mejs-controls .mejs-button.mejs-mute button,
                .sc_accordion.sc_accordion_style_1 .sc_accordion_item .sc_accordion_title.ui-state-active,
                .sc_accordion.sc_accordion_style_1 .sc_accordion_item .sc_accordion_title:hover,
                .sc_accordion.sc_accordion_style_1 .sc_accordion_icon:before,
                .sc_accordion.sc_accordion_style_2 .sc_accordion_item .sc_accordion_title .sc_accordion_icon,
                .sc_audio .sc_audio_author_name,
                .sc_button.sc_button_style_border,
                .sc_countdown.sc_countdown_style_1 .sc_countdown_digits,
                .sc_countdown.sc_countdown_style_1 .sc_countdown_separator,
                .sc_countdown.sc_countdown_style_1 .sc_countdown_label,
                .sc_dropcaps.sc_dropcaps_style_1 .sc_dropcaps_item,
                .sc_highlight_style_2,
                .sc_tooltip_parent,
                .sc_icon_bg_link,
                .sc_icon_bg_menu,
                .sc_icon_bg_user,
                a:hover .sc_icon.sc_icon_bg_menu,
                .sc_icon_shape_round.sc_icon_bg_link:hover,
                .sc_icon_shape_square.sc_icon_bg_link:hover,
                a:hover .sc_icon_shape_round.sc_icon_bg_link,
                a:hover .sc_icon_shape_square.sc_icon_bg_link,
                .sc_icon_shape_round.sc_icon_bg_menu:hover,
                .sc_icon_shape_square.sc_icon_bg_menu:hover,
                a:hover .sc_icon_shape_round.sc_icon_bg_menu,
                a:hover .sc_icon_shape_square.sc_icon_bg_menu,
                .sc_list_style_ol>li::before,
                .ui-state-active .sc_tabs_icon,
                .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li:hover .sc_tabs_icon,
                .sc_team.sc_team_style_1 .sc_team_item .sc_socials a:hover,
                .sc_team.sc_team_style_2 .sc_team_item .sc_socials a:hover,
                .sc_team_item .sc_team_item_info .sc_team_item_title a,
                .sc_team .sc_team_item_description_span_icon,
                .sc_title_icon,
                .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active,
                .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title.ui-state-active,
                .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title.ui-state-active .sc_toggles_icon,
                .widget_area ul li,
                .sc_socials.sc_socials_size_small.sc_socials_share a,
                .post_item_masonry .post_info .post_info_counters,
                .post_item_excerpt .post_info .post_info_counters,
                .post_item_single .post_info .post_info_counters,
                .booking_day_white .booking_day_book,
                #booking_slot_form .booking_font_cuprum > div, .scheme_original #form_container_all > div,
                .widget_area .widget_calendar .month_cur
				{
					color:'.esc_attr($clr).';
				}

				{
					color: rgba('.(int)$rgb['r'].','.(int)$rgb['g'].','.(int)$rgb['b'].', 0.8);
				}
                .link_color_bgc,
                .link_dark_bgc,
                .menu_main_wrap .menu_main_nav_area .menu_main_responsive,
                .menu_main_wrap .menu_main_nav_area .menu_main_responsive a:hover,
                .tp-bullets.simplebullets.round .bullet.selected,
                .top_panel_style_light .page_top_wrap,
                .isotope_item_courses .post_featured .post_mark_new,
                .isotope_item_courses .post_featured .post_title,
                .isotope_item_courses .post_content.ih-item.square.colored .info,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_mark_new,
                .isotope_item_courses:nth-child(5n+2) .post_featured .post_title,
                .isotope_item_courses:nth-child(5n+2) .post_content.ih-item.colored .info,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_mark_new,
                .isotope_item_courses:nth-child(5n+4) .post_featured .post_title,
                .isotope_item_courses:nth-child(5n+4) .post_content.ih-item.colored .info,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_mark_new,
                .isotope_item_courses:nth-child(5n+3) .post_featured .post_title,
                .isotope_item_courses:nth-child(5n+3) .post_content.ih-item.colored .info,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_mark_new,
                .isotope_item_courses:nth-child(5n+5) .post_featured .post_title,
                .isotope_item_courses:nth-child(5n+5) .post_content.ih-item.colored .info,
                .isotope_item_courses:nth-child(5n+3) .post_info_wrap .post_button .sc_button:hover,
                .isotope_item_courses:nth-child(5n+5) .post_info_wrap .post_button .sc_button:hover,
                .isotope_filters a,
                .pagination_single > .pager_numbers,
                .pagination_single a,
                .pagination_slider .pager_cur,
                .pagination_pages > a,
                .pagination_pages > span,
                .pagination_viewmore > a,
                .viewmore_loader,
                .mfp-preloader span,
                .sc_video_frame.sc_video_active:before,
                .post_featured .post_nav_item:before,
                .post_featured .post_nav_item .post_nav_info,
                .reviews_block .reviews_summary .reviews_item,
                .reviews_block .reviews_max_level_100:nth-child(3n+1) .reviews_stars_hover,
                .reviews_block .reviews_item:nth-child(3n+1) .reviews_slider,
                .reviews_block .reviews_max_level_100:nth-child(3n+2) .reviews_stars_hover,
                .reviews_block .reviews_item:nth-child(3n+2) .reviews_slider,
                .reviews_block .reviews_max_level_100:nth-child(3n+3) .reviews_stars_hover,
                .reviews_block .reviews_item:nth-child(3n+3) .reviews_slider,
                .error404.top_panel_style_light .page_content_wrap,
                .widget_area .widget_calendar td a:hover,
                .widget_area .widget_product_tag_cloud a:hover,
                .widget_area .widget_tag_cloud a:hover,
                .widget_area .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li:hover a,
                .widget_area .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li.ui-state-active a,
                .scroll_to_top,
                .scroll_to_top:hover,
                .tribe-events-calendar thead th,
                a.tribe-events-read-more,
                .tribe-events-button,
                .tribe-events-nav-previous a,
                .tribe-events-nav-next a,
                .tribe-events-widget-link a,
                .tribe-events-viewmore a,
                .mejs-horizontal-volume-current:after,
                .sc_button.sc_button_style_filled.sc_button_bg_menu,
                .sc_blogger.layout_date .sc_blogger_item .sc_blogger_date,
                .sc_highlight_style_1,
                .sc_icon_shape_round.sc_icon_bg_link,
                .sc_icon_shape_square.sc_icon_bg_link,
                .sc_icon_shape_round.sc_icon_bg_menu,
                .sc_icon_shape_square.sc_icon_bg_menu,
                .sc_infobox.sc_infobox_style_regular,
                .sc_infobox.sc_infobox_style_result,
                .sc_popup:before,
                .sc_price_block .sc_price_block_link .sc_button,
                .sc_price_block .sc_price_block_title,
                .sc_price_block.sc_price_block_style_2,
                .sc_scroll_controls_wrap a,
                .sc_scroll_controls_type_side .sc_scroll_controls_wrap a,
                .sc_scroll_controls_wrap a:hover,
                .sc_skills_bar .sc_skills_item .sc_skills_count,
                .sc_skills_counter .sc_skills_item.sc_skills_style_3 .sc_skills_count,
                .sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_count,
                .sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_info,
                .sc_slider_controls_wrap a,
                .sc_slider_controls_wrap a:hover,
                .sc_slider_swiper .sc_slider_pagination_wrap span,
                .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active .sc_toggles_icon_opened,
                .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title .sc_toggles_icon,
                .sc_tooltip_parent .sc_tooltip,
                .sc_tooltip_parent .sc_tooltip:before,
                .sc_scroll_bar .swiper-scrollbar-drag:before
                				{
					background-color: '.esc_attr($clr).';
				}

				.link_color_bg,
				.link_dark_bg,
				.post_content.ih-item.circle.effect1.colored .info,
                .post_content.ih-item.circle.effect2.colored .info,
                .post_content.ih-item.circle.effect3.colored .info,
                .post_content.ih-item.circle.effect4.colored .info,
                .post_content.ih-item.circle.effect5.colored .info .info-back,
                .post_content.ih-item.circle.effect6.colored .info,
                .post_content.ih-item.circle.effect7.colored .info,
                .post_content.ih-item.circle.effect8.colored .info,
                .post_content.ih-item.circle.effect9.colored .info,
                .post_content.ih-item.circle.effect10.colored .info,
                .post_content.ih-item.circle.effect11.colored .info,
                .post_content.ih-item.circle.effect12.colored .info,
                .post_content.ih-item.circle.effect13.colored .info,
                .post_content.ih-item.circle.effect14.colored .info,
                .post_content.ih-item.circle.effect15.colored .info,
                .post_content.ih-item.circle.effect16.colored .info,
                .post_content.ih-item.circle.effect18.colored .info .info-back,
                .post_content.ih-item.circle.effect19.colored .info,
                .post_content.ih-item.circle.effect20.colored .info .info-back,
                .post_content.ih-item.square.effect1.colored .info,
                .post_content.ih-item.square.effect2.colored .info,
                .post_content.ih-item.square.effect3.colored .info,
                .post_content.ih-item.square.effect4.colored .mask1,
                .post_content.ih-item.square.effect4.colored .mask2,
                .post_content.ih-item.square.effect5.colored .info,
                .post_content.ih-item.square.effect6.colored .info,
                .post_content.ih-item.square.effect7.colored .info,
                .post_content.ih-item.square.effect8.colored .info,
                .post_content.ih-item.square.effect9.colored .info .info-back,
                .post_content.ih-item.square.effect10.colored .info,
                .post_content.ih-item.square.effect11.colored .info,
                .post_content.ih-item.square.effect12.colored .info,
                .post_content.ih-item.square.effect13.colored .info,
                .post_content.ih-item.square.effect14.colored .info,
                .post_content.ih-item.square.effect15.colored .info,
                .post_content.ih-item.circle.effect20.colored .info .info-back,
                .post_content.ih-item.square.effect_book.colored .info,
                .post_content.ih-item.circle.effect1.colored .info,
                .post_content.ih-item.circle.effect2.colored .info,
                .post_content.ih-item.circle.effect5.colored .info .info-back,
                .post_content.ih-item.circle.effect19.colored .info,
                .post_content.ih-item.square.effect4.colored .mask1,
                .post_content.ih-item.square.effect4.colored .mask2,
                .post_content.ih-item.square.effect6.colored .info,
                .post_content.ih-item.square.effect7.colored .info,
                .post_content.ih-item.square.effect12.colored .info,
                .post_content.ih-item.square.effect13.colored .info,
                .post_content.ih-item.square.effect_dir.colored .info,
                .post_content.ih-item.square.effect_shift.colored .info,
                .sc_table table tr:first-child th,
                #menu-services-menu a:hover,
                blockquote:before,
                blockquote.type_2:before,
                #bbpress-forums div.bbp-topic-content a,
                #buddypress button, #buddypress a.button, #buddypress input[type="submit"], #buddypress input[type="button"], #buddypress input[type="reset"], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, a.bp-title-button, #buddypress div.item-list-tabs ul li.selected a,
                #bbpress-forums div.bbp-topic-content a:hover,
                #buddypress button:hover, #buddypress a.button:hover, #buddypress input[type="submit"]:hover, #buddypress input[type="button"]:hover, #buddypress input[type="reset"]:hover, #buddypress ul.button-nav li a:hover, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, a.bp-title-button:hover, #buddypress div.item-list-tabs ul li.selected a:hover,
                .sc_dropcaps.sc_dropcaps_style_4 .sc_dropcaps_item,
                figure figcaption,
                .sc_image figcaption,
                .sc_tabs.sc_tabs_style_1 .sc_tabs_titles li.ui-state-active a,
                .sc_tabs.sc_tabs_style_1 .sc_tabs_titles li:hover,
                .post_rating .reviews_value,
                .mejs-container .mejs-controls .mejs-playpause-button,
                .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-time-rail .mejs-time-current
				{
					background: '.esc_attr($clr).';
				}
				.mejs-container .mejs-controls .mejs-playpause-button,
                .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-time-rail .mejs-time-current
				{
					background: '.esc_attr($clr).' !important;
				}


				.link_color_border,
				.link_dark_border,
				.search_wrap.search_style_regular.search_opened,
				.top_panel_style_light .content .search_wrap.search_style_regular.search_opened,
				.tp-bullets.simplebullets.round .bullet.selected,
				.tp-bullets.simplebullets.round .bullet.selected:after,
				.pagination > a,
				.post_format_aside.post_item_single .post_content p,
                .post_format_aside .post_descr,
                .isotope_filters a,
                .pagination_single > .pager_numbers,
                .pagination_single a,
                .pagination_slider .pager_cur,
                .pagination_pages > a,
                .pagination_pages > span,
                .comments_list_wrap > ul > li > ul.children,
                .comments_list_wrap > ul > li > ul > li,
                .comments_list_wrap > ul > li > ul.children > li > ul.children,
                .comments_list_wrap > ul > li > ul > li > ul > li,
                .comments_list_wrap > ul > li > ul.children > li > ul.children > li > ul.children > li > ul.children,
                .comments_list_wrap > ul > li > ul > li > ul > li > ul > li > ul > li,
                .comments_list_wrap > ul > li > ul.children > li > ul.children > li > ul.children > li > ul.children > li > ul.children,
                .comments_list_wrap > ul > li > ul > li > ul > li > ul > li > ul > li > ul > li,
                .widget_area .widget_calendar .today .day_wrap,
                .widget_area .widget_product_tag_cloud a,
                .widget_area .widget_tag_cloud a,
                .widget_area .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li:hover a,
                .widget_area .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li.ui-state-active a,
                .sc_accordion.sc_accordion_style_1 .sc_accordion_icon:before,
                .sc_accordion.sc_accordion_style_2 .sc_accordion_item .sc_accordion_title .sc_accordion_icon,
                .sc_button.sc_button_style_border,
                .sc_blogger.layout_date .sc_blogger_item .sc_blogger_date,
                .sc_highlight_style_2,
                .sc_icon_shape_round.sc_icon_bg_link,
                .sc_icon_shape_square.sc_icon_bg_link,
                .sc_icon_shape_round.sc_icon_bg_menu,
                .sc_icon_shape_square.sc_icon_bg_menu,
                .sc_skills_bar .sc_skills_item .sc_skills_count,
                .sc_slider_swiper .sc_slider_pagination_wrap span:hover,
                .sc_slider_swiper .sc_slider_pagination_wrap .swiper-active-switch,
                .ui-state-active .sc_tabs_icon,
                .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li:hover .sc_tabs_icon,
                .sc_team .sc_team_item_description_span_icon,
                .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active,
                .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title .sc_toggles_icon

				{
					border-color: '.esc_attr($clr).'; 
				}
				.post_content.ih-item.circle.effect1 .spinner
				{
					border-right-color: '.esc_attr($clr).';
				}
				.post_content.ih-item.circle.effect1 .spinner,
				.sc_tooltip_parent
				{
					border-bottom-color: '.esc_attr($clr).'; 
				}
				.post_item_related .post_content_wrap,
				.post_item_related:nth-child(3n+2) .post_content_wrap
				{
				    border-top-color: '.esc_attr($clr).';
				}
			';
		}
		// Links dark color
		$clr_dark = ancora_get_custom_option('link_dark');
		if (empty($clr_dark) && $scheme!= 'original')	$clr_dark = ancora_get_link_dark();
		if (!empty($clr) || !empty($clr_dark)) {
			if (empty($clr_dark)) {
				$hsb = ancora_hex2hsb($clr);
				$hsb['s'] = min(100, $hsb['s'] + 15);
				$hsb['b'] = max(0, $hsb['b'] - 20);
				$clr = ancora_hsb2hex($hsb);
			} else
				$clr = $clr_dark;
			$ANCORA_GLOBALS['color_schemes'][$scheme]['link_dark'] = $clr;
			//$rgb = ancora_hex2rgb($clr);
			$custom_style .= '';
		}


		// Menu color
		$clr = ancora_get_custom_option('menu_color');
		if (empty($clr) && $scheme!= 'original')	$clr = ancora_get_menu_color();
		if (!empty($clr)) {
			$ANCORA_GLOBALS['color_schemes'][$scheme]['menu_color'] = $clr;
			$rgb = ancora_hex2rgb($clr);
			$custom_style .= '
				.menu_color,
				a.menu_color:hover,
				.menu_dark,
				.user_color,
				.user_dark,
				.top_panel_style_light .menu_main_wrap .logo a,
                .top_panel_style_light .menu_main_wrap .menu_main_nav > li > a,
                .sc_dropcaps.sc_dropcaps_style_2 .sc_dropcaps_item,
                .sc_team_item .sc_team_item_info .sc_team_item_title a:hover
				{
					color: '.esc_attr($clr).';
				}
                .menu_color_bgc,
                .menu_dark_bgc,
                .user_color_bg,
                .user_dark_bg,
                .top_panel_fixed.top_panel_over.top_panel_opacity_transparent .top_panel_wrap,
                .menu_main_wrap .menu_main_nav > li:hover,
                .menu_main_wrap .menu_main_nav > li.sfHover,
                .menu_main_wrap .menu_main_nav > li#blob,
                .menu_main_wrap .menu_main_nav > li.current-menu-item,
                .menu_main_wrap .menu_main_nav > li.current-menu-parent,
                .menu_main_wrap .menu_main_nav > li.current-menu-ancestor,
                .menu_main_wrap .menu_main_nav > li ul,
                .menu_main_wrap .menu_main_nav > li ul li a:hover,
                .menu_main_wrap .menu_main_nav > li ul li.current-menu-item > a,
                .menu_main_wrap .menu_main_nav > li ul li.current-menu-ancestor > a,
                .menu_user_wrap .menu_user_nav > li.menu_user_register,
                .menu_user_wrap .menu_user_nav > li.menu_user_login,
                .menu_user_wrap .menu_user_nav > li.menu_user_logout,
                .top_panel_style_dark.article_style_stretch .page_top_wrap,
                .page_top_wrap .breadcrumbs .breadcrumbs_item,
                .page_top_wrap .breadcrumbs a.breadcrumbs_item:hover,
                .sc_button.sc_button_style_filled,
                .sc_highlight_style_3
				{
					background-color: '.esc_attr($clr).';
				}

				.custom_options #co_toggle
				{
					background-color: '.esc_attr($clr).' !important;
				}
				.menu_color_bg,
				.menu_dark_bg,
				.user_color_bg,
				.user_dark_bg,
				.menu_main_wrap .menu_main_nav .sub-menu li,
				.post_content.ih-item.circle.effect1.colored .info,
				.post_content.ih-item.circle.effect2.colored .info,
				.post_content.ih-item.circle.effect3.colored .info,
				.post_content.ih-item.circle.effect4.colored .info,
				.post_content.ih-item.circle.effect5.colored .info .info-back,
				.post_content.ih-item.circle.effect6.colored .info,
				.post_content.ih-item.circle.effect7.colored .info,
				.post_content.ih-item.circle.effect8.colored .info,
				.post_content.ih-item.circle.effect9.colored .info,
				.post_content.ih-item.circle.effect10.colored .info,
				.post_content.ih-item.circle.effect11.colored .info,
				.post_content.ih-item.circle.effect12.colored .info,
				.post_content.ih-item.circle.effect13.colored .info,
				.post_content.ih-item.circle.effect14.colored .info,
				.post_content.ih-item.circle.effect15.colored .info,
				.post_content.ih-item.circle.effect16.colored .info,
				.post_content.ih-item.circle.effect18.colored .info .info-back,
				.post_content.ih-item.circle.effect19.colored .info,
				.post_content.ih-item.circle.effect20.colored .info .info-back,
				.post_content.ih-item.square.effect1.colored .info,
				.post_content.ih-item.square.effect2.colored .info,
				.post_content.ih-item.square.effect3.colored .info,
				.post_content.ih-item.square.effect4.colored .mask1,
				.post_content.ih-item.square.effect4.colored .mask2,
				.post_content.ih-item.square.effect5.colored .info,
				.post_content.ih-item.square.effect6.colored .info,
				.post_content.ih-item.square.effect7.colored .info,
				.post_content.ih-item.square.effect8.colored .info,
				.post_content.ih-item.square.effect9.colored .info .info-back,
				.post_content.ih-item.square.effect10.colored .info,
				.post_content.ih-item.square.effect11.colored .info,
				.post_content.ih-item.square.effect12.colored .info,
				.post_content.ih-item.square.effect13.colored .info,
				.post_content.ih-item.square.effect14.colored .info,
				.post_content.ih-item.square.effect15.colored .info,
				.post_content.ih-item.circle.effect20.colored .info .info-back,
				.post_content.ih-item.square.effect_book.colored .info,
				.page_top_wrap .breadcrumbs .breadcrumbs_delimiter:before,
				.menu_user_wrap .menu_user_nav li li.current-menu-item > a:before, .menu_main_wrap .menu_main_nav li li.current-menu-item > a:before
				{
					background: '.esc_attr($clr).';
				}
				.menu_color_border,
				.menu_dark_border,
				.user_color_border,
				.user_dark_border

				{
					border-color: '.esc_attr($clr).';
				}
				.post_content.ih-item.circle.effect1 .spinner
				{
					border-right-color: '.esc_attr($clr).';
				}
				.post_content.ih-item.circle.effect1 .spinner
				{
					border-bottom-color: '.esc_attr($clr).';
				}
				.post_item_related:nth-child(3n+2) .post_content_wrap
				{
					border-top-color: '.esc_attr($clr).';
				}
			';
		}
		
		// Menu dark color
		$clr_dark = ancora_get_custom_option('menu_dark');
		if (empty($clr_dark) && $scheme!= 'original')	$clr_dark = ancora_get_menu_dark();
		if (!empty($clr) || !empty($clr_dark)) {
			if (empty($clr_dark)) {
				$hsb = ancora_hex2hsb($clr);
				$hsb['s'] = min(100, $hsb['s'] + 15);
				$hsb['b'] = max(0, $hsb['b'] - 20);
				$clr = ancora_hsb2hex($hsb);
			} else
				$clr = $clr_dark;
			$ANCORA_GLOBALS['color_schemes'][$scheme]['menu_dark'] = $clr;
			//$rgb = ancora_hex2rgb($clr);
			$custom_style .= '';
		}

		// User color
		$clr = ancora_get_custom_option('user_color');
		if (empty($clr) && $scheme!= 'original')	$clr = ancora_get_user_color();
		if (!empty($clr)) {
			$ANCORA_GLOBALS['color_schemes'][$scheme]['user_color'] = $clr;
			$rgb = ancora_hex2rgb($clr);
			$custom_style .= '';
		}
		// User dark color
		$clr_dark = ancora_get_custom_option('user_dark');
		if (empty($clr_dark) && $scheme!= 'original')	$clr_dark = ancora_get_user_dark();
		if (!empty($clr) || !empty($clr_dark)) {
			if (empty($clr_dark)) {
				$hsb = ancora_hex2hsb($clr);
				$hsb['s'] = min(100, $hsb['s'] + 15);
				$hsb['b'] = max(0, $hsb['b'] - 20);
				$clr = ancora_hsb2hex($hsb);
			} else
				$clr = $clr_dark;
			$ANCORA_GLOBALS['color_schemes'][$scheme]['user_dark'] = $clr;
			//$rgb = ancora_hex2rgb($clr);
			$custom_style .= '';
		}
		return $custom_style;	
	}
}

// Add skin responsive styles
if (!function_exists('ancora_action_add_responsive_dentalux')) {
	//add_action('ancora_action_add_responsive', 'ancora_action_add_responsive_dentalux');
	function ancora_action_add_responsive_dentalux() {
		if (file_exists(ancora_get_file_dir('skins/dentalux/skin-responsive.css')))
			ancora_enqueue_style( 'theme-skin-responsive-style', ancora_get_file_url('skins/dentalux/skin-responsive.css'), array(), null );
	}
}

// Add skin responsive inline styles
if (!function_exists('ancora_filter_add_responsive_inline_dentalux')) {
	//add_filter('ancora_filter_add_responsive_inline', 'ancora_filter_add_responsive_inline_dentalux');
	function ancora_filter_add_responsive_inline_dentalux($custom_style) {
		return $custom_style;	
	}
}


//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
if (!function_exists('ancora_action_add_scripts_dentalux')) {
	//add_action('ancora_action_add_scripts', 'ancora_action_add_scripts_dentalux');
	function ancora_action_add_scripts_dentalux() {
		if (file_exists(ancora_get_file_dir('skins/dentalux/skin.js')))
			ancora_enqueue_script( 'theme-skin-script', ancora_get_file_url('skins/dentalux/skin.js'), array(), null );
		if (ancora_get_theme_option('show_theme_customizer') == 'yes' && file_exists(ancora_get_file_dir('skins/dentalux/skin.customizer.js')))
			ancora_enqueue_script( 'theme-skin-customizer-script', ancora_get_file_url('skins/dentalux/skin.customizer.js'), array(), null );
	}
}

// Add skin scripts inline
if (!function_exists('ancora_action_add_scripts_inline_dentalux')) {
	//add_action('ancora_action_add_scripts_inline', 'ancora_action_add_scripts_inline_dentalux');
	function ancora_action_add_scripts_inline_dentalux() {
		echo '<script type="text/javascript">'
			. 'jQuery(document).ready(function() {'
			. "if (ANCORA_GLOBALS['theme_font']=='') ANCORA_GLOBALS['theme_font'] = 'Lato';"
			. "ANCORA_GLOBALS['link_color'] = '" . ancora_get_link_color(ancora_get_custom_option('link_color')) . "';"
			. "ANCORA_GLOBALS['menu_color'] = '" . ancora_get_menu_color(ancora_get_custom_option('menu_color')) . "';"
			. "ANCORA_GLOBALS['user_color'] = '" . ancora_get_user_color(ancora_get_custom_option('user_color')) . "';"
			. "});"
			. "</script>";
	}
}


//------------------------------------------------------------------------------
// Get skin's colors
//------------------------------------------------------------------------------


// Return main theme bg color
if (!function_exists('ancora_filter_get_theme_bgcolor_dentalux')) {
	//add_filter('ancora_filter_get_theme_bgcolor', 'ancora_filter_get_theme_bgcolor_dentalux', 10, 1);
	function ancora_filter_get_theme_bgcolor_dentalux($clr) {
		return '#ffffff';
	}
}



// Return link color (if not set in the theme options)
if (!function_exists('ancora_filter_get_link_color_dentalux')) {
	//add_filter('ancora_filter_get_link_color', 'ancora_filter_get_link_color_dentalux', 10, 1);
	function ancora_filter_get_link_color_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('link_color') : $clr;
	}
}

// Return links dark color (if not set in the theme options)
if (!function_exists('ancora_filter_get_link_dark_dentalux')) {
	//add_filter('ancora_filter_get_link_dark', 'ancora_filter_get_link_dark_dentalux', 10, 1);
	function ancora_filter_get_link_dark_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('link_dark') : $clr;
	}
}



// Return main menu color (if not set in the theme options)
if (!function_exists('ancora_filter_get_menu_color_dentalux')) {
	//add_filter('ancora_filter_get_menu_color', 'ancora_filter_get_menu_color_dentalux', 10, 1);
	function ancora_filter_get_menu_color_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('menu_color') : $clr;
	}
}

// Return main menu dark color (if not set in the theme options)
if (!function_exists('ancora_filter_get_menu_dark_dentalux')) {
	//add_filter('ancora_filter_get_menu_dark', 'ancora_filter_get_menu_dark_dentalux', 10, 1);
	function ancora_filter_get_menu_dark_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('menu_dark') : $clr;
	}
}



// Return user menu color (if not set in the theme options)
if (!function_exists('ancora_filter_get_user_color_dentalux')) {
	//add_filter('ancora_filter_get_user_color', 'ancora_filter_get_user_color_dentalux', 10, 1);
	function ancora_filter_get_user_color_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('user_color') : $clr;
	}
}

// Return user menu dark color (if not set in the theme options)
if (!function_exists('ancora_filter_get_user_dark_dentalux')) {
	//add_filter('ancora_filter_get_user_dark', 'ancora_filter_get_user_dark_dentalux', 10, 1);
	function ancora_filter_get_user_dark_dentalux($clr) {
		return empty($clr) ? ancora_get_scheme_color('user_dark') : $clr;
	}
}
?>