<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 */

get_header(); ?>

	<div id="primary" class="content-area clear">
				
		<main id="main" class="site-main clear">

			<div class="breadcrumbs clear">
				<h1>
					<?php
						global $wp_version;

						if ( $wp_version >= 4.1 ) {
							echo get_the_archive_title('');
						} else {
							echo "Archives";
						}
					?>					
				</h1>	
			</div><!-- .breadcrumbs -->
		
			<div id="recent-content" class="content-list">

				<?php

				if ( have_posts() ) :	
									
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'list');

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

