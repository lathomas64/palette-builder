var currentStory = new Object();
	function unique(list) {
		return Array.from(new Set(list))
	}
	function share() {
		var query = "?page_id=2";
		var link = window.location.origin;
		query += "&height="+currentStory.height;
		query += "&width="+currentStory.width;
		for (var i = 0; i < currentStory.height; i++) {
			for (var j = 0; j < currentStory.width; j++) {
				var cell = currentStory.shadows[i][j];
				if(cell.children.length) {
					var shadow = cell.children[0];
					query += "&shadows["+i+"]["+j+"]="+shadow.getAttribute('id');
				}
			}
		}
		console.log(query);
		alert(link+query);
	}
	function updateFooter() {
		var shadowCount=0;
		var brands=[];
		var countries=[];
		var price=0;
		for (var i = 0; i < currentStory.height; i++) {
			for (var j = 0; j < currentStory.width; j++) {
				if (currentStory.shadows[i][j].children.length){
					shadowCount++;
					shadow = currentStory.shadows[i][j].children[0];
					brands.push(shadow.getAttribute('data-brand'));
					countries.push(shadow.getAttribute('data-country'));
					price += Number(shadow.getAttribute('data-price'));
				}
			}
		}
		brands = unique(brands);
		countries = unique(countries);
		document.getElementById('shadow-count').innerHTML=shadowCount;
		document.getElementById('story-brands').innerHTML=brands.length;
		document.getElementById('story-countries').innerHTML=countries.length;
		document.getElementById('story-price').innerHTML=price;
		
	}
	function buildGrid(evt, height, width) {
		grid = document.getElementById('palette-grid');
		while (grid.firstChild) {
			grid.removeChild(grid.firstChild);
		}
		var shadows = [];
		for (var i = 0; i < height; i++) {
		  //<div class='row'>
		  var row = document.createElement('div');
		  row.setAttribute('class','row');
		  if (i >= currentStory.shadows.length) {
			currentStory.shadows[i] = [];
		  }
		  for (var j = 0; j < width; j++) {
			//<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
			var col = document.createElement('div');
			if (currentStory.shadows.length > i && currentStory.shadows[i].length > j) {
				row.appendChild(currentStory.shadows[i][j])
			} else {
				col.setAttribute('class', 'col');
				col.setAttribute('data-height', i);
				col.setAttribute('data-width', j);
				col.setAttribute('ondrop','drop(event, this)');
				col.style = 'border:1px solid black;';
				col.setAttribute('ondragover','allowDrop(event)');
				col.innerHTML='&nbsp;';
				row.appendChild(col);
				currentStory.shadows[i][j] = col;
			}
		  }
		  grid.appendChild(row);
		}
		currentStory.height = height;
		currentStory.width = width;
		updateFooter();
	}
	function drag(evt) {
	  evt.dataTransfer.setData("shadow", evt.target.id);
	}
	function allowDrop(evt) {
	  evt.preventDefault();
	}
	function drop(evt, caller) {
		evt.preventDefault();
		var data = evt.dataTransfer.getData("shadow");
		var swap = caller.getElementsByClassName("shadow")
		console.log('start')
		console.log(data)
		console.log(caller)
		console.log(swap)
		if(swap.length){
			document.getElementById(data).parentElement.appendChild(swap[0])
		}
		caller.appendChild(document.getElementById(data));
		updateFooter();
		console.log(evt);
	}
	
	function openTab(evt, sectionName) {
	  var i, sectioncontent, sectionlinks;
	  sectioncontent = document.getElementsByClassName("section-content");
	  for (i = 0; i < sectioncontent.length; i++) {
		sectioncontent[i].style.display = "none";
	  }
	  sectionlinks = document.getElementsByClassName("section-link");
	  for (i = 0; i < sectionlinks.length; i++) {
		sectionlinks[i].className = sectionlinks[i].className.replace(" active", "");
	  }
	  document.getElementById(sectionName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	function rotate() {
		var width = currentStory.height;
		var height = currentStory.width;
		console.log(currentStory);
		buildGrid(false, height, width);
	}
	
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value;
		});
		return vars;
	}
	
	function getUrlParam(parameter, defaultvalue){
		var urlparameter = defaultvalue;
		if(window.location.href.indexOf(parameter) > -1){
			urlparameter = getUrlVars()[parameter];
			}
		return urlparameter;
	}

	function reset() {
		currentStory.shadows = [];
		buildGrid(false, currentStory.height, currentStory.width);
	}
	
	function init() {
		try {
			openTab(false, 'size');
		}
		catch(error) {
		
		}
		query = window.location.search;
		params = new URLSearchParams(query);
		currentStory.height = getUrlParam("height", 3);
		currentStory.width = getUrlParam("width", 3);
		currentStory.shadows = [];
		buildGrid(false, currentStory.height, currentStory.width);
		for (var i = 0; i < currentStory.height; i++) {
			for (var j = 0; j < currentStory.width; j++) {
				if (getUrlParam('shadows['+i+']['+j+']', false)) {
					currentStory.shadows[i][j].appendChild(document.getElementById(getUrlParam('shadows['+i+']['+j+']', false)));
				}
			}
		}
		updateFooter();
	}

	function myFunction() {
	  // Declare variables
	  var input, filter, ul, li, a, i, txtValue;
	  input = document.getElementById('myInput');
	  filter = input.value.toUpperCase();
	  ul = document.getElementById("myUL");
	  li = ul.getElementsByTagName('li');

	  // Loop through all list items, and hide those who don't match the search query
	  for (i = 0; i < li.length; i++) {
	    a = li[i].getElementsByTagName("a")[0];
	    txtValue = a.textContent || a.innerText;
	    if (txtValue.toUpperCase().indexOf(filter) > -1) {
	      li[i].style.display = "";
	    } else {
	      li[i].style.display = "none";
	    }
	  }
	}
	init();