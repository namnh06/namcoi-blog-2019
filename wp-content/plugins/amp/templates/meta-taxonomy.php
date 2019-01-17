<?php $categories = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'amp' ), '', $this->ID ); ?>
<?php if ( $categories ) : ?>
	<div class="amp-wp-meta amp-wp-tax-category">
		<?php
		/* translators: %s: list of categories. */
		printf( esc_html__( 'Categories: %s', 'amp' ), $categories ); // WPCS: XSS OK.
		?>
	</div>
<?php endif; ?>

<?php
$tags = get_the_tag_list(
	'',
	_x( ', ', 'Used between list items, there is a space after the comma.', 'amp' ),
	'',
	$this->ID
); ?>
<?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
	<div class="amp-wp-meta amp-wp-tax-tag">
		<?php
		/* translators: %s: list of tags. */
		printf( esc_html__( 'Tags: %s', 'amp' ), $tags ); // WPCS: XSS OK.
		?>
	</div>
<?php endif; ?>
