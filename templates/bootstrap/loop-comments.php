<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $uwp_widget_args;
$the_query = isset( $uwp_widget_args['template_args']['the_query'] ) ? $uwp_widget_args['template_args']['the_query'] : '';
$maximum_pages = isset( $uwp_widget_args['template_args']['maximum_pages'] ) ? $uwp_widget_args['template_args']['maximum_pages'] : '';
?>
<h3><?php echo __('Comments', 'userswp') ?></h3>

<div class="uwp-profile-comments-loop">
	<?php
	// The Loop
	if ($the_query) {
		$design_style = ! empty( $uwp_widget_args['design_style'] ) ? esc_attr( $uwp_widget_args['design_style'] ) : uwp_get_option( "design_style", 'bootstrap' );
		$template     = $design_style ? $design_style . "/comments-item" : "comments-item";
		echo '<div class="cards">';
		foreach ( $the_query as $comment ) {
			$uwp_widget_args['template_args']['comment'] = $comment;
			uwp_locate_template($template);
		}
		echo '</div>';
	} else {
		// no comments found
		echo "<p>".__('No Comments Found', 'userswp')."</p>";
	}

	do_action('uwp_profile_pagination', $maximum_pages);
	?>
</div>