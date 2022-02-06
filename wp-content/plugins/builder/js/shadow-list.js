function load_shadows(ids)
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
              let count_element = document.getElementById('Shadow_Count');
              console.log(count_element.textContent);
              let count_parts = count_element.textContent.split(" ");
              console.log(count_parts);
              count_parts[1] = Number(count_parts[1]) + parsed.length;
              console.log(count_parts);
              count_element.textContent = count_parts.join(" ");
              console.log(count_element.textContent);

            }
    });
    return true;
  } else {
    return false;
  }
  //3 render shadows returned and update Shadow count element
}

function load_shadow(id)
{
  if(shadow_loaded(id))
  {
    console.log('shadow already loaded...skipping');
    return false;
  }
  else {
    jQuery.ajax({
            url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
            method: 'POST',
            data: {
                'action':'get_shadow', // This is our PHP function below
                'id': id
            },
            success:function(data) {
              parsed = JSON.parse(data);
              console.log(parsed);
              render_shadow(parsed);
              let count_element = document.getElementById('Shadow_Count');
              let count_parts = count_element.textContent.split(" ");
              count_parts[1] = Number(count_parts[1]) + 1;
              count_element.textContent = count_parts.join(" ");

            }
    });
    return true;
  }

}

function load_attribute(element, data, field)
{
  element.setAttribute("data-"+field, data[field]);
  return element;
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
