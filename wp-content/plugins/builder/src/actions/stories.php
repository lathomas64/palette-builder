<?php

function extract_stories($story_query){
  $stories = array();
  //get size
  while($story_query->have_posts())
  {
    $story_query->the_post();
    $story = array();
    $story["name"] = get_field("name");
    $story["id"] = get_the_ID();
    $term = get_the_terms(get_the_ID(), 'tax_story_size')[0];
    $story["height"] = get_field("height", $term);
    $story["width"] = get_field("width", $term);
    $story["community"] = get_field("community");
    $story["published"] = get_the_date();
    $story["size"] = $story["height"] * $story["width"];
    //publish date, story price, story size,
    $story["shadows"] = wp_list_pluck(wp_list_pluck(get_field("shadows"), "shadow"), "ID");
    $story["price"] = array_sum(wp_list_pluck(wp_list_pluck(get_field("shadows"), "shadow"), "price"));
    $stories[] = $story;
  }
  return $stories;
}

function community_stories(){
  $args = [
  "post_type" => "cpt_story",
  "post_status" => "publish",
  "posts_per_page" => -1,
  "orderby" => "title",
  "order" => "ASC",
  "meta_query" => array(
    array(
      'key' => 'community',
      'value' => true,
      'compare' => '='
    )
  )
  ];

  $story_query = new WP_Query($args);
  $stories = extract_stories($story_query);

  $result = json_encode($stories);
  echo $result;
  die();
}

function user_stories() {
  if(is_user_logged_in())
  {
    $args = [
    "post_type" => "cpt_story",
    'author' => wp_get_current_user()->ID, //$current_user doesnt work here
    "post_status" => "publish",
    "posts_per_page" => -1,
    "orderby" => "title",
    "order" => "ASC",
    ];

    $story_query = new WP_Query($args);
    $stories = extract_stories($story_query);

    $result = json_encode($stories);
    echo $result;
  } else {
    $result = array("error"=> "Not logged in");
    echo json_encode($result);
  }
  die();
}

function delete_story($story_id)
{
  // TODO confirm the id is a story before deleting?
  $type = get_post_type($story_id);
  if ($type == "cpt_story")
  {
      wp_delete_post($story_id);
      echo "success";
  } else {
    echo "id is not a story.";
  }
  die();
}

function save_story() {
  print_r($_REQUEST);
  $custom_tax = array(
    'tax_story_size' => array(
      $_REQUEST["width"]."x".$_REQUEST["height"]
    )
  );
  $post_data = array(
    'post_title' => $_REQUEST['name'],
    'post_type' => 'cpt_story',
    'post_status' => 'publish',
    'tax_input' => $custom_tax
  );
  $post_id = wp_insert_post($post_data);
  update_field('name', $_REQUEST['name'], $post_id);
  $shadows = $_REQUEST['story'];
  $shadow_field = array();
  foreach($shadows as $shadow)
  {
    $temp = get_post($shadow);
    print_r($temp);
    $shadow_field[] = array("shadow" => array('ID'=>$shadow));
  }
  update_field("shadows", $shadow_field, $post_id);
  //shadows
  //story size
  echo $post_id;
  die();
}

?>
