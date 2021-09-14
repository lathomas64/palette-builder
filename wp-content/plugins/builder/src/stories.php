<?php
function community_stories(){
  echo 'community stories not implemented yet';
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
    $stories = array();
    while($story_query->have_posts())
    {
      $story_query->the_post();
      $story = array();
      $story["name"] = get_field("name");
      $story["shadows"] = wp_list_pluck(wp_list_pluck(get_field("shadows"), "shadow"), "ID");
      $stories[] = $story;
    }
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
