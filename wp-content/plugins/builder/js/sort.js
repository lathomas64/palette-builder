function compare_attribute(attribute, asc)
{
  function inner_compare(a, b){
    result = 0;
    left = a.getAttribute(attribute);
    right = b.getAttribute(attribute);
    if(!isNaN(parseFloat(left))){
      left = parseFloat(left);
      right = parseFloat(right);
    }
    if(left > right)
    {
      result = 1;
    }
    else
    {
      result = -1;
    }

    if(asc){
      return result;
    } else {
      return -1 * result;
    }
    return result;
  }
  return inner_compare;
}

function sort(attr, item_class, asc)
{
  console.log(attr);
  console.log(item_class);
  console.log(asc);
  item_parent = document.getElementsByClassName(item_class)[0].parentElement;
  sorted_items = [...item_parent.children].sort(compare_attribute(attr, asc))
  sorted_items.forEach(node=>item_parent.appendChild(node));
}
