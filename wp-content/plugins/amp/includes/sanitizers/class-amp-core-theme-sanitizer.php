<?php
/**
 * Class AMP_Core_Theme_Sanitizer.
 *
 * @package AMP
 * @since 1.0
 */

/**
 * Class AMP_Core_Theme_Sanitizer
 *
 * Fixes up common issues in core themes and others.
 *
 * @see AMP_Validation_Error_Taxonomy::accept_core_theme_validation_errors()
 * @since 1.0
 */
class AMP_Core_Theme_Sanitizer extends AMP_Base_Sanitizer {

	/**
	 * Array of flags used to control sanitization.
	 *
	 * @since 1.0
	 * @var array {
	 *      @type string $stylesheet     Stylesheet slug.
	 *      @type string $template       Template slug.
	 *      @type array  $theme_features List of theme features that need to be applied. Features are method names,
	 * }
	 */
	protected $args;

	/**
	 * Body element.
	 *
	 * @since 1.0
	 * @var DOMElement
	 */
	protected $body;

	/**
	 * XPath.
	 *
	 * @since 1.0
	 * @var DOMXPath
	 */
	protected $xpath;

	/**
	 * Config for features needed by themes.
	 *
	 * @since 1.0
	 * @var array
	 */
	protected static $theme_features = array(
		// Twenty Nineteen.
		'twentynineteen'  => array(
			'dequeue_scripts'                             => array(
				'twentynineteen-skip-link-focus-fix', // This is part of AMP. See <https://github.com/ampproject/amphtml/issues/18671>.
				'twentynineteen-priority-menu',
				'twentynineteen-touch-navigation', // @todo There could be an AMP implementation of this, similar to what is implemented on ampproject.org.
			),
			'remove_actions'                              => array(
				'wp_print_footer_scripts' => array(
					'twentynineteen_skip_link_focus_fix', // See <https://github.com/WordPress/twentynineteen/pull/47>.
				),
			),
			'add_twentynineteen_masthead_styles'          => array(),
			'add_twentynineteen_image_styles'             => array(),
			'remove_twentynineteen_thumbnail_image_sizes' => array(),

		),

		// Twenty Seventeen.
		'twentyseventeen' => array(
			// @todo Try to implement belowEntryMetaClass().
			'dequeue_scripts'                     => array(
				'twentyseventeen-html5', // Only relevant for IE<9.
				'twentyseventeen-global', // There are somethings not yet implemented in AMP. See todos below.
				'jquery-scrollto', // Implemented via add_smooth_scrolling().
				'twentyseventeen-navigation', // Handled by add_nav_menu_styles, add_nav_menu_toggle, add_nav_sub_menu_buttons.
				'twentyseventeen-skip-link-focus-fix', // Only needed by IE11 and when admin bar is present.
			),
			'remove_actions'                      => array(
				'wp_head' => array(
					'twentyseventeen_javascript_detection', // AMP is essentially no-js, with any interactively added explicitly via amp-bind.
				),
			),
			'force_svg_support'                   => array(),
			'force_fixed_background_support'      => array(),
			'add_twentyseventeen_masthead_styles' => array(),
			'add_twentyseventeen_image_styles'    => array(),
			'add_twentyseventeen_sticky_nav_menu' => array(),
			'add_has_header_video_body_class'     => array(),
			'add_nav_menu_styles'                 => array(),
			'add_nav_menu_toggle'                 => array(),
			'add_nav_sub_menu_buttons'            => array(),
			'add_smooth_scrolling'                => array(
				'//header[@id = "masthead"]//a[ contains( @class, "menu-scroll-down" ) ]',
			),
			'set_twentyseventeen_quotes_icon'     => array(),
			'add_twentyseventeen_attachment_image_attributes' => array(),
		),

		// Twenty Sixteen.
		'twentysixteen'   => array(
			// @todo Figure out an AMP solution for onResizeARIA().
			// @todo Try to implement belowEntryMetaClass().
			'dequeue_scripts'          => array(
				'twentysixteen-script',
				'twentysixteen-html5', // Only relevant for IE<9.
				'twentysixteen-keyboard-image-navigation', // AMP does not yet allow for listening to keydown events.
				'twentysixteen-skip-link-focus-fix', // Only needed by IE11 and when admin bar is present.
			),
			'remove_actions'           => array(
				'wp_head' => array(
					'twentysixteen_javascript_detection', // AMP is essentially no-js, with any interactively added explicitly via amp-bind.
				),
			),
			'add_nav_menu_styles'      => array(),
			'add_nav_menu_toggle'      => array(),
			'add_nav_sub_menu_buttons' => array(),
		),

		// Twenty Fifteen.
		'twentyfifteen'   => array(
			// @todo Figure out an AMP solution for onResizeARIA().
			'dequeue_scripts'          => array(
				'twentyfifteen-script',
				'twentyfifteen-keyboard-image-navigation', // AMP does not yet allow for listening to keydown events.
				'twentyfifteen-skip-link-focus-fix', // Only needed by IE11 and when admin bar is present.
			),
			'remove_actions'           => array(
				'wp_head' => array(
					'twentyfifteen_javascript_detection', // AMP is essentially no-js, with any interactively added explicitly via amp-bind.
				),
			),
			'add_nav_menu_styles'      => array(),
			'add_nav_menu_toggle'      => array(),
			'add_nav_sub_menu_buttons' => array(),
		),
	);

	/**
	 * Get list of supported core themes.
	 *
	 * @since 1.0
	 *
	 * @return string[] Slugs for supported themes.
	 */
	public static function get_supported_themes() {
		return array_keys( self::$theme_features );
	}

	/**
	 * Get the acceptable validation errors.
	 *
	 * @since 1.0
	 *
	 * @param string $template Template.
	 * @return array Acceptable errors.
	 */
	public static function get_acceptable_errors( $template ) {
		switch ( $template ) {
			case 'twentyfifteen':
				return array(
					'removed_unused_css_rules' => true,
					'illegal_css_at_rule'      => array(
						array(
							'at_rule'         => 'viewport',
							'node_attributes' => array(
								'id' => 'twentyfifteen-style-css',
							),
						),
						array(
							'at_rule'         => '-ms-viewport',
							'node_attributes' => array(
								'id' => 'twentyfifteen-style-css',
							),
						),
					),
				);
			case 'twentysixteen':
				return array(
					'removed_unused_css_rules' => true,
					'illegal_css_at_rule'      => array(
						array(
							'at_rule'         => 'viewport',
							'node_attributes' => array(
								'id' => 'twentysixteen-style-css',
							),
						),
						array(
							'at_rule'         => '-ms-viewport',
							'node_attributes' => array(
								'id' => 'twentysixteen-style-css',
							),
						),
					),
				);
			case 'twentyseventeen':
				return array(
					'removed_unused_css_rules' => true,
				);
		}
		return array();
	}

	/**
	 * Get theme config.
	 *
	 * @since 1.0
	 *
	 * @param string $theme Theme slug.
	 * @return array Class names.
	 */
	protected static function get_theme_config( $theme ) {
		// phpcs:disable WordPress.WP.I18n.TextDomainMismatch
		$config = array(
			'sub_menu_button_class' => 'dropdown-toggle',
		);
		switch ( $theme ) {
			case 'twentyfifteen':
				return array_merge(
					$config,
					array(
						'nav_container_id'             => 'secondary',
						'nav_container_toggle_class'   => 'toggled-on',
						'menu_button_class'            => 'secondary-toggle',
						'menu_button_xpath'            => '//header[ @id = "masthead" ]//button[ contains( @class, "secondary-toggle" ) ]',
						'menu_button_toggle_class'     => 'toggled-on',
						'sub_menu_button_toggle_class' => 'toggle-on',
						'expand_text '                 => __( 'expand child menu', 'twentyfifteen' ),
						'collapse_text'                => __( 'collapse child menu', 'twentyfifteen' ),
					)
				);

			case 'twentysixteen':
				return array_merge(
					$config,
					array(
						'nav_container_id'             => 'site-header-menu',
						'nav_container_toggle_class'   => 'toggled-on',
						'menu_button_class'            => 'menu-toggle',
						'menu_button_xpath'            => '//header[@id = "masthead"]//button[ @id = "menu-toggle" ]',
						'menu_button_toggle_class'     => 'toggled-on',
						'sub_menu_button_toggle_class' => 'toggled-on',
						'expand_text '                 => __( 'expand child menu', 'twentysixteen' ),
						'collapse_text'                => __( 'collapse child menu', 'twentysixteen' ),
					)
				);

			case 'twentyseventeen':
			default:
				return array_merge(
					$config,
					array(
						'nav_container_id'             => 'site-navigation',
						'nav_container_toggle_class'   => 'toggled-on',
						'menu_button_class'            => 'menu-toggle',
						'menu_button_xpath'            => '//nav[@id = "site-navigation"]//button[ contains( @class, "menu-toggle" ) ]',
						'menu_button_toggle_class'     => 'toggled-on',
						'sub_menu_button_toggle_class' => 'toggled-on',
						'expand_text '                 => __( 'expand child menu', 'twentyseventeen' ),
						'collapse_text'                => __( 'collapse child menu', 'twentyseventeen' ),
					)
				);
		}
		// phpcs:enable WordPress.WP.I18n.TextDomainMismatch
	}

	/**
	 * Find theme features for core theme.
	 *
	 * @since 1.0
	 *
	 * @param array $args   Args.
	 * @param bool  $static Static. that is, whether should run during output buffering.
	 * @return array Theme features.
	 */
	protected static function get_theme_features( $args, $static = false ) {
		$theme_features   = array();
		$theme_candidates = wp_array_slice_assoc( $args, array( 'stylesheet', 'template' ) );
		foreach ( $theme_candidates as $theme_candidate ) {
			if ( isset( self::$theme_features[ $theme_candidate ] ) ) {
				$theme_features = self::$theme_features[ $theme_candidate ];
				break;
			}
		}

		// Allow specific theme features to be requested even if the theme is not in core.
		if ( isset( $args['theme_features'] ) ) {
			$theme_features = array_merge( $args['theme_features'], $theme_features );
		}

		$final_theme_features = array();
		foreach ( $theme_features as $theme_feature => $feature_args ) {
			if ( ! method_exists( __CLASS__, $theme_feature ) ) {
				continue;
			}
			try {
				$reflection = new ReflectionMethod( __CLASS__, $theme_feature );
				if ( $reflection->isStatic() === $static ) {
					$final_theme_features[ $theme_feature ] = $feature_args;
				}
			} catch ( Exception $e ) {
				unset( $e );
			}
		}
		return $final_theme_features;
	}

	/**
	 * Add filters to manipulate output during output buffering before the DOM is constructed.
	 *
	 * @since 1.0
	 *
	 * @param array $args Args.
	 */
	public static function add_buffering_hooks( $args = array() ) {
		$theme_features = self::get_theme_features( $args, true );
		foreach ( $theme_features as $theme_feature => $feature_args ) {
			if ( method_exists( __CLASS__, $theme_feature ) ) {
				call_user_func( array( __CLASS__, $theme_feature ), $feature_args );
			}
		}
	}

	/**
	 * Add filter to output the quote icons in front of the article content.
	 *
	 * This is only used in Twenty Seventeen.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/f4580c122b7d0d2d66d22f806c6fe6e11023c6f0/src/wp-content/themes/twentyseventeen/assets/js/global.js#L105-L108
	 */
	public static function set_twentyseventeen_quotes_icon() {
		add_filter( 'the_content', function ( $content ) {

			// Why isn't Twenty Seventeen doing this to begin with? Why is it using JS to add the quote icon?
			if ( function_exists( 'twentyseventeen_get_svg' ) && 'quote' === get_post_format() ) {
				$icon    = twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) );
				$content = preg_replace( '#(<blockquote.*?>)#s', '$1' . $icon, $content );
			}

			return $content;
		} );
	}

	/**
	 * Remove the sizes attribute from thumbnail images in Twenty Nineteen.
	 *
	 * The AMP runtime sets an inline style on an <amp-img> based on the sizes attribute if it's present.
	 * For example, <amp-img style="width:calc(50vw)">.
	 * Removing the 'sizes' attribute isn't ideal, but it looks like it's not possible to override that inline style.
	 *
	 * @todo: remove when this is resolved: https://github.com/ampproject/amphtml/issues/17053
	 * @since 1.0
	 */
	public static function remove_twentynineteen_thumbnail_image_sizes() {
		add_filter( 'wp_get_attachment_image_attributes', function( $attr ) {
			if ( isset( $attr['class'] ) && false !== strpos( $attr['class'], 'attachment-post-thumbnail' ) ) {
				unset( $attr['sizes'] );
			}

			return $attr;
		}, 11 );
	}

	/**
	 * Add filter to adjust the attachment image attributes to ensure attachment pages have a consistent <amp-img> rendering.
	 *
	 * This is only used in Twenty Seventeen.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/ddc8f803c6e99118998191fd2ea24124feb53659/src/wp-content/themes/twentyseventeen/functions.php#L545:L554
	 */
	public static function add_twentyseventeen_attachment_image_attributes() {
		add_filter( 'wp_get_attachment_image_attributes', function ( $attr, $attachment, $size ) {
			if (
				isset( $attr['class'] )
				&&
				(
					'custom-logo' === $attr['class']
					||
					false !== strpos( $attr['class'], 'attachment-twentyseventeen-featured-image' )
				)
			) {
				/*
				 * The AMP runtime sets an inline style on an <amp-img> based on the sizes attribute if it's present.
				 * For example, <amp-img style="width:100%">.
				 * Removing the 'sizes' attribute is only a workaround, as it looks like it's not possible to override that inline style.
				 *
				 * @todo: remove when this is resolved: https://github.com/ampproject/amphtml/issues/17053
				 */
				unset( $attr['sizes'] );
			} elseif ( is_attachment() ) {
				$sizes = wp_get_attachment_image_sizes( $attachment->ID, $size );
				if ( false !== $sizes ) {
					$attr['sizes'] = $sizes;
				}
			}
			return $attr;
		}, 11, 3 );

		/*
		 * The max-height of the `.custom-logo-link img` is defined as being 80px, unless
		 * there is header media in which case it is 200px. Issues related to vertically-squashed
		 * images can be avoided if we just make sure that the image has this height to begin with.
		 */
		add_filter( 'get_custom_logo', function( $html ) {
			$src = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			if ( ! $src ) {
				return $html;
			}

			if ( 'blank' === get_header_textcolor() && has_custom_header() ) {
				$height = 200;
			} else {
				$height = 80;
			}
			$width = $height * ( $src[1] / $src[2] ); // Note that float values are allowed.

			$html = preg_replace( '/(?<=width=")\d+(?=")/', $width, $html );
			$html = preg_replace( '/(?<=height=")\d+(?=")/', $height, $html );
			return $html;
		} );
	}

	/**
	 * Fix up core themes to do things in the AMP way.
	 *
	 * @since 1.0
	 */
	public function sanitize() {
		$this->body = $this->dom->getElementsByTagName( 'body' )->item( 0 );
		if ( ! $this->body ) {
			return;
		}

		$this->xpath = new DOMXPath( $this->dom );

		$theme_features = self::get_theme_features( $this->args, false );
		foreach ( $theme_features as $theme_feature => $feature_args ) {
			if ( method_exists( $this, $theme_feature ) ) {
				call_user_func( array( $this, $theme_feature ), $feature_args );
			}
		}
	}

	/**
	 * Dequeue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string[] $handles Handles, where each item value is the script handle.
	 */
	public static function dequeue_scripts( $handles = array() ) {
		add_action( 'wp_enqueue_scripts', function() use ( $handles ) {
			foreach ( $handles as $handle ) {
				wp_dequeue_script( $handle );
			}
		}, PHP_INT_MAX );
	}

	/**
	 * Remove actions.
	 *
	 * @since 1.0
	 *
	 * @param array $actions Actions, with action name as key and value being callback.
	 */
	public static function remove_actions( $actions = array() ) {
		foreach ( $actions as $action => $callbacks ) {
			foreach ( $callbacks as $callback ) {
				$priority = has_action( $action, $callback );
				if ( false !== $priority ) {
					remove_action( $action, $callback, $priority );
				}
			}
		}
	}

	/**
	 * Add smooth scrolling from link to target element.
	 *
	 * @since 1.0
	 *
	 * @param string[] $link_xpaths XPath queries to the links that should smooth scroll.
	 */
	public function add_smooth_scrolling( $link_xpaths ) {
		foreach ( $link_xpaths as $link_xpath ) {
			foreach ( $this->xpath->query( $link_xpath ) as $link ) {
				if ( $link instanceof DOMElement && preg_match( '/#(.+)/', $link->getAttribute( 'href' ), $matches ) ) {
					$link->setAttribute( 'on', sprintf( 'tap:%s.scrollTo(duration=600)', $matches[1] ) );
				}
			}
		}
	}

	/**
	 * Force SVG support, replacing no-svg class name with svg class name.
	 *
	 * @since 1.0
	 *
	 * @link https://github.com/WordPress/wordpress-develop/blob/1af1f65a21a1a697fb5f33027497f9e5ae638453/src/wp-content/themes/twentyseventeen/assets/js/global.js#L211-L213
	 * @link https://caniuse.com/#feat=svg
	 */
	public function force_svg_support() {
		$this->dom->documentElement->setAttribute(
			'class',
			preg_replace(
				'/(^|\s)no-svg(\s|$)/',
				' svg ',
				$this->dom->documentElement->getAttribute( 'class' )
			)
		);
	}

	/**
	 * Force support for fixed background-attachment.
	 *
	 * @since 1.0
	 *
	 * @link https://github.com/WordPress/wordpress-develop/blob/1af1f65a21a1a697fb5f33027497f9e5ae638453/src/wp-content/themes/twentyseventeen/assets/js/global.js#L215-L217
	 * @link https://caniuse.com/#feat=background-attachment
	 */
	public function force_fixed_background_support() {
		$this->dom->documentElement->setAttribute(
			'class',
			$this->dom->documentElement->getAttribute( 'class' ) . ' background-fixed'
		);
	}

	/**
	 * Add body class when there is a header video.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/a26c24226c6b131a0ed22c722a836c100d3ba254/src/wp-content/themes/twentyseventeen/assets/js/global.js#L244-L247
	 *
	 * @param array $args Args.
	 */
	public static function add_has_header_video_body_class( $args = array() ) {
		$args = array_merge(
			array(
				'class_name' => 'has-header-video',
			),
			$args
		);

		add_filter( 'body_class', function( $body_classes ) use ( $args ) {
			if ( has_header_video() ) {
				$body_classes[] = $args['class_name'];
			}
			return $body_classes;
		} );
	}

	/**
	 * Get the (common) navigation outer height.
	 *
	 * @todo If the nav menu has many items and it spans multiple rows, this will be too small.
	 * @link https://github.com/WordPress/wordpress-develop/blob/fd5ba80c5c3d9cf62348567073945e246285fbca/src/wp-content/themes/twentyseventeen/assets/js/global.js#L50
	 *
	 * @return int Navigation outer height.
	 */
	protected static function get_twentyseventeen_navigation_outer_height() {
		return 72;
	}

	/**
	 * Add required styles for featured image header in Twenty Nineteen.
	 *
	 * The following is necessary because the styles in the theme apply to the featured img,
	 * and the CSS parser will then convert the selectors to amp-img. Nevertheless, object-fit
	 * does not apply on amp-img and it needs to apply on an actual img.
	 *
	 * @link https://github.com/WordPress/wordpress-develop/blob/5.0/src/wp-content/themes/twentynineteen/style.css#L2276-L2299
	 * @since 1.0
	 */
	public static function add_twentynineteen_masthead_styles() {
		add_action( 'wp_enqueue_scripts', function() {
			ob_start();
			?>
			<style>
			.site-header.featured-image .site-featured-image .post-thumbnail amp-img > img {
				height: auto;
				left: 50%;
				max-width: 1000%;
				min-height: 100%;
				min-width: 100vw;
				position: absolute;
				top: 50%;
				transform: translateX(-50%) translateY(-50%);
				width: auto;
				z-index: 1;
				/* When image filters are active, make it grayscale to colorize it blue. */
			}

			@supports (object-fit: cover) {
				.site-header.featured-image .site-featured-image .post-thumbnail amp-img > img {
					height: 100%;
					left: 0;
					object-fit: cover;
					top: 0;
					transform: none;
					width: 100%;
				}
			}
			</style>
			<?php
			$styles = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
			wp_add_inline_style( get_template() . '-style', $styles );
		}, 11 );
	}

	/**
	 * Add required styles for video and image headers.
	 *
	 * This is currently used exclusively for Twenty Seventeen.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/1af1f65a21a1a697fb5f33027497f9e5ae638453/src/wp-content/themes/twentyseventeen/style.css#L1687
	 * @link https://github.com/WordPress/wordpress-develop/blob/1af1f65a21a1a697fb5f33027497f9e5ae638453/src/wp-content/themes/twentyseventeen/style.css#L1743
	 */
	public static function add_twentyseventeen_masthead_styles() {
		$args = self::get_theme_config( get_template() );

		/*
		 * The following is necessary because the styles in the theme apply to img and video,
		 * and the CSS parser will then convert the selectors to amp-img and amp-video respectively.
		 * Nevertheless, object-fit does not apply on amp-img and it needs to apply on an actual img.
		 */
		add_action( 'wp_enqueue_scripts', function() use ( $args ) {
			$is_front_page_layout = ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) || ( is_home() && is_front_page() );
			ob_start();
			?>
			<style>
				.has-header-image .custom-header-media amp-img > img,
				.has-header-video .custom-header-media amp-video > video{
					position: fixed;
					height: auto;
					left: 50%;
					max-width: 1000%;
					min-height: 100%;
					min-width: 100%;
					min-width: 100vw; /* vw prevents 1px gap on left that 100% has */
					width: auto;
					top: 50%;
					padding-bottom: 1px; /* Prevent header from extending beyond the footer */
					-ms-transform: translateX(-50%) translateY(-50%);
					-moz-transform: translateX(-50%) translateY(-50%);
					-webkit-transform: translateX(-50%) translateY(-50%);
					transform: translateX(-50%) translateY(-50%);
				}
				.has-header-image:not(.twentyseventeen-front-page):not(.home) .custom-header-media amp-img > img {
					bottom: 0;
					position: absolute;
					top: auto;
					-ms-transform: translateX(-50%) translateY(0);
					-moz-transform: translateX(-50%) translateY(0);
					-webkit-transform: translateX(-50%) translateY(0);
					transform: translateX(-50%) translateY(0);
				}
				/* For browsers that support object-fit */
				@supports ( object-fit: cover ) {
					.has-header-image .custom-header-media amp-img > img,
					.has-header-video .custom-header-media amp-video > video,
					.has-header-image:not(.twentyseventeen-front-page):not(.home) .custom-header-media amp-img > img {
						height: 100%;
						left: 0;
						-o-object-fit: cover;
						object-fit: cover;
						top: 0;
						-ms-transform: none;
						-moz-transform: none;
						-webkit-transform: none;
						transform: none;
						width: 100%;
					}
				}

				.navigation-top.site-navigation-fixed {
					display: none;
				}

				<?php if ( $is_front_page_layout && ! has_custom_header() ) : ?>
					/* https://github.com/WordPress/wordpress-develop/blob/fd5ba80c5c3d9cf62348567073945e246285fbca/src/wp-content/themes/twentyseventeen/assets/js/global.js#L92-L94 */
					.site-branding {
						margin-bottom: <?php echo (int) AMP_Core_Theme_Sanitizer::get_twentyseventeen_navigation_outer_height(); ?>px;
					}
				<?php endif; ?>

				@media screen and (min-width: 48em) {
					/* Note that adjustHeaderHeight() is irrelevant with this change */
					<?php if ( ! $is_front_page_layout ) : ?>
						.navigation-top {
							position: static;
						}
					<?php endif; ?>

					/* Initial styles that amp-animations for navigationTopShow and navigationTopHide will override */
					.navigation-top.site-navigation-fixed {
						opacity: 0;
						transform: translateY( -<?php echo (int) AMP_Core_Theme_Sanitizer::get_twentyseventeen_navigation_outer_height(); ?>px );
						display: block;
					}
				}
			</style>
			<?php
			$styles = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
			wp_add_inline_style( get_template() . '-style', $styles );
		}, 11 );
	}

	/**
	 * Override the featured image header styling in style.css.
	 * Used only for Twenty Seventeen.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/1af1f65a21a1a697fb5f33027497f9e5ae638453/src/wp-content/themes/twentyseventeen/style.css#L2100
	 */
	public static function add_twentyseventeen_image_styles() {
		add_action( 'wp_enqueue_scripts', function() {
			ob_start();
			?>
			<style>
				/* Override the display: block in twentyseventeen/style.css, as <amp-img> is usually inline-block. */
				.single-featured-image-header amp-img {
					display: inline-block;
				}

				/* Because the <amp-img> is inline-block, its container needs this rule to center it. */
				.single-featured-image-header {
					text-align: center;
				}
			</style>
			<?php
			$styles = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
			wp_add_inline_style( get_template() . '-style', $styles );
		}, 11 );
	}

	/**
	 * Add sticky nav menu to Twenty Seventeen.
	 *
	 * This is implemented by cloning the navigation-top element, giving it a fixed position outside of the viewport,
	 * and then showing it at the top of the window as soon as the original nav begins to get scrolled out of view.
	 * In order to improve accessibility, the cloned nav gets aria-hidden=true and all of the links get tabindex=-1
	 * to prevent the keyboard from focusing on elements off the screen; it is not necessary to focus on the elements
	 * in the fixed nav menu because as soon as the original nav menu is focused then the window is scrolled to the
	 * top anyway.
	 *
	 * @since 1.0
	 */
	public function add_twentyseventeen_sticky_nav_menu() {
		/**
		 * Elements.
		 *
		 * @var DOMElement $link
		 * @var DOMElement $navigation_top
		 * @var DOMElement $navigation_top_fixed
		 */
		$navigation_top = $this->xpath->query( '//header[ @id = "masthead" ]//div[ contains( @class, "navigation-top" ) ]' )->item( 0 );
		if ( ! $navigation_top ) {
			return;
		}

		$navigation_top_fixed = $navigation_top->cloneNode( true );
		$navigation_top_fixed->setAttribute( 'class', $navigation_top_fixed->getAttribute( 'class' ) . ' site-navigation-fixed' );

		$navigation_top_fixed->setAttribute( 'aria-hidden', 'true' );
		foreach ( $navigation_top_fixed->getElementsByTagName( 'a' ) as $link ) {
			$link->setAttribute( 'tabindex', '-1' );
		}

		$navigation_top->parentNode->insertBefore( $navigation_top_fixed, $navigation_top->nextSibling );

		$attributes = array(
			'layout'              => 'nodisplay',
			'intersection-ratios' => 1,
			'on'                  => implode( ';', array(
				'exit:navigationTopShow.start',
				'enter:navigationTopHide.start',
			) ),
		);
		if ( is_admin_bar_showing() ) {
			$attributes['viewport-margins'] = '32px 0';
		}
		$position_observer = AMP_DOM_Utils::create_node( $this->dom, 'amp-position-observer', $attributes );
		$navigation_top->appendChild( $position_observer );

		$animations = array(
			'navigationTopShow' => array(
				'duration'   => 0,
				'fill'       => 'both',
				'animations' => array(
					'selector'  => '.navigation-top.site-navigation-fixed',
					'media'     => '(min-width: 48em)',
					'keyframes' => array(
						'opacity'   => 1.0,
						'transform' => 'translateY( 0 )',
					),
				),
			),
			'navigationTopHide' => array(
				'duration'   => 0,
				'fill'       => 'both',
				'animations' => array(
					'selector'  => '.navigation-top.site-navigation-fixed',
					'media'     => '(min-width: 48em)',
					'keyframes' => array(
						'opacity'   => 0.0,
						'transform' => sprintf( 'translateY( -%dpx )', self::get_twentyseventeen_navigation_outer_height() ),
					),
				),
			),
		);

		foreach ( $animations as $animation_id => $animation ) {
			$amp_animation   = AMP_DOM_Utils::create_node( $this->dom, 'amp-animation', array(
				'id'     => $animation_id,
				'layout' => 'nodisplay',
			) );
			$position_script = $this->dom->createElement( 'script' );
			$position_script->setAttribute( 'type', 'application/json' );
			$position_script->appendChild( $this->dom->createTextNode( wp_json_encode( $animation ) ) );
			$amp_animation->appendChild( $position_script );
			$this->body->appendChild( $amp_animation );
		}
	}

	/**
	 * Add styles for the nav menu specifically to deal with AMP running in a no-js context.
	 *
	 * @since 1.0
	 *
	 * @param array $args Args.
	 */
	public static function add_nav_menu_styles( $args = array() ) {
		$args = array_merge(
			self::get_theme_config( get_template() ),
			$args
		);

		add_action( 'wp_enqueue_scripts', function() use ( $args ) {
			ob_start();
			?>
			<style>
				/* Override no-js selector in parent theme. */
				.no-js .main-navigation ul ul {
					display: none;
				}

				/* Use sibling selector and re-use class on button instead of toggling toggle-on class on ul.sub-menu */
				.main-navigation ul .<?php echo esc_html( $args['sub_menu_button_toggle_class'] ); ?> + .sub-menu {
					display: block;
				}

				<?php if ( 'twentyseventeen' === get_template() ) : ?>
					/* Show the button*/
					.no-js .<?php echo esc_html( $args['menu_button_class'] ); ?> {
						display: block;
					}
					.no-js .main-navigation > div > ul {
						display: none;
					}
					.no-js .main-navigation.<?php echo esc_html( $args['nav_container_toggle_class'] ); ?> > div > ul {
						display: block;
					}
					@media screen and (min-width: 48em) {
						.no-js .<?php echo esc_html( $args['menu_button_class'] ); ?>,
						.no-js .<?php echo esc_html( $args['sub_menu_button_class'] ); ?> {
							display: none;
						}
						.no-js .main-navigation ul,
						.no-js .main-navigation ul ul,
						.no-js .main-navigation > div > ul {
							display: block;
						}
						.main-navigation ul li.menu-item-has-children:focus-within:before,
						.main-navigation ul li.menu-item-has-children:focus-within:after,
						.main-navigation ul li.page_item_has_children:focus-within:before,
						.main-navigation ul li.page_item_has_children:focus-within:after {
							display: block;
						}
						.main-navigation ul ul li:focus-within > ul {
							<?php if ( is_rtl() ) : ?>
								left: auto;
								right: 100%;
							<?php else : ?>
								left: 100%;
								right: auto;
							<?php endif; ?>
						}
						.main-navigation li li:focus-within {
							background: #767676;
						}
						.main-navigation li li:focus-within > a,
						.main-navigation li li a:focus-within,
						.main-navigation li li.current_page_item a:focus-within,
						.main-navigation li li.current-menu-item a:focus-within {
							color: #fff;
						}
						.main-navigation ul li:focus-within > ul {
							<?php if ( is_rtl() ) : ?>
								left: auto;
								right: 0.5em;
							<?php else : ?>
								left: 0.5em;
								right: auto;
							<?php endif; ?>
						}

						.main-navigation ul ul li.menu-item-has-children:focus-within:before,
						.main-navigation ul ul li.menu-item-has-children:focus-within:after,
						.main-navigation ul ul li.page_item_has_children:focus-within:before,
						.main-navigation ul ul li.page_item_has_children:focus-within:after {
							display: none;
						}
					}
				<?php elseif ( 'twentysixteen' === get_template() ) : ?>
					@media screen and (max-width: 56.875em) {
						/* Show the button*/
						.no-js .<?php echo esc_html( $args['menu_button_class'] ); ?> {
							display: block;
						}
						.no-js .site-header-menu {
							display: none;
						}
						.no-js .site-header-menu.toggled-on {
							display: block;
						}
					}
					@media screen and (min-width: 56.875em) {
						.no-js .main-navigation ul ul {
							display: block;
						}
						.main-navigation li:focus-within > a {
							color: #007acc;
						}
						.main-navigation li:focus-within > ul {
							<?php if ( is_rtl() ) : ?>
								left: auto;
								right: 0;
							<?php else : ?>
								left: 0;
								right: auto;
							<?php endif; ?>
						}
						.main-navigation ul ul li:focus-within > ul {
							<?php if ( is_rtl() ) : ?>
								left: 100%;
								right: auto;
							<?php else : ?>
								left: auto;
								right: 100%;
							<?php endif; ?>
						}
					}
				<?php elseif ( 'twentyfifteen' === get_template() ) : ?>
					@media screen and (min-width: 59.6875em) {
						/* Attempt to emulate https://github.com/WordPress/wordpress-develop/blob/5e9a39baa7d4368f7d3c36dcbcd53db6317677c9/src/wp-content/themes/twentyfifteen/js/functions.js#L108-L149 */
						#sidebar {
							position: sticky;
							top: -9vh;
							max-height: 109vh;
							overflow-y: auto;
						}
					}

				<?php endif; ?>
			</style>
			<?php
			$styles = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
			wp_add_inline_style( get_template() . '-style', $styles );
		}, 11 );
	}

	/**
	 * Ensure that JS-only nav menu styles apply to AMP as well since even though scripts are not allowed, there are AMP-bind implementations.
	 *
	 * @since 1.0
	 *
	 * @param array $args Args.
	 */
	public function add_nav_menu_toggle( $args = array() ) {
		$args = array_merge(
			self::get_theme_config( get_template() ),
			$args
		);

		$nav_el    = $this->dom->getElementById( $args['nav_container_id'] );
		$button_el = $this->xpath->query( $args['menu_button_xpath'] )->item( 0 );
		if ( ! $nav_el ) {
			if ( $button_el ) {

				// Remove the button since it won't be used.
				$button_el->parentNode->removeChild( $button_el );
			}
			return;
		}

		if ( ! $button_el ) {
			return;
		}

		$state_id = 'navMenuToggledOn';
		$expanded = false;

		$nav_el->setAttribute(
			AMP_DOM_Utils::get_amp_bind_placeholder_prefix() . 'class',
			sprintf(
				"%s + ( $state_id ? %s : '' )",
				wp_json_encode( $nav_el->getAttribute( 'class' ) ),
				wp_json_encode( ' ' . $args['nav_container_toggle_class'] )
			)
		);

		$state_el = $this->dom->createElement( 'amp-state' );
		$state_el->setAttribute( 'id', $state_id );
		$script_el = $this->dom->createElement( 'script' );
		$script_el->setAttribute( 'type', 'application/json' );
		$script_el->appendChild( $this->dom->createTextNode( wp_json_encode( $expanded ) ) );
		$state_el->appendChild( $script_el );
		$nav_el->parentNode->insertBefore( $state_el, $nav_el );

		$button_on = sprintf( "tap:AMP.setState({ $state_id: ! $state_id })" );
		$button_el->setAttribute( 'on', $button_on );
		$button_el->setAttribute( 'aria-expanded', 'false' );
		$button_el->setAttribute( AMP_DOM_Utils::get_amp_bind_placeholder_prefix() . 'aria-expanded', "$state_id ? 'true' : 'false'" );
		$button_el->setAttribute(
			AMP_DOM_Utils::get_amp_bind_placeholder_prefix() . 'class',
			sprintf( "%s + ( $state_id ? %s : '' )", wp_json_encode( $button_el->getAttribute( 'class' ) ), wp_json_encode( ' ' . $args['menu_button_toggle_class'] ) )
		);
	}

	/**
	 * Add buttons for nav sub-menu items.
	 *
	 * @since 1.0
	 * @link https://github.com/WordPress/wordpress-develop/blob/a26c24226c6b131a0ed22c722a836c100d3ba254/src/wp-content/themes/twentyseventeen/assets/js/navigation.js#L11-L43
	 *
	 * @param array $args Args.
	 */
	public static function add_nav_sub_menu_buttons( $args = array() ) {
		$default_args = self::get_theme_config( get_template() );
		switch ( get_template() ) {
			case 'twentyseventeen':
				if ( function_exists( 'twentyseventeen_get_svg' ) ) {
					$default_args['icon'] = twentyseventeen_get_svg( array(
						'icon'     => 'angle-down',
						'fallback' => true,
					) );
				}
				break;
		}
		$args = array_merge( $default_args, $args );

		/**
		 * Filter the HTML output of a nav menu item to add the AMP dropdown button to reveal the sub-menu.
		 *
		 * @see twentyfifteen_amp_setup_hooks()
		 *
		 * @param string $item_output Nav menu item HTML.
		 * @param object $item        Nav menu item.
		 * @return string Modified nav menu item HTML.
		 */
		add_filter( 'walker_nav_menu_start_el', function( $item_output, $item, $depth, $nav_menu_args ) use ( $args ) {
			unset( $depth );

			// Skip adding buttons to nav menu widgets for now.
			if ( empty( $nav_menu_args->theme_location ) ) {
				return $item_output;
			}

			if ( ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
				return $item_output;
			}
			static $nav_menu_item_number = 0;
			$nav_menu_item_number++;

			$expanded = in_array( 'current-menu-ancestor', $item->classes, true );

			$expanded_state_id = 'navMenuItemExpanded' . $nav_menu_item_number;

			// Create new state for managing storing the whether the sub-menu is expanded.
			$item_output .= sprintf(
				'<amp-state id="%s"><script type="application/json">%s</script></amp-state>',
				esc_attr( $expanded_state_id ),
				wp_json_encode( $expanded )
			);

			$dropdown_button  = '<button';
			$dropdown_button .= sprintf(
				' class="%s" [class]="%s"',
				esc_attr( $args['sub_menu_button_class'] . ( $expanded ? ' ' . $args['sub_menu_button_toggle_class'] : '' ) ),
				esc_attr( sprintf( "%s + ( $expanded_state_id ? %s : '' )", wp_json_encode( $args['sub_menu_button_class'] ), wp_json_encode( ' ' . $args['sub_menu_button_toggle_class'] ) ) )
			);
			$dropdown_button .= sprintf(
				' aria-expanded="%s" [aria-expanded]="%s"',
				esc_attr( wp_json_encode( $expanded ) ),
				esc_attr( "$expanded_state_id ? 'true' : 'false'" )
			);
			$dropdown_button .= sprintf(
				' on="%s"',
				esc_attr( "tap:AMP.setState( { $expanded_state_id: ! $expanded_state_id } )" )
			);
			$dropdown_button .= '>';

			if ( isset( $args['icon'] ) ) {
				$dropdown_button .= $args['icon'];
			}
			if ( isset( $args['expand_text'] ) && isset( $args['collapse_text'] ) ) {
				$dropdown_button .= sprintf(
					'<span class="screen-reader-text" [text]="%s">%s</span>',
					esc_attr( sprintf( "$expanded_state_id ? %s : %s", wp_json_encode( $args['collapse_text'] ), wp_json_encode( $args['expand_text'] ) ) ),
					esc_html( $expanded ? $args['collapse_text'] : $args['expand_text'] )
				);
			}

			$dropdown_button .= '</button>';

			$item_output .= $dropdown_button;
			return $item_output;
		}, 10, 4 );
	}

	/**
	 * Output image styles for twentynineteen.
	 *
	 * When <img> tags have an 'aligncenter' class, AMP_Img_Sanitizer::handle_centering() wraps theme in <figure class="aligncenter">.
	 * This ensures that the image inside it is centered.
	 *
	 * @since 1.0
	 *
	 * @param array $args Arguments.
	 */
	public static function add_twentynineteen_image_styles( $args = array() ) {
		add_action( 'wp_enqueue_scripts', function() use ( $args ) {
			ob_start();
			?>
			<style>
				figure.aligncenter {
					text-align: center
				}
			</style>
			<?php
			$styles = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
			wp_add_inline_style( get_template() . '-style', $styles );
		}, 11 );
	}
}
