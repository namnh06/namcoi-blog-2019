<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" >
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fu-1x-b-f4+16u"
     data-ad-client="ca-pub-2040865810414258"
     data-ad-slot="2280073439"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-9d+ch+k5-y5-5o"
     data-ad-client="ca-pub-2040865810414258"
     data-ad-slot="3490757915"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>