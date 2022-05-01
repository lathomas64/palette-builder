// functions for handling interfacing with gumroad javascript
function fireGumroadEmbed(price)
{
  let html = '<div class="gumroad-product-embed"><a href="';
  let product_url = 'https://imanisells.gumroad.com/l/khiHk';
  html += product_url;
  html += '?wanted=true&price='+price;
  html += '">Loading...</a></div>';
  document.getElementById('gumroad-target').innerHTML = html;
  delete window.GumroadEmbed;
  createGumroadEmbed();
}
