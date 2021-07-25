var PRICE_MIN = -1;
var PRICE_MAX = -1;
var FILTERS = {"colors": new Set(),
			   "finishes": new Set(),
			   "characteristics": new Set(),
				"countries": new Set()}

function Toggle_Filter(event, filterset) {
	var filter = event.target;
	var type = filter.id;
	var state = filter.checked;

	if(state) {
		FILTERS[filterset].add(type);
	} else {
		FILTERS[filterset].delete(type);
	}
	update();
}

function update(){
	let matched = new Set();
	let unmatched = new Set();
	const shadows = document.getElementsByClassName("Single_Pan_Card");

	//filter colors
	//filter finishes
	//filter price
	//filter characteristics
	//filter countries
	console.log('update called');
	console.log('or filters:');
	console.log(OR_FILTERS);
	console.log('and filters:');
	console.log(AND_FILTERS);
}


funcion match_red(element) {
	
}