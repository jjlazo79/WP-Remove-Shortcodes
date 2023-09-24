<?php


/**
 * Remove shortcodes from content
 *
 * @return void
 */
function remove_shortcodes_from_content()
{
	$args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
	);
	$posts = get_posts($args);
	foreach ($posts as $post) {
		$post->post_content = preg_replace('#\[.*?\]#', '', $post->post_content);
		wp_update_post($post);
	}
}
add_action('init', 'remove_shortcodes_from_content');





