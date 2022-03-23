
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
            // console.log(url);
            // console.log(paged_data[key]);
            // console.log(data);
            paged_data[key] = paged_data[key].concat(data);
            // console.log(paged_data[key]);
            pages = xhr.getResponseHeader("X-WP-TotalPages");
            // console.log(pages);
            // console.log(page);
            if(page < pages)
            {
              new_url = url.replace("&page="+page, "&page="+(page+1));
              // console.log(new_url);
              pull_pages(new_url, key, page+1);
            }
          }
  });
}
