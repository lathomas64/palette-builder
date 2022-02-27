let SHADOW_LIST_PAGE = 1;

function load_shadows(ids, append=false)
{
  /*
  take list of ids, filter out ones already loaded
  make request to backend to get shadow data for
  all remaining shadows.
  */
  //1 filter list via shadow_loaded.
  filtered_ids = ids.filter(e => !shadow_loaded(e));
  //2 ajax request with filtered list
  if(filtered_ids.length > 0)
  {
    jQuery.ajax({
            url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
            method: 'POST',
            data: {
                'action':'get_shadow', // This is our PHP function below
                'id': filtered_ids
            },
            success:function(data) {
              parsed = JSON.parse(data);
              parsed = parsed.filter(e => e["ID"] != null);
              for(let index in parsed)
              {
                shadow = parsed[index];
                render_shadow(shadow);
              }
              let pans = $(".Results .Single_Pan_Card");
  						let count_element = document.getElementById('Shadow_Count');
  						let count = 0;
              for(let i = 0; i < pans.length; i++){
              	if(ids.includes(parseInt(pans[i].id))){
              		//pans[i].style.display="block";
  								pans[i].classList.remove("Hidden");
  								count++;
              	}
              	else if(!append) {
  								pans[i].classList.add("Hidden");
  							}
              }

  						count_element.textContent = "Showing " + count + " shadow" + (count > 1? "s":"");
              console.log('ajax successful');
              console.log(data);
  						console.log(data.length);
              UPDATING_SHADOWS = false;

            }
    });
    return true;
  } else {
    //if we don't need to load any shadows just update the count and whats showing.
    let pans = $(".Results .Single_Pan_Card");
    let count_element = document.getElementById('Shadow_Count');
    let count = 0;
    for(let i = 0; i < pans.length; i++){
      if(ids.includes(parseInt(pans[i].id))){
        //pans[i].style.display="block";
        pans[i].classList.remove("Hidden");
        count++;
      }
      else if (!append) {
        pans[i].classList.add("Hidden");
      }
    }

    count_element.textContent = "Showing " + count + " shadow" + (count > 1? "s":"");
    UPDATING_SHADOWS = false;
    return false;
  }
  //3 render shadows returned and update Shadow count element
}

function load_attribute(element, data, field)
{
  element.setAttribute("data-"+field, data[field]);
  return element;
}

function render_shadows(shadow_data_list, append=false)
{
  console.log(append);
  ids = shadow_data_list.map(x => x.ID);
  for(let index in shadow_data_list)
  {
    shadow = shadow_data_list[index];
    render_shadow(shadow);
  }
  let pans = $(".Results .Single_Pan_Card");
  for(let i = pans.length-1; i >= 0; i--){
    shadow_element = pans[i];
    if(ids.includes(parseInt(pans[i].id))){
      //pans[i].style.display="block";
      //shadow_element.parentNode.appendChild(shadow_element);
      shadow_element.classList.remove("Hidden");
    }
    else if(!append) {
      shadow_element.classList.add("Hidden");
      shadow_element.parentNode.appendChild(shadow_element);
    }
  }
  UPDATING_SHADOWS =false;
}

function render_shadow(shadow_data)
{
  container = $(".Results_Container .Grid");
  prototype = container.children()[0];
  shadow_element = prototype.cloneNode(true);
  shadow_element.id = shadow_data.ID;
  fields = [
    "height", "width", "shape", "colors",
    "size", "name", "shift", "finish",
    "color-tag", "vividness", "lightness",
    "link", "price", "country", "ships",
    "brand", "color-sort", "lightness-sort",
    "vividness-sort"
  ];
  $(shadow_element).find(".Shadow_Name").text(shadow_data['name']);
  $(shadow_element).find("img")[0].src = shadow_data["img"];
  // TODO size and shape classes on Shadow_Image_Container
  element_class = "Shadow_Image_Container Column Align_Items_Center Justify_Content_Center Pan_Size_"
  element_class += shadow_data["size"];
  element_class += " Pan_Shape_";
  element_class += shadow_data["shape"];
  $(shadow_element).find(".Shadow_Image_Container")[0].setAttribute("class", element_class);
  for(let index in fields)
  {
    shadow_element = load_attribute(shadow_element, shadow_data, fields[index]);
  }
  shadow_element.setAttribute("onclick", "addShadow(currentStory.shadowCount," + shadow_data.ID + ");updateFooter();");
  container.append(shadow_element);
}

function shadow_loaded(id)
{
  shadow_id = "#"+id;
  shadow_element = $(shadow_id);
  is_loaded = Boolean(shadow_element.length);
  return is_loaded;
}
