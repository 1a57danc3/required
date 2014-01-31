<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( ' ', 'placeholder', 'required' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( ' ', 'label', 'required' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( '搜索', 'submit button', 'required' ); ?>" />
</form><!-- /.search-form -->
