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
$shipping_options = array();
$shipping_options = get_terms( array(
    'taxonomy' => 'tax_shipping',
    'hide_empty' => false,
) );
function extract_name($object)
{
  return $object->name;
}
$shipping_options = array_map('extract_name', $shipping_options);
print_r($shipping_options);
?>
<hr>
and thats the end...
