<?php
function gumroad_register() {
  //pull data from request
  //maybe it will be ping data: https://app.gumroad.com/ping plus password
  //verify data against gumroad
  //https://api.gumroad.com/v2/sales/:id
  //if data is good make user account at subscriber level
  //wp_create_user( 'johndoe', 'passwordgoeshere', 'john.doe@example.com' );
  //https://developer.wordpress.org/reference/functions/wp_create_user/

  # PING -> license key -> verify license -> if success create user

  # IDEA: use https://api.gumroad.com/v2/licenses/verify to verify
  $ch = curl_init ( 'https://api.gumroad.com/v2/licenses/verify' );
  curl_setopt_array ( $ch, array (
          CURLOPT_POST => 1,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POSTFIELDS => array (
                  'license_key' => $_REQUEST["license_key"],
                  'product_permalink' => "khiHk"
          )
  ) );
  $response = json_decode(curl_exec ( $ch ), true);
  curl_close($ch);
  if($response["success"]) {
    wp_create_user( $_REQUEST["username"], $_REQUEST["password"], $_REQUEST["email"] );
    echo("user created");
  } else {
    echo($response["message"]);
  }
  die();
}

?>
