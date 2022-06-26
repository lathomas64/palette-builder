//All the code needed to handle interactions with users.

function handleMessage(e){
  if(typeof(e.data) === "string")
  {
    let parsed = JSON.parse(e.data);
    if(parsed["success"])
    {
      let email = parsed["email"];
      let success = parsed["success"];
      let sale_id = parsed["id"];
      data = {"email":email,"sale_id":sale_id}
      wordpress_action("gumroad_register",data,function(data){console.log(data);});
      console.log(email);
      console.log(sale_id);
    }
  }
}

window.addEventListener("message", handleMessage, false);
