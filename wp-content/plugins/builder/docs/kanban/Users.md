once a purchase is made we can use ping to create an account:
	https://app.gumroad.com/ping

create route that takes gumroad ping and creates a user account

parent frame gets ping message with content
	pass content along to wordpress backend
	wordpress backend checks 



curl https://api.gumroad.com/v2/sales \
  -d "access_token=ACCESS_TOKEN" \
  -d "email=calvin@gumroad.com" \
  -X GET

need access token

can we just use api to create users?