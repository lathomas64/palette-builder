<?php
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
if (!defined("ABSPATH")) {
	/** Set up WordPress environment */
	require_once "/usr/share/wordpress/wp-load.php";
}
function extract_tax($tax_name, $the_tax)
{
	if(array_key_exists($tax_name, $the_tax))
	{
		$term = $the_tax[$tax_name];
		$explode = explode("=", $term);
		$slug = $explode[1];
		$term = substr($slug, 0,-1);
		$term_details = get_terms($tax_name, array('slug'=>$term));
		if($term_details){
			$term_name = $term_details[0]->name;
			return $term_name;
		} else {
			return "unknown";
		}
	} else {
		return "unknown";
	}
}
$args = [
	"post_type" => "cpt_shadow",
	"post_status" => "publish",
	"posts_per_page" => -1,
	"orderby" => "title",
	"order" => "ASC",
	"cat" => "home",
];

$shadows = new WP_Query($args);
$args = [
	"post_type" => "cpt_brand",
	"post_status" => "publish",
	"posts_per_page" => -1,
	"orderby" => "title",
	"order" => "ASC",
	"cat" => "home",
];
$brands = new WP_Query($args);
$args = [
	"post_type" => "tax_series",
	"post_status" => "publish",
	"posts_per_page" => -1,
	"orderby" => "title",
	"order" => "ASC",
	"cat" => "home",
];
$series = new WP_Query($args);
$count = $shadows->found_posts;
?>
<div class="Results Column Gap_24">
	<div class="Row Space_Between Align_Items_Center">
		<div class="Body Small_Text">
			<span id='Shadow_Count'> Showing <?php echo $count; ?> shadows </span>
		</div>
		<div class="Row Space_Between Gap_8 Align_Items_Center">
			<button id="shadowFilterBtn" class="Filter_Button Icon_Button Align_Items_Center Row Gap_4">
				<div class="Icon_Container">
					<svg width="13" height="14" viewBox="0 0 13 14" fill="#09262A" xmlns="http://www.w3.org/2000/svg"><path d="M8.55526 13.1271C8.58636 13.3604 8.5086 13.6093 8.32973 13.7726C8.25779 13.8447 8.17233 13.9019 8.07825 13.9409C7.98417 13.9799 7.88332 14 7.78147 14C7.67962 14 7.57877 13.9799 7.48469 13.9409C7.39062 13.9019 7.30516 13.8447 7.23321 13.7726L4.11475 10.6541C4.02993 10.5712 3.96544 10.4698 3.92632 10.3578C3.88719 10.2458 3.8745 10.1263 3.88922 10.0086V6.02696L0.164173 1.25983C0.037885 1.09771 -0.0190985 0.892191 0.00567355 0.688185C0.0304456 0.48418 0.134959 0.298273 0.296377 0.171088C0.444135 0.0622138 0.607446 0 0.778534 0H11.6659C11.837 0 12.0003 0.0622138 12.1481 0.171088C12.3095 0.298273 12.414 0.48418 12.4388 0.688185C12.4636 0.892191 12.4066 1.09771 12.2803 1.25983L8.55526 6.02696V13.1271ZM2.36498 1.55534L5.44457 5.49037V9.78312L6.99991 11.3385V5.48259L10.0795 1.55534H2.36498Z" /></svg>
				</div>
				<div class="Tab_Label">Filter</div>
			</button>
			<button id="shadowSortBtn" class="Filter_Button Icon_Button Row Gap_4 Align_Items_Center">
				<div class="Icon_Container">
					<svg fill="#09262A" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.9 9.8H14L11.2 12.6L8.4 9.8H10.5V0H11.9V9.8ZM0 9.8H7V11.2H0V9.8ZM2.8 1.4V2.8H0V1.4H2.8ZM0 5.6H4.9V7H0V5.6Z" />
					</svg>
				</div>
				<div class="Tab_Label">Sort</div>
			</button>
		</div>
	</div>
	<div class="Grid Row Gap_16">
		<?php
  while ($shadows->have_posts()):

  	$shadows->the_post();
  	$brand = get_field("brand");

  	$colors = get_field("colors");
		$the_tax = get_the_taxonomies(0, array('term_template' => '%1$s'));
		if(array_key_exists('tax_series', $the_tax)){
			$series = $the_tax['tax_series'];
			$explode = explode("=", $series);
			$slug = $explode[1];
			$series = substr($slug, 0,-1);

			$details = get_terms('tax_series', array('slug'=>$series));
			$shape = get_field('shape', $details[0]);
			$height = get_field('height', $details[0]);
			$width = get_field('width', $details[0]);
			if(!$brand){
				$brand_series = get_field('brand', $details[0]);
				if($brand_series){
						$brand = $brand_series; //how do we get the name from this?
				}

			}
			$size = $height;
			if($width != $height){
				$size = "Irregular";
			} else if($width == ""){
					$size = 26;
					$height = 26;
					$width = 26;
			}



			$shift = extract_tax("tax_shift", $the_tax);
			$finish = extract_tax("tax_finish", $the_tax);
			$family = extract_tax("tax_color_family", $the_tax);
			$temperature = extract_tax("tax_temperature", $the_tax);
			$vividness = extract_tax("tax_vividness", $the_tax);
			$lightness = extract_tax("tax_lightness", $the_tax);
		} else {
			$series = 'undefined';
			$shape = 'Round';
			$size = 26;
			$height = 26;
			$width = 26;

		}
  	?>
			<a <?php
				if ($colors) {
					echo "data-colors='[";
					foreach ($colors as $index => $color){
						echo '"' . $color['color'] . '"';
						if ($index < count($colors)-1){
							echo ",";
						}
					}
					echo "]'";
				}
				?> data-size='<?php echo $size; ?>'
						data-height='<?php echo $height; ?>'
						data-width='<?php echo $width; ?>'
						data-shape='<?php echo $shape ?>'
						data-series='<?php echo $series; ?>'
						data-name='<?php the_title(); ?>'
						data-shift='<?php echo $shift; ?>'
						data-finish='<?php echo $finish; ?>'
						data-color-family='<?php echo $family; ?>'
						data-color-temp='<?php echo $temperature; ?>'
						data-vividness='<?php echo $vividness; ?>'
						data-lightness='<?php echo $lightness; ?>'
						<?php if ($brand) { ?>
						data-country='<?php echo get_post_field("country", $brand[0]); ?>'
						data-brand='<?php echo get_post_field("post_title", $brand[0]); ?>'
						<?php } else { ?>
						data-country='unknown'
						data-brand='unknown'
						<?php } ?>
						data-price='<?php echo get_field("price"); ?>' id='<?php the_ID(); ?>'
						draggable="true" ondragstart="drag(event)"
						class="Single_Pan_Card" href="#">
				<div class="Card_Container Column Gap_8">
					<div class="Shadow_Name"><?php the_title(); ?></div>
					<div class="Shadow_Image_Container Column Align_Items_Center Justify_Content_Center Pan_Size_<?php echo $size; ?> Pan_Shape_<?php echo $shape; ?>">
						<div class="Wrapper">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
							<div class="Pan_Shadow"></div>
						</div>
					</div>
				</div>
			</a>
		<?php
  endwhile;

  wp_reset_postdata();
  ?>
	</div>
</div>
