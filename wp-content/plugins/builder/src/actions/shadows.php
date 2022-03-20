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

function filter_add_rest_shadow_params($params)
{
  #Add things to sort shadows by: https://www.timrosswebdevelopment.com/wordpress-rest-api-post-order/
  #https://mail.google.com/chat/u/0/#chat/space/AAAANEd7Dkc
  $params['orderby']['enum'][] = 'price';
  $params['orderby']['enum'][] = 'color';
  $params['orderby']['enum'][] = 'lightness';
  $params['orderby']['enum'][] = 'vividness';
	return $params;
}

function filter_add_rest_post_query($args, $request)
{
  if($args['orderby'] == 'price')
  {
    $args['meta_key'] = 'price';
    $args['orderby'] = 'meta_value_num title';
  } else if($args['orderby'] == 'color')
  {
    $lightness_direction = 'desc';
    $color_direction = 'asc';
    if($args['order'] == 'desc')
    {
      $color_direction = 'desc';
      $lightness_direction = 'asc';
    }
    $args['meta_query'] = array(
      'relation' => 'AND',
      'color_order' => array(
        'key' => 'avg_hue',
        'compare' => 'exists',
        'type' => 'numeric'
      ),
      'lightness_order' => array(
        'key' => 'avg_lightness',
        'compare' => 'exists',
        'type' => 'numeric'
      )
    );
    $args['orderby'] = array(
      'color_order' => $color_direction,
      'lightness_order' => $lightness_direction
    );
  } else if($args['orderby'] == 'lightness')
  {
    $lightness_direction = 'asc';
    $color_direction = 'asc';
    if($args['order'] == 'desc')
    {
      $lightness_direction = 'desc';
    }
    $args['meta_query'] = array(
      'relation' => 'AND',
      'lightness_order' => array(
        'key' => 'avg_lightness',
        'compare' => 'exists',
        'type' => 'numeric'
      ),
      'color_order' => array(
        'key' => 'avg_hue',
        'compare' => 'exists',
        'type' => 'numeric'
      )
    );
    $args['orderby'] = array(
      'lightness_order' => $lightness_direction,
      'color_order' => $color_direction
    );
  } else if($args['orderby'] == 'vividness')
  {
    $vividness_direction = 'asc';
    $color_direction = 'asc';
    if($args['order'] == 'desc')
    {
      $vividness_direction = 'desc';
    }
    $args['meta_query'] = array(
      'relation' => 'AND',
      'vividness_order' => array(
        'key' => 'avg_saturation',
        'compare' => 'exists',
        'type' => 'numeric'
      ),
      'color_order' => array(
        'key' => 'avg_hue',
        'compare' => 'exists',
        'type' => 'numeric'
      )
    );
    $args['orderby'] = array(
      'vividness_order' => $vividness_direction,
      'color_order' => $color_direction
    );
  }

  $params = $request->get_params();
  $args['tax_query'] = array (
      'relation' => 'AND'
  );
  $shadow_filters = array(
    'colors'=> 'tax_color_family',
    'shift' => 'tax_shift',
    'temperature' => 'tax_color_tag',
    'finishes' => 'tax_finish',
    'lightness' => 'tax_lightness',
    'vividness' => 'tax_vividness',
    'shape' => 'pan-shape',
    'size' => 'pan-width'
  );

  foreach($shadow_filters as $param => $taxonomy)
  {
    //$taxonomy = $filters[$param];
    if(isset($params[$param]))
    {
      $args['tax_query'][] = array(
          'taxonomy' => $taxonomy,
          'field' => 'name',
          'terms' => explode(',', $params[$param])
      );
    }
  }

  if(isset($params["characteristics"]))
  {
    $brand_args = [
    "post_type" => "cpt_brand",
    "post_status" => "publish",
    "posts_per_page" => -1,
    "orderby" => "title",
    "order" => "ASC",
    "cat" => "home",
    "tax_query" => array(
      'relation' => 'AND'
    )
    ];
    // Doing this to AND instead of OR
    foreach($params['characteristics'] as $slug)
    {
      $characteristic = array(
        'taxonomy' => 'tax_brand_characteristic',
        'field' => 'slug',
        'terms' => $slug
      );
      $brand_args["tax_query"][] = $characteristic;
    }
    $brands = new WP_Query($brand_args);
    $brand_shadows = wp_list_pluck($brands->posts, "shadows");
    $shadows = array();
    foreach($brand_shadows as $shadow_list)
    {
      if(gettype($shadow_list) == "array"){
        $merge = array_merge($shadows, $shadow_list);
        $shadows = $merge;
      }
    }
    $shadows = array_unique($shadows);
    if($shadows != null)
    {
      // TODO make this work with multiple values trying to do this.
      if(array_key_exists("post__in", $args)){
        $args["post__in"] = array_intersect($args["post__in"], $shadows);
      } else {
          $args["post__in"] = $shadows;
      }
    }

  }


  //characteristics, demographics, brand
  //shipping, price


  return $args;
}

function shadow_add_data($response, $post, $param)
{
  $post = get_post($response->data['id']);
  $data = _extract_shadow_data($post);
  $response->data = $data;
  #$response->data['name'] = $response->data['title']['rendered'];
  #$response->data = _extract_shadow_data($response->data);
  return $response;
  #$response->data['marco'] = 'polo';
}

 ?>
