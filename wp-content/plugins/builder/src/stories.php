<?php

function extract_stories($story_query){
  $stories = array();
  //get size
  while($story_query->have_posts())
  {
    $story_query->the_post();
    $story = array();
    $story["name"] = get_field("name");
    $term = get_terms(array('taxonomy'=>'tax_story_size'))[0];
    $story["height"] = get_field("height", $term);
    $story["width"] = get_field("width", $term);
    $story["community"] = get_field("community");
    $story["shadows"] = wp_list_pluck(wp_list_pluck(get_field("shadows"), "shadow"), "ID");
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
    'key' => 'community',
    'value' => true,
    'compare' => '='
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
    'author' => $current_user->ID,
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

function save_story() {
  if ( isset($_REQUEST) ) {
    print_r($_REQUEST);
  }
  echo 'save story not implemented yet';
  die();
}

?>
