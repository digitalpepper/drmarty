			<?php 
				// WP custom header
				$header_image = $header_image2 = $header_color = '';
				if ($top_panel_style=='dark') {
					if (($header_image = get_header_image()) == '') {
						$header_image = ancora_get_custom_option('top_panel_bg_image');
					}
					if (file_exists(ancora_get_file_dir('skins/'.($theme_skin).'/images/bg_over.png'))) {
						$header_image2 = ancora_get_file_url('skins/'.($theme_skin).'/images/bg_over.png');
					}
					$header_color = ancora_get_link_color(ancora_get_custom_option('top_panel_bg_color'));
				}

				$header_style = $top_panel_opacity!='transparent' && ($header_image!='' || $header_image2!='' || $header_color!='') 
					? ' style="background: ' 
						. ($header_image2!='' ? 'url('.esc_url($header_image2).') repeat-x center bottom' : '')
						. ($header_image!=''  ? ($header_image2!='' ? ',' : '') . 'url('.esc_url($header_image).') repeat center top' : '') 
						. ($header_color!=''  ? ' '.esc_attr($header_color).';' : '')
						.'"' 
					: '';
			?>

			<div class="top_panel_fixed_wrap style"></div>

			<header class="top_panel_wrap top_panel_style_1 bg_tint_<?php echo esc_attr($top_panel_style); ?>" <?php echo ($header_style); ?>>
				
				<?php if (ancora_get_custom_option('show_menu_user')=='yes') { ?>
					<div class="menu_user_wrap">
						<div class="content_wrap clearfix">
                            <?php if (ancora_get_custom_option('show_login')=='yes') { ?>
                                <div class="menu_user_area menu_user_right menu_user_nav_area">
                                    <?php require_once( ancora_get_file_dir('templates/parts/user-panel.php') ); ?>
                                </div>
                            <?php } ?>

                            <?php if (ancora_get_custom_option('show_timetable_area')=='yes') { ?>
                            <div class="menu_user_area menu_user_right menu_user_timetable_area"><?php echo force_balance_tags(trim(ancora_get_custom_option('timetable'))); ?></div>
                            <?php } ?>
							<?php if (ancora_get_custom_option('show_contact_info')=='yes') { ?>
							<div class="menu_user_area menu_user_left menu_user_contact_area"><span class=" sc_icon icon-cellphone67 sc_icon_shape_round "></span><span class="contact_text"> <?php echo force_balance_tags(trim(ancora_get_custom_option('before_contact_info'))); ?> </span> <?php echo force_balance_tags(trim(ancora_get_custom_option('contact_info'))); ?></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<div class="menu_main_wrap logo_<?php echo esc_attr(ancora_get_custom_option('logo_align')); ?><?php echo ($ANCORA_GLOBALS['logo_text'] ? ' with_text' : ''); ?>">
					<div class="content_wrap clearfix">
						<div class="logo">
							<a href="<?php echo esc_url(home_url()); ?>"><?php echo !empty($ANCORA_GLOBALS['logo_'.($logo_style)]) ? '<img src="'.esc_url($ANCORA_GLOBALS['logo_'.($logo_style)]).'" class="logo_main" alt=""><img src="'.esc_url($ANCORA_GLOBALS['logo_fixed']).'" class="logo_fixed" alt="">' : ''; ?><?php echo ($ANCORA_GLOBALS['logo_text'] ? '<span class="logo_text">'.($ANCORA_GLOBALS['logo_text']).'</span>' : ''); ?><?php echo ($ANCORA_GLOBALS['logo_slogan'] ? '<span class="logo_slogan">' . esc_html($ANCORA_GLOBALS['logo_slogan']) . '</span>' : ''); ?></a>
						</div>
                     </div>
                </div>
                <div class="menu_main_separator"></div>
                <div class="menu_main_wrap logo_<?php echo esc_attr(ancora_get_custom_option('logo_align')); ?><?php echo ($ANCORA_GLOBALS['logo_text'] ? ' with_text' : ''); ?>">
                    <div class="content_wrap clearfix">
                        <?php if (ancora_get_custom_option('show_search')=='yes') echo do_shortcode('[trx_search open="no" title=""]'); ?>

                        <a href="#" class="menu_main_responsive_button icon-menu"></a>
						<nav role="navigation" class="menu_main_nav_area">
							<?php
							if (empty($ANCORA_GLOBALS['menu_main'])) $ANCORA_GLOBALS['menu_main'] = ancora_get_nav_menu('menu_main');
							if (empty($ANCORA_GLOBALS['menu_main'])) $ANCORA_GLOBALS['menu_main'] = ancora_get_nav_menu();
							echo ($ANCORA_GLOBALS['menu_main']);
							?>
						</nav>
					</div>
				</div>



			</header>
