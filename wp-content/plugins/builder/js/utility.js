
function unique(list){
  let result = Array.from(new Set(list));
  return result;
}

paged_data = {}

function pull_pages(url_base, key, page=1)
{
  // console.log(url_base)
  if(!paged_data.hasOwnProperty(key))
  {
    paged_data[key] = [];
  }
  if(url_base.indexOf("&page=") == -1)
  {
    if(url_base.indexOf("?") == -1)
    {
        url = url_base + "?page="+page;
    }
    else {
      url = url_base + "&page="+page;
    }
  } else {
    url = url_base;
  }
  jQuery.ajax({
          url: url,
          method: 'GET',
          async: false,
          success:function(data, status, xhr) {
            paged_data[key] = paged_data[key].concat(data);
            pages = xhr.getResponseHeader("X-WP-TotalPages");
            if(page < pages)
            {
              new_url = url.replace("&page="+page, "&page="+(page+1));
              pull_pages(new_url, key, page+1);
            }
          }
  });
}

function filter_list(list, query)
{
  var value = query.toLowerCase();
   $(list + " li").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
}

function launch_modal(title, message)
{
  $("#centerModal").addClass("On");
  $("#genericModal").addClass("On");
	$("#genericModal").removeClass("Hidden");
  $("#genericModal .Panel_Title").text(title);
  $("#genericModal .Subheading").text(message);
}

function transpose(data, height, width)
{
  //takes a list representing a matrix and its height and width
  //and returns another list representing it rotated clockwise
  // x in range(0, w):
	// y in range(0, h):
	// 	transpose_next = w*(h-(y+1))+x
  transposed = [];
  for(let x = 0; x < width; x++)
  {
    for(let y = 0; y < height; y++)
    {
      next_index = width * (height - (y+1))+x;
      transposed.push(data[next_index]);
    }
  }
  return transposed;
}


function wordpress_action(action, data, callback)
{
  if(action)
  {
    data["action"] = action;
  }
  jQuery.ajax({
          url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
          method: 'POST',
          data: data,
          success:function(data) {
            console.log(data);
            callback();
          }
  });
}

//test purposes
function ajax_call(url)
{
  jQuery.ajax({
          url: url, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
          method: 'POST',
          data: {},
          success:function(data) {
            console.log(data);
          }
  });
}
