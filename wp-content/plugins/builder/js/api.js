//handle communications with the api
const API_SHADOW_BASE="https://pb.rainbowcapitalism.com/?rest_route=/wp/v2/cpt_shadow&status=publish";
let CURRENT_PAGE = 1;
let SORT_FIELD = 'color';
let SORT_DIRECTION = 'asc';

//&order=asc&orderby=vividness&page=2
function fetch_api(append)
{
  // TODO apply filters and orderby
  let url = API_SHADOW_BASE;
  url += "&page="+SHADOW_LIST_PAGE;
  url += "&orderby="+SORT_FIELD;
  url += "&order="+SORT_DIRECTION;
  // TODO fix this value somewhere
  url += "&per_page=20";
  console.log(url);
  jQuery.ajax({
          url: url,
          method: 'GET',
          success:function(data) {
            console.log(data);
            render_shadows(data, append);
          },
          error: function(errorThrown){
          	  console.log('ajax error');
              console.log(errorThrown);
              UPDATING_SHADOWS = false;
          }
      });
}
