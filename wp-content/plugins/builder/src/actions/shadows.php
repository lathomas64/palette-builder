<?php

function extract_taxonomy_data($shadow, $tax_name)
{
  $terms = get_the_terms($shadow, $tax_name);
  if($terms){
    return $terms[0]->name;
  }
  else {
    return "none";
  }
}

function _extract_shadow_data($shadow)
{
    /*
      colors, size, height, width, shape,
      title, shift, finish, color_tag,
      vividness, avg_saturation,
      lightness, avg_lightness,
      avg_hue, link, country, ships,
      brand_name, price, id
    */
    $result = array();
    $result["ID"] = $shadow->ID;
    $result["height"] = extract_taxonomy_data($shadow, "pan-height");
    $result["width"] = extract_taxonomy_data($shadow, "pan-width");
    $result["shape"] = extract_taxonomy_data($shadow, "pan-shape");
    $result["colors"] = get_post_field("colors", $shadow);
    if($result['height'] == $result['width']) {
			$result['size'] = $result['width'];
		} else {
			$result['size'] = "Irregular";
		}
    $result['name'] = get_the_title($shadow);
    $result["shift"] = extract_taxonomy_data($shadow, "tax_shift");
    $result["finish"] = extract_taxonomy_data($shadow, "tax_finish");
    $result["color-tag"] = extract_taxonomy_data($shadow, "tax_color_tag");
		$result["vividness"] = extract_taxonomy_data($shadow, "tax_vividness");
    $result["vividness-sort"] = get_post_field("avg_saturation", $shadow);
		$result["lightness"] = extract_taxonomy_data($shadow, "tax_lightness");
    $result['lightness-sort'] = get_post_field("avg_lightness", $shadow);
    $result['color-sort'] = get_post_field("avg_hue", $shadow);
    $result['link'] = get_post_field("product_url", $shadow);
    $result['price'] = get_post_field("price", $shadow);
    $brand = get_post_field("brand", $shadow);
    if ($brand) {
			$result['brand'] = get_post_field("post_title", $brand[0]);
			$result['brand_id'] = get_post_field("ID", $brand[0]);

			//get country from brand
			$country_details = wp_get_post_terms($brand[0], 'tax_countries');
			if($country_details)
			{
				//$country = get_field('name', $country_details[0]);
				$result['country'] = $country_details[0]->name;
			}
			$shipping_details = wp_get_post_terms ($brand[0], 'tax_shipping');
			if($shipping_details)
			{
				$result['ships'] = $shipping_details[0]->name;
			}
		}
    $result["img"] = get_the_post_thumbnail_url($shadow);
    return $result;
}

function get_shadow_data(){
  if ( isset($_REQUEST) ) {
    $id = $_REQUEST['id'];
    if(is_array($id))
    {
      $response = array();
      foreach($id as $shadow_id){
        $post = get_post($shadow_id);
        $data = _extract_shadow_data($post);
        $response[] = $data;
      }
    } else {
      $post = get_post($id);
      $response = _extract_shadow_data($post);
    }
    echo json_encode($response);
    die();
  }
}

 ?>
