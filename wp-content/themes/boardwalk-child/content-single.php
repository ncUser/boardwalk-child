<?php
/**
 * @package Boardwalk
 */
if (get_the_ID() == 1483) {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/category/uber-uns/');
}
if (get_the_ID() == 1485) {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2016/06/15/credo/');
}
/** HOTELPLAN, HYUNDAI, RENAULT, POST, KWC*/
if (get_the_ID() == 1045 || get_the_ID() == 1041 || get_the_ID() == 1037 || get_the_ID() == 1034 || get_the_ID() == 1030 ) {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/category/ausgewahlte-referenzen/');
}
$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );

if ( ! $next && ! $previous ) {
	return;
}
?>
	<style>
		.TitleID-114, .post-1054 h1, .post-1048 h1, .post-1050 h1, .post-902 h1 {
			display: none !important;
		}
		.post-1054 .singleTitle, .post-1048 .singleTitle, .post-1050 .singleTitle, .post-902 .singleTitle {
			font-family: Effra-Bold !important;
			font-style: normal;
			font-weight: normal;
			text-transform: uppercase;
			font-size: 38px;
			line-height: 36px;
		}
		.blog {
			display: none;
		}
		.navbar {
			margin-bottom: 38px;;
		}
	</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ! has_post_format( 'video' ) ) : ?>
		<div class="entry-thumbnail maxHeightImg">
			<?php /** REPLACE CUBIC IMG WITH HORIZONTAL IMG **/
			echo strtolower(str_replace('620_620', '1920_620', get_the_post_thumbnail( get_the_ID(), 'gogo img-responsive' )));
			?>
		</div><!-- .entry-thumbnail -->
	<?php endif; ?>
	<?php boardwalk_post_nav(); ?>

	<div class="entry-content">
		<?php
		the_title( '<h1 class="TitleID-' . get_the_ID() . ' entrySingleTitle">', '</h1>' );
		the_content();
		?>
	</div>
</article><!-- #post-## -->