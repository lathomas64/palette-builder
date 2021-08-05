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
	console.log('local filters');
	console.log(FILTERS);
	jQuery.ajax({
          url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
          method: 'POST',
          data: {
              'action':'palette_builder_filter', // This is our PHP function below
              'sanity': 'check',
              'colors': Array.from(FILTERS['colors']),
              'finishes': Array.from(FILTERS['finishes']),
              'characteristics': Array.from(FILTERS['characteristics']),
              'countries': Array.from(FILTERS['countries']),
              'price_min': PRICE_MIN,
              'price_max': PRICE_MAX
          },
          success:function(data) {
      // This outputs the result of the ajax request (The Callback)
            let pans = document.getElementsByClassName("Single_Pan_Card");
            for(let i = 0; i < pans.length; i++){
            	if(data.includes(parseInt(pans[i].id))){
            		pans[i].style.display="block";
            	}
            	else {
            		pans[i].style.display="None";
            	}
            }
            console.log('ajax successful');
            console.log(data);
          },
          error: function(errorThrown){
          	  console.log('ajax error');
              console.log(errorThrown);
          }
      });
}