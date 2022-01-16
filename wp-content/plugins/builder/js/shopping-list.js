let debug = null;
let brand_shadows = {};//shopping list shadows separated by brand
function populate_brand(shadow_list, brand_div)
{
    prototype_div = $($(brand_div).find('.List_Tile')[0]);
    while($(brand_div).find('.List_Tile').length > 1)
    {
      $(brand_div).find('.List_Tile')[1].remove();
    }
    for(let index=0;index < shadow_list.length; index++)
    {
      shadow = shadow_list[index];
      shadow_div = $(brand_div).find('.List_Tile')[index];
      if(shadow_div == undefined)
      {
        shadow_div = prototype_div.clone();
        $(brand_div).find('.List').append(shadow_div);
      }
      $(shadow_div).find('img')[0].src = $(shadow_list[index]).find('img')[0].src;
      $(shadow_div).find('.Shade_Name')[0].textContent = shadow_list[index].getAttribute('data-name');
      $(shadow_div).find('.Shade_Finish')[0].textContent = shadow_list[index].getAttribute('data-finish');
      $(shadow_div).find('.Shade_Shift')[0].textContent = shadow_list[index].getAttribute('data-shift');
      $(shadow_div).find('.Shade_Color')[0].textContent = shadow_list[index].getAttribute('data-color-tag');
      $(shadow_div).find('.Shade_Vividness')[0].textContent = shadow_list[index].getAttribute('data-vividness');
      $(shadow_div).find('.Shade_Lightness')[0].textContent = shadow_list[index].getAttribute('data-lightness');
      $(shadow_div).find('.Shade_Size_Shape')[0].textContent = shadow_list[index].getAttribute('data-shape')+", "+shadow_list[index].getAttribute('data-size')+"mm";
      $(shadow_div).find('.Price_Value')[0].textContent = shadow_list[index].getAttribute('data-price');
    }
    $(brand_div).removeClass('Hidden');
}

function build_shopping_list()
{
  brand_shadows = {};
  for(let index = 0; index < currentStory.shadows.length; index++)
  {
    shadow = currentStory.shadows[index].getAttribute('data-shadow-id');
    if(shadow == null)//skip empty shadows
    {
      continue;
    }
    brand = currentStory.shadows[index].getAttribute('data-brand');
    if(!(brand in brand_shadows))
    {
      brand_shadows[brand] = [];
    }
    brand_shadows[brand].push(currentStory.shadows[index]);
  }
  brands = currentStory.brands;
  brand_divs = $('.Itemized_List').children();
  divs_to_append = [];
  for(let index=0;index<Math.max(brands.length, brand_divs.length);index++)
  {
    //we have brand[index] and div[index] -> update div and show
    if(index < brands.length && index < brand_divs.length)
    {
        brand_divs[index].firstElementChild.firstElementChild.textContent = brands[index];
        populate_brand(brand_shadows[brands[index]], brand_divs[index]);
    }
    //we have brand[index] but no div[index] -> create div
    else if(index < brands.length && index >= brand_divs.length)
    {
      let extra_div = $(brand_divs[0]).clone();
      extra_div.firstElementChild.firstElementChild.textContent = brands[index];
      divs_to_append.append(extra_div);
      populate_brand(brand_shadows[brands[index]], extra_div);
    }
    //we have no brand[index] but do have div[index] -> hide div
    else if(index >= brands.length && index < brand_divs.length){
      $(brand_divs[index]).addClass('Hidden');
    } else {
      console.log('this should never happen something has gone seriously wrong in build_shopping_list');
    }
  }
  for(let index=0; index < divs_to_append.length; index++)
  {
    brand_divs.append(divs_to_append[index]);
  }
}

function remove_shopping_shadow(shadow_div)
{
  console.log(brand_shadows);
  shadow_div = $(shadow_div).parent();
  console.log(shadow_div);
  //shadow_div.addClass("Hidden");
  //remove a shadow from the shopping list
}

function open_tabs(target_brand=None)
{
  if(target_brand == None)
  {
    for (brand_index in brand_shadows)
    {
      brand = brand_shadows[brand_index];
      for (shadow_index in brand)
      {
        shadow = brand[shadow_index];
        url = shadow.getAttribute('data-link');
        window.open(url, '_blank');
      }
    }
  } else {
    for (shadow_index in brand_shadows[target_brand])
    {
      shadow = brand[shadow_index];
      url = shadow.getAttribute('data-link');
      window.open(url, '_blank');
    }
  }
}
