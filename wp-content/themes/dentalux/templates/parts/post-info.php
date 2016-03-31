			<div class="post_info">
				<?php
				$info_parts = array_merge(array(
					'snippets' => false,	// For singular post/page/course/team etc.
					'date' => true,
					'author' => true,
					'terms' => true,
					'counters' => true,
					'shedule' => false,		// For single course
					'length' => false		// For single course
					), isset($info_parts) && is_array($info_parts) ? $info_parts : array());
									
				if (in_array($post_data['post_type'], array('courses', 'lesson'))) {
					$course_start = is_single() ? ancora_get_custom_option('date_start') : ancora_get_custom_option('date_start', '', $post_data['post_id'], $post_data['post_type']);	//!!!!!
					if (empty($course_start) || ancora_is_inherit_option($course_start)) $course_start = $post_data['post_date'];
					$course_end  = is_single() ? ancora_get_custom_option('date_end') : ancora_get_custom_option('date_end', '', $post_data['post_id'], $post_data['post_type']);	//!!!!!
					$course_shed = is_single() ? ancora_get_custom_option('shedule') : ancora_get_custom_option('shedule', '', $post_data['post_id'], $post_data['post_type']);	//!!!!!
					if ($info_parts['date']) {
						?>
						<span class="post_info_item post_info_posted"><?php
							echo (empty($course_end) || ancora_is_inherit_option($course_end) || $course_end >= date('Y-m-d')
								? ($course_start >= date('Y-m-d') 
									? __('Starts on', 'ancora')
									: __('Started on', 'ancora'))
								: __('Finished on', 'ancora')); ?> <a href="<?php echo esc_url($post_data['post_link']); ?>" class="post_info_date<?php echo esc_attr($info_parts['snippets'] ? ' date updated' : ''); ?>"<?php echo ($info_parts['snippets'] ? ' itemprop="datePublished" content="'.esc_attr($course_start).'"' : ''); ?>><?php echo date(get_option('date_format'), strtotime(empty($course_end) || ancora_is_inherit_option($course_end) || $course_end >= date('Y-m-d') ? $course_start : $course_end)); ?></a></span>
						<?php
					}
					if ($info_parts['shedule'] && !empty($course_shed)) {
						?>
						<span class="post_info_item post_info_time"><?php echo ($course_shed); ?></span>
						<?php
					}
					if ($info_parts['length'] && !empty($course_end)) {
						?>
						<span class="post_info_item post_info_length"><?php _e('Length', 'ancora'); ?> <span class="post_info_months"><?php echo trim(ancora_get_date_difference($course_start, $course_end, 2)); ?></span></span>
						<?php
					}
					if ($info_parts['terms'] && !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms_links)) {
						?>
						<span class="post_info_item post_info_tags"><?php _e('Category', 'ancora'); ?> <?php echo join(', ', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_links); ?></span>
						<?php
					}
					if ($info_parts['author'] && $post_data['post_type']=='lesson') {
						$teacher_id = is_single() ? ancora_get_custom_option('teacher') : ancora_get_custom_option('teacher', '', $post_data['post_id'], $post_data['post_type']);	//!!!!!
						$teacher_post = get_post($teacher_id);
						$teacher_link = get_permalink($teacher_id);
						?>
						<span class="post_info_item post_info_posted_by<?php echo ($info_parts['snippets'] ? ' vcard' : ''); ?>"<?php echo ($info_parts['snippets'] ? ' itemprop="author"' : ''); ?>><?php _e('Teacher', 'ancora'); ?> <a href="<?php echo esc_url($teacher_link); ?>" class="post_info_author"><?php echo esc_html($teacher_post->post_title); ?></a></span>
					<?php 
					}
				} else {
					if ($info_parts['date']) {
						?>
						<span class="post_info_item post_info_posted"><a href="<?php echo esc_url($post_data['post_link']); ?>" class="post_info_date<?php echo esc_attr($info_parts['snippets'] ? ' date updated' : ''); ?>"<?php echo ($info_parts['snippets'] ? ' itemprop="datePublished" content="'.get_the_date('Y-m-d').'"' : ''); ?>><?php echo esc_html($post_data['post_date']); ?></a></span>
						<?php
					}
					if ($info_parts['author']) {
						?>
						<span class="post_info_item post_info_posted_by<?php echo ($info_parts['snippets'] ? ' vcard' : ''); ?>"<?php echo ($info_parts['snippets'] ? ' itemprop="author"' : ''); ?>><?php _e('by', 'ancora'); ?> <a href="<?php echo esc_url($post_data['post_author_url']); ?>" class="post_info_author"><?php echo ($post_data['post_author']); ?></a></span>
					<?php 
					}
//					if ($info_parts['terms'] && !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms_links)) {
//						?>
<!--						<span class="post_info_item post_info_tags">--><?php //_e('in', 'ancora'); ?><!-- --><?php //echo join(', ', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_links); ?><!--</span>-->
<!--						--><?php
//					}
				}
				if ($info_parts['counters']) {
					?>
					<span class="post_info_item post_info_counters"><?php require(ancora_get_file_dir('templates/parts/counters.php')); ?></span>
					<?php
				}
				if (is_single() && !ancora_get_global('blog_streampage') && ($post_data['post_edit_enable'] || $post_data['post_delete_enable'])) {
					?>
					<span class="frontend_editor_buttons">
						<?php if ($post_data['post_edit_enable']) { ?>
						<span class="post_info_item post_info_button post_info_button_edit"><a id="frontend_editor_icon_edit" class="icon-pencil" title="<?php _e('Edit post', 'ancora'); ?>" href="#"><?php _e('Edit', 'ancora'); ?></a></span>
						<?php } ?>
						<?php if ($post_data['post_delete_enable']) { ?>
						<span class="post_info_item post_info_button post_info_button_delete"><a id="frontend_editor_icon_delete" class="icon-trash" title="<?php _e('Delete post', 'ancora'); ?>" href="#"><?php _e('Delete', 'ancora'); ?></a></span>
						<?php } ?>
					</span>
					<?php
				}
				?>
			</div>
