<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boardwalk
 */

get_header(); ?>
<style>
	.navbar {
		margin-bottom: 38px;
	}
</style>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php
				$cat = get_the_category();
				$query = null;
				// Reset Post Data
				wp_reset_postdata();
				/** DIRECT TO DETAIL-PAGE **/
				if ( get_the_ID() == 114) {
					header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2016/06/15/credo/');
				}
				/** RANDOM  FOR REFERENCES **/
				if (get_the_ID() == 1472) {
					$query = new WP_Query( array (
						'orderby' => 'rand',
						'posts_per_page' => '1000',
						'p' => 1472
					));
					the_post();
					get_template_part( 'content', get_post_format() );
					wp_reset_postdata();
					$query = new WP_Query( array (
						'orderby' => 'rand',
						'posts_per_page' => '1000',
						'post__in' => array( 1062,1060,1045,1041,1037,1034,1030,905,902,899 )
					));
					while ( $query->have_posts() ) : $query->the_post();
						the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
					wp_reset_postdata();
				} else {
					/** ORDER BY DATE FILO **/
					$query = new WP_Query( array (
						'category_name' => $cat[0]->slug
					));
					while ( $query->have_posts() ) : $query->the_post();
						the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
					wp_reset_postdata();
				}
				?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php //get_sidebar(); ?>
<?php get_footer('nc'); ?>


