<h1>just a page to try out php things on the server</h1>
<?php
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
$brand_list = array();
if (!defined("ABSPATH")) {
	/** Set up WordPress environment */
	require_once "/usr/share/wordpress/wp-load.php";
}
print('begin');
?>

<hr>
embed:
<script src="https://gumroad.com/js/gumroad-embed.js"></script>
<script src="js/external/gumroad.js"></script>
<!--
<div class="gumroad-product-embed">
	<a href="https://imanisells.gumroad.com/l/khiHk?price=10&wanted=true">Loading...</a>
</div>
-->
<input type="button" onclick="fireGumroadEmbed(2);">$2</input>
<input type="button" onclick="fireGumroadEmbed(5);">$5</input>
<input type="button" onclick="fireGumroadEmbed(10);">$10</input>
<div id="gumroad-target">
</div>
<? wp_footer(); ?>
