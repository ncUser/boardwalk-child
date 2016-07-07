<?php
/**
 * Cubic functions and definitions
 *
 * @package Cubic
 */
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cubic_setup() {

	/*
	 * Declare textdomain for this child theme.
	 */
	load_child_theme_textdomain( 'cubic', get_stylesheet_directory() . '/languages' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_image_size( 'boardwalk-featured-image', 980, 980, true );

}
add_action( 'after_setup_theme', 'cubic_setup', 11 );


function isola_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
}
/**
 * Register Montserrat font.
 *
 * @return string
 */
function cubic_montserrat_font_url() {
	$montserrat_font_url = 'off';

	/* translators: If there are characters in your language that are not supported
	 * by Montserrat, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'cubic' ) ) {
		$query_args = array(
			'family' => urlencode( '"GothamBold",Arial,Helvetica,sans-serif' ),
		);

		$montserrat_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/boardwalk-child/font/MyFontsWebfontsKit.css';
}

/**
 * Register Playfair Display font.
 *
 * @return string
 */
function cubic_playfair_display_font_url() {
	$playfair_display_font_url = 'off';

	/* translators: If there are characters in your language that are not supported
	 * by Playfair Display, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'cubic' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Playfair Display character subset specific to your language, translate this to 'cyrillic'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Playfair Display font: add new subset (cyrillic)', 'cubic' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic-ext,cyrillic';
		}

		$query_args = array(
			'family' => urlencode( 'Playfair Display:400,700,400italic,700italic' ),
			'subset' => urlencode( $subsets ),
		);

		$playfair_display_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $playfair_display_font_url;
}

/**
 * Enqueue scripts and styles.
 */
function cubic_scripts() {
	/* Dequeue*/
	wp_dequeue_style( 'boardwalk-lato-merriweather' );

	wp_dequeue_style( 'boardwalk-style' );

	if ( ( is_search() && have_posts() ) || is_archive() || is_home() ) {
		wp_dequeue_script( 'boardwalk-mousewheel' );
	}

	wp_dequeue_script( 'boardwalk-script' );

	/* Enqueue */
	wp_enqueue_style( 'cubic-montserrat', cubic_montserrat_font_url(), array(), null );

	wp_enqueue_style( 'cubic-playfair-display', cubic_playfair_display_font_url(), array(), null );

	wp_enqueue_style( 'cubic-parent-style', get_template_directory_uri() . '/style.css' );

	if ( is_rtl() ) {
		wp_enqueue_style( 'cubic-parent-style-rtl', get_template_directory_uri() . '/rtl.css', array( 'cubic-parent-style' ) );
	}

	wp_enqueue_style( 'cubic-style', get_stylesheet_uri(), array( 'cubic-parent-style' ) );

	if ( ( is_search() && have_posts() ) || is_archive() || is_home() ) {
		wp_enqueue_script( 'cubic-hentry', get_stylesheet_directory_uri() . '/js/hentry.js', array( 'jquery' ), '20150113', true );
	}

	wp_enqueue_script( 'cubic-script', get_stylesheet_directory_uri() . '/js/cubic.js', array( 'jquery' ), '20150113', true );
}
add_action( 'wp_enqueue_scripts', 'cubic_scripts', 11 );

/**
 * Prints HTML with meta information for the categories, tags, comments and edit link.
 */
function entryLinksContent1() {

	/* Hide category and tag text for pages */
	if ( 'post' == get_post_type() ) {
		if ( has_post_format() ) {
			$format = get_post_format();
			echo '<div class="post-format-link"><span class="format-' . $format . '" href="' . esc_url( get_post_format_link( $format ) ) . '" title="' . esc_attr( sprintf( __( 'All %s posts', 'boardwalk' ), get_post_format_string( $format ) ) ) . '">' . get_post_format_string( $format ) . '</span></div>';
		}
		/* translators: used between list items, there is a space after the comma */
		$categories_list = getCategoryList(  __( '<br > ', 'boardwalk' ) );
		if ( $categories_list && boardwalk_categorized_blog() ) {
			printf( '<span class="page-links-title">' . __( '%1$s', 'boardwalk' ) . '</span>', $categories_list );
			/************** ENTRY TITLE */
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'boardwalk' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'boardwalk' ) . '</span>', $tags_list );
		}

		if ( 1 != get_theme_mod( 'boardwalk_author_bio' ) ) {
			$byline = sprintf( '<span class="byline">' . _x( '%s', 'post author', 'boardwalk' ) . '</span>', '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );
//				echo . $byline; /* TO SHOW WP-ADMIN */
		}
	}

	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'boardwalk' ), __( '1 Comment', 'boardwalk' ), __( '% Comments', 'boardwalk' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'boardwalk' ), '<span class="edit-link">', '</span>' );
}

/**
 * @param string $separator
 * @param string $parents
 * @param bool $post_id
 * @return mixed|void
 */
function getCategoryList( $separator = '', $parents = '', $post_id = false ) {
	global $wp_rewrite;
	if (!is_object_in_taxonomy(get_post_type($post_id), 'category')) {
		/** This filter is documented in wp-includes/category-template.php */
		return apply_filters('the_category', '', $separator, $parents);
	}

	$categories = apply_filters('the_category_list', get_the_category($post_id), $post_id);
	if (empty($categories)) {
		/** This filter is documented in wp-includes/category-template.php */
		return apply_filters('the_category', __('Uncategorized'), $separator, $parents);
	}

	$rel = (is_object($wp_rewrite) && $wp_rewrite->using_permalinks()) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	$thelist .= '<ul class="post-categories">';
	$thelist .= '</ul>';

	$pageName = the_title(null, null, false);

	foreach (wpGetPosts($categories) as $category ) {
		$thelist .= $separator;
		if ($pageName != $category[0]->post_title) {
			$thelist .= '<a href="' . esc_url($category[0]->guid) . '" ' . $rel . '>' . $category[0]->post_title.'</a>
			<p>' . $category[0]->post_content  . '</p>';

		}
	}
	return apply_filters( 'the_category', $thelist, $parents );
}

if ( ! function_exists( 'boardwalk_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function boardwalk_post_nav() {
		wp_reset_postdata();
		$cat = get_the_category();
		$query = new WP_Query( array (
			'category_name' => $cat[0]->slug
		));
//

		?>

		<nav class="post-navigation" role="navigation">
			<div class="nav-links">
				<?php
				previous_post_link('<div class="nav-next pagination">%link</div>',     '<span class="screen-reader-text">' . _x( '%title&nbsp;<span class="meta-nav"></span>', 'excluded_categories' ) . '</span>' );
				next_post_link('<div class="nav-previous pagination">%link</div>', '<span class="screen-reader-text">' . _x( '<span class="meta-nav"></span>', 'excluded_categories' ) . '</span>' );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
		wp_reset_postdata();
	}
endif;


/**
 * @param $categories
 * @return array
 */
function wpGetPosts($categories) {
	$categoryNamesPosts = [];
	foreach ($categories as $cat) {
		$categoryNamesPosts[$cat->name] = get_posts(array(
			'numberposts' => -1, // get all posts.
			'category' => $cat->cat_ID,
		));
	}
	return $categoryNamesPosts;
}
/* DISPLAY THE BANNER OR CATEGORY ID */
/**
 * @param bool $isCat
 * @param bool $getId
 * @return null
 */
function getCategory($isCat = false, $getId = false) {
	$topLevelCat = get_categories(array(
		'orderby' => 'name',
		'parent' => 0,
	));
	$c = null;
	foreach (get_the_category() as $cat) {
		if($cat->object_id == get_queried_object()->ID) {
			$c = $cat;
		}
	}
	foreach ($topLevelCat as $tlc) {
		if($tlc->cat_ID == $c->category_parent) {
			if($isCat) {
				return $tlc->description;
			} else if($getId) {
				return $c->cat_ID;
			}
			return $c;
		}
	}
}
function getId($getId = false){
	return getCategory(false,  $getId);
}

function getCategoryDescription($isCat = false) {
	return getCategory($isCat);
}

function getTemplateParts() {
	while ( have_posts()){
		the_post();
		get_template_part('content', get_post_format());
	}
}
/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';
/**
 * Extended Walker class for use with the
 * Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 * Edited to support n-levels submenu.
 * @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
 * @license CC BY 4.0 https://creativecommons.org/licenses/by/4.0/
 */
class BootstrapNavMenuWalker extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {


		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
//		if($depth && $args->has_children){
//			strtoupper($classes[] = 'dropdown-submenu ');
//		}




		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		/** TO CHANGE THE URL FOR THE CUBIC LAYOUT */
		$categorys = get_categories(array(
			'orderby' => 'name',
			'parent' => 0,
		));
		foreach ($categorys as $category) {
			if (get_cat_ID($item->title) == $category->cat_ID) {
				$item->url = 'http://' . $_SERVER['HTTP_HOST'] . '/category/' . $category->category_nicename . '/';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			}
		}

		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? 'class="dropdown-toggle"  data-toggle="1"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
			$attributes .= ($args->has_children) 	    ? 'class="dropdown"  data-toggle="dropdown"' : '';
			$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
			$item_output .= $args->after;
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
//class="dropdown-toggle"

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;
		if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			// descend only when the depth is right and there are childrens for this element
			if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

				foreach( $children_elements[ $id ] as $child ){

					if ( !isset($newlevel) ) {
						$newlevel = true;
						//start the child delimiter
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
					}
					$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				}
				unset( $children_elements[ $id ] );
			}

			if ( isset($newlevel) && $newlevel ){
				//end the child delimiter
				$cb_args = array_merge( array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}
		} else {
		}


		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

}
