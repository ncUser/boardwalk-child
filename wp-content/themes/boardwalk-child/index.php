<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boardwalk
 */

//get_header(); ?>
<?php get_header(); ?>
	<style>
		.entry-title, .entry-header {
			display: none;
		}
		@media(min-width:992px){
			#main {
				margin-top: 43px;
			}
			.has-sidebar .site-header {
				padding-bottom: 13px;
			}
		}
	</style>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			/** CONTENT-SINGLE CREDO **/
			if ( get_the_ID() == 114) {
				header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2016/04/14/credo/');
			}
			/** GET THE TEXT TOP LEFT */
			$query = new WP_Query( array (
				'p' => '1485'
			));
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part('content', get_post_format());
			endwhile;
//					get_template_part('content', 'thumbnail');
			wp_reset_postdata();
			/** GET THE TOP CLASS CATS*/
			$query = new WP_Query( array (
				'orderby' => 'rand',
				'posts_per_page' => '1000',
				'post__in' => array( 1222,114,1054,1086,1091,1102,1048,1050,1052,910,1483,1472 )
			));
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part('content', get_post_format());
			endwhile;
			wp_reset_postdata();
			/** GET THE CUSTOM POSTS */
			$query = new WP_Query( array (
				'orderby' => 'rand',
				'posts_per_page' => '1000',
				'post__in' => array( 1062,1060,1045,1041,1037,1034,1030,910,905,902,899,260,258,256,254,252,250,248,246,272,270,268,266,343,282,276,274 )
			));
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part('content', get_post_format());
			endwhile;
			wp_reset_postdata();
			?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer('nc'); ?>
