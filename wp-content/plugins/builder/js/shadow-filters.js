var PRICE_MIN = -1;
var PRICE_MAX = -1;
var UPDATING_SHADOWS = false;
var FILTERS = {"colors": new Set(),
			   "finishes": new Set(),
				 "shipping": new Set(),
				 "brand": new Set(),
			   "characteristics": new Set(),
				 "demographics": new Set(),
				 "shift": new Set(),
				 "vividness": new Set(),
				 "lightness": new Set(),
				 "size": new Set(),
				 "shape": new Set(),
				 "temperature": new Set(),
				"countries": new Set()}

function Toggle_Filter(event, filterset) {
	var filter = event.target;
	var type = filter.id;
	var state = filter.checked;
	if(filter.getAttribute('data-filter') != null){
		type = filter.getAttribute('data-filter');
	}

	if(state) {
		FILTERS[filterset].add(type);
	} else {
		FILTERS[filterset].delete(type);
	}
	update();
}

function Update_Price(event, min_or_max) {

	console.log(event);
	console.log(min_or_max);
	let index = event.target.options.selectedIndex;
	let price = event.target.options[index].value;
	if(min_or_max == "min"){
		PRICE_MIN = price;
	} else {
		PRICE_MAX = price;
	}
	console.log(price);
	update();
}

function update(append=false){
	if(UPDATING_SHADOWS)
	{
		return false;
	}
	else {
		UPDATING_SHADOWS = true;
	}
	let matched = new Set();
	let unmatched = new Set();
	const shadows = document.getElementsByClassName("Single_Pan_Card");
	if(append)
	{
		SHADOW_LIST_PAGE += 1;
	} else {
		SHADOW_LIST_PAGE = 1;
	}

	//filter colors
	//filter finishes
	//filter price
	//filter characteristics
	//filter countries
	console.log('update called');
	console.log('local filters');
	console.log(FILTERS);
	jQuery.ajax({
          url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
          method: 'POST',
          data: {
              'action':'palette_builder_filter',
              'sanity': 'check',
							'page': SHADOW_LIST_PAGE,
              'colors': Array.from(FILTERS['colors']),
              'finishes': Array.from(FILTERS['finishes']),
              'characteristics': Array.from(FILTERS['characteristics']),
							'temperature': Array.from(FILTERS['temperature']),
							'demographics': Array.from(FILTERS['demographics']),
							'brand': Array.from(FILTERS['brand']),
							'shift': Array.from(FILTERS['shift']),
							'vividness': Array.from(FILTERS['vividness']),
							'lightness': Array.from(FILTERS['lightness']),
							'size': Array.from(FILTERS['size']),
							'shape': Array.from(FILTERS['shape']),
							'shipping_country': Array.from(FILTERS['shipping']),
              'countries': Array.from(FILTERS['countries']),
              'price_min': PRICE_MIN,
              'price_max': PRICE_MAX
          },
          success:function(data) {
						parsed = JSON.parse(data);
						load_shadows(parsed, append);
          },
          error: function(errorThrown){
          	  console.log('ajax error');
              console.log(errorThrown);
          }
      });
}
