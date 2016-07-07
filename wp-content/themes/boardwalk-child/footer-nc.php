<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Boardwalk
 */

$phraseArray = explode('.', get_the_content());

$link = $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
$phrase = null;
if (get_the_ID() == 1050 || get_the_ID() == 1048) {
	$phrase = 'n c ag ' . get_the_title()  . ' ' .  $phraseArray[2]  . ' ' .  $phraseArray[3];
} else if (get_the_ID() == 1054 || get_the_ID() == 114) {
	$phrase = 'n c ag ' . get_the_title()  . ' ' . $phraseArray[3];
} else if (get_the_ID() == 1148 || get_the_ID() == 1102 || get_the_ID() == 1091 || get_the_ID() == 0 || get_the_ID() == 282) {
	$blog = explode('<p>', $phraseArray[0]);
	$blogTitle = explode('</p>', $blog[1]);
	$phrase = 'n c ag ' /*. $blogTitle[0] */. ' ' . $phraseArray[1]  . ' ' . $phraseArray[2];
} else if (get_the_ID() == 789 || get_the_ID() == 902 || get_the_ID() == 791 || get_the_ID() == 637) {
	$phrase = 'n c ag';
} else {
	$phrase = 'n c ag ' . get_the_title()  . ' ' .  $phraseArray[0]  . ' ' .  $phraseArray[1];
}

//var_dump($phraseArray);
//var_dump(get_the_ID());
?>
<style>
	.customIconcon {
		height: 23px;
		margin: 1px 11px;
		padding: 0 0 7px;
	}
</style>
<footer id="colophon" class="site-footer" role="contentinfo">
	<nav class="social-navigation" role="navigation">
		<div class="menu-social">
			<ul id="menu-n-c-ag-menu" class="clear">
				<li id="menu-item-1248" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1248">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo $link ?>" target="_blank">
						<span class="screen-reader-text">fb</span>
					</a>
				</li>
				<li id="menu-item-1249" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1249">
					<a href="https://twitter.com/intent/tweet?text=<?php echo $phrase ?>" target="_blank">
						<span class="screen-reader-text">twitter</span>
					</a>
				</li>
				<li id="menu-item-1250" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1250">
					<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/share?url%3D<?php echo $link ?>%26gpsrc%3Dgplp0&btmpl=popup#identifier" target="_blank">
						<span class="screen-reader-text">google</span>
					</a>
				</li>
				<li id="menu-item-1251" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1251">
					<a href="https://www.xing.com/spi/shares/new?url=<?php echo $link ?>" target="_blank">
						<img class="customIconcon" alt="images" src="http://devweb.ncag.ch/wp-content/uploads/2016/07/images.png">
						<span class="screen-reader-text">xing</span>
					</a>
				</li>
				<li id="menu-item-1252" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1252">
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link ?>" target="_blank">
						<span class="screen-reader-text">linkedin</span>
					</a>
				</li>
				<li id="menu-item-1253" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1253">
					<a href="http://ncag.mydropbox.ch/Default.aspx?ReturnUrl=%2f" rel="myDROPBOX" target="_blank" title="myDROPBOX">
						<img class="customIconcon" src="http://devweb.ncag.ch/wp-content/uploads/2016/07/dropBox.png">
						<span class="screen-reader-text">Up/Download DATENTRANSFER</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</footer>

<?php wp_footer(); ?>
<!--<script src=”https://use.fontawesome.com/92d039f13d.js”></script>-->
<script type="text/javascript" language="Javascript">
	function ncDropBox() {
		window.open("http://ncag.mydropbox.ch/Default.aspx?ReturnUrl=%2f");
	}
</script>
</body>
</html>