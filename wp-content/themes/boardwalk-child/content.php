<?php
/**
 * @package Boardwalk
 */

$featured_image = get_the_post_thumbnail( get_the_ID(), 'boardwalk-featured-image img-responsive' );
?>
	<?php
	switch (get_the_ID()) {
		case 1485:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1045:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1041:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1037:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1030:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1034:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 801:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 819:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 799:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 797:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 795:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 793:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 791:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 789:
			echo ''?><article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;

		case 1217:
			echo ''?><article style="cursor: pointer;" onclick="ncDropBox()" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
			<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1220:
			echo ''?><article style="cursor: pointer;" onclick="ncDropBox()" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-thumbnail">
				<?php echo $featured_image ?>
			</div></article><?php
			break;
		case 1483:
			if (!is_front_page()) {
				echo ''?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-thumbnail">
					<?php echo $featured_image ?>
				</div></article><?php
				break;
			} else {
				echo ''?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( $featured_image ) : ?>
					<div class="entry-thumbnail">
						<?php echo $featured_image; ?>
					</div><!-- .entry-thumbnail -->
				<?php endif; ?>
				<a href="<?php echo esc_url( boardwalk_get_link_url() ); ?>" class="entry-link"><span class="screen-reader-text"><?php _e( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boardwalk' ); ?></span></a>
				</article>
				<?php
				break;
			}
		default:
			echo ''?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( $featured_image ) : ?>
			<div class="entry-thumbnail">
				<?php echo $featured_image; ?>
			</div><!-- .entry-thumbnail -->
		<?php endif; ?>
			<a href="<?php echo esc_url( boardwalk_get_link_url() ); ?>" class="entry-link"><span class="screen-reader-text"><?php _e( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boardwalk' ); ?></span></a>
			</article>
		<?php
		}
