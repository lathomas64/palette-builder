function compare_attribute(attribute)
{
  function inner_compare(a, b){
    if(a.getAttribute(attribute) > b.getAttribute(attribute))
    {
      return 1;
    }
    else
    {
      return -1;
    }
  }
  return inner_compare;
}

function sort(attr, item_class)
{
  item_parent = document.getElementsByClassName(item_class)[0].parentElement;
  sorted_items = [...item_parent.children].sort(compare_attribute(attr))
  sorted_items.forEach(node=>parent.appendChild(node));
}
