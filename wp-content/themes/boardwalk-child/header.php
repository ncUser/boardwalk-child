<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Boardwalk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta charset="utf-8">
    <title>n c ag</title>
    <meta content="n c ag: MEDIEN-SERVICES, PRINT, SOFTWARE-LÖSUNGEN, Corporate Publishing, Fotografie, Bildbearbeitung, Kreativretushen & Composings, Layout-Services, Korrektorat, Tablet Publishing, 3D-Rendering, Online-Services-Plakatdruck, Offsetdruck, digitaldruck, Digital-Proofs,Pim-System, Individual-Losungen, Web-to-Print, Media-Asset-Management"
          name="keywords"/>
    <meta class="" content="n c ag: Consulting"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'boardwalk'); ?></a>
    <header id="masthead" class="site-header" role="banner">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="col-xs-9 col-sm-3 col-md-3 col-lg-3 pull-left">
                    <a class="navbar-brand" href="/#">
                        <img class="logo" alt="Brand" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/uploads/2016/04/logo.png">
                    </a>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                    <?php
                    if (get_the_ID() == 1217 || get_the_ID() == 1220) {
                        echo '<script type="text/javascript" language="Javascript">window.open("http://ncag.mydropbox.ch/Default.aspx?ReturnUrl=%2f");</script>';
                        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/category/uber-uns/');
                    }
                    ?>
                </div><!-- .site-branding -->
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="navbar-inner customNav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed sxRight" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php

                        wp_nav_menu(array(
                                'menu' => 'primary',
                                'theme_location' => 'primary',
                                'depth' => 2,
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class' => 'nav navbar-nav',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new BootstrapNavMenuWalker())
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs contact">
                    <a href="<?php echo $_SERVER['HTTP_HOST']?>/2016/04/25/kontakt/">
                        <p class="pull-right">In der Luberzen
                            25<br>8902 Urdorf<br>
                            <a href="tel:+41 44 735 38 38">+41 44 735 38 38</a><br>
                            <a href="mailto:info@ncag.ch">info@ncag.ch</a>
                        </p>
                    </a>
                </div>
            </nav> <!--End #navi-->
        </div>
    </header><!-- #masthead -->

    <script type="text/javascript">
//        jQuery(document).ready(function($) {
//            $.ajax({
//                action: 'detectWidth',
//                url: "http://devweb.ncag.ch/wp-content/themes/boardwalk-child/header.php",
//                data: {
//                    'action':'detectWidth',
//                    'width' : screen.width
//                },
//                success:function(data) {
//                    // This outputs the result of the ajax request
////                    console.log(data);
//                },
//                error: function(errorThrown){
//                    console.log(errorThrown);
//                }
//            });
//
//        });
        //            var width = screen.width;
        //            var height = screen.height;
    </script>
    <?php



//function detectWidth() {
    // make the ajaxurl var available to the above script
//    wp_localize_script( 'ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
//    if(!empty($_POST['width']))
//    {
//        global $screenWidth; $screenWidth = get_post( $_REQUEST['width'] );
//        echo json_encode( $screenWidth );
//    }
//    var_dump($_REQUEST['width']);
//    wp_die();
//}
//add_action('wp_enqueue_scripts', 'detectWidth');
//echo '<h1>hello world</h1>';
//var_dump($_REQUEST['width']);
//var_dump('http://' . $_SERVER['HTTP_HOST'] . '/header.php' );
//var_dump(get_bloginfo("template_url") . '-child/header.php');
//add_action( 'wp_ajax_nopriv_example_ajax_request', 'detectWidth' );


?>