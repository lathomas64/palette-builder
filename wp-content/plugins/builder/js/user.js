//All the code needed to handle interactions with users.
user_data = {}

function handleMessage(e){
  if(typeof(e.data) === "string")
  {
    let parsed = JSON.parse(e.data);
    if(parsed["success"])
    {
      let email = parsed["email"];
      let success = parsed["success"];
      let sale_id = parsed["id"];
      let license_key = parsed["license_key"];
      user_data = {"email":email,"sale_id":sale_id, "license_key":license_key}
      //wordpress_action("gumroad_register",data,function(data){console.log(data);});
      document.getElementById('gumroad-target').innerHTML = "";
    }
  }
}

function submitUserData()
{
  user_data["username"] = $("#register_username").val();
  user_data["password"] = $("#register_password").val();
  wordpress_action("gumroad_register",user_data,function(data){console.log(data);});
}

window.addEventListener("message", handleMessage, false);
