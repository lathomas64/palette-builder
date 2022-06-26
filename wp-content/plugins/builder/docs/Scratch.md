html and css for shopping list is done
js and interactivity needs to happen still
- data to populate shopping list\
	-	pallete thumbnail
	-	shadows brands countries
	-	price (before shipping)
	-	list by brand -- brand characteristics
	-	x to remove from shopping list
	-	copy things to clipboard
	-	instagram and google oauth
	-	start over - delete 1st shadow then do startover codepath
	-	color circle for stories.
	-	put shadows in set aside when changing to smaller story/story-size

bugs/enhancements


need to make
* mechanism for getting brand data(characteristics/demographics) to shopping list

acf rest api: https://pb.rainbowcapitalism.com/?rest_route=/wp/v2/cpt_shadow

https://wordpress.stackexchange.com/questions/358130/wp-query-sort-using-multiple-numeric-meta-values


When we sort what do we want to to happen?
- pull from rest api ordered by (value)


https://pb.rainbowcapitalism.com/?rest_route=%2Fwp%2Fv2%2Fcpt_shadow&status=publish&page=1&orderby=price&order-DESC=&posts_per_page=20

https://pb.rainbowcapitalism.com/?rest_route=%2Fwp%2Fv2%2Fcpt_shadow&status=publish&page=1&orderby=price&order-DESC=&posts_per_page=20


https://pb.rainbowcapitalism.com/wp-admin/post.php?post={id}&action=edit


remember: https://core.trac.wordpress.org/ticket/28099


h:3,w:4

0,1,2,3
4,5,6,7
8,9,10,11


8,4,0
9,5,1
10,6,2
11,7,3


w*(h-1),w*(h-2),w*(h-3)
w*(h-1)+1...
...
w*(h-1)+(w-1)...


x in range(0, w):
	y in range(0, h):
		transpose_next = w*(h-(y+1))+x

8,4,0,9,5,110,6,2,11,7,3
