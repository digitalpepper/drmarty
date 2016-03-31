<?php
/*
 * The template for displaying "Page 404"
*/

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'ancora_template_404_theme_setup' ) ) {
	add_action( 'ancora_action_before_init_theme', 'ancora_template_404_theme_setup', 1 );
	function ancora_template_404_theme_setup() {
		ancora_add_template(array(
			'layout' => '404',
			'mode'   => 'internal',
			'title'  => 'Page 404',
			'theme_options' => array(
				'article_style' => 'stretch'
			),
			'w'		 => null,
			'h'		 => null
			));
	}
}

// Template output
if ( !function_exists( 'ancora_template_404_output' ) ) {
	function ancora_template_404_output() {
		?>
		<article class="post_item post_item_404 clearfix">
			<div class="post_content">
                <div class="error404_image"><img src="../wp-content/themes/dentalux/images/404_<?php echo ancora_get_custom_option('page404_style');?>.jpg"></div>
                <div class="error404_info">
				    <h2 class="page_title"><?php _e( 'We are <span>Sorry!</span>', 'ancora' ); ?></h2>
				    <h2 class="page_title"><?php _e('Your Page cannot be found!', 'ancora'); ?></h2>
				    <p class="page_description"><?php echo sprintf( __('Can\'t find what you need? Take a moment and do a search below<br>or start from <a href="%s">our homepage</a>.', 'ancora'), home_url() ); ?></p>
                    <div class="page_search"><?php echo do_shortcode('[trx_search style="flat" open="fixed" title=""]'); ?></div>
                </div>
			</div>
		</article>
		<?php
	}
}
?>