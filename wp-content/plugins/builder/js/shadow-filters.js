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
	}	if(append)
	{
		SHADOW_LIST_PAGE += 1;
	} else {
		SHADOW_LIST_PAGE = 1;
	}
	fetch_api(append);
}
