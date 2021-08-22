var currentStory = new Object();
	function unique(list) {
		return Array.from(new Set(list))
	}
	function share() {
		var query = "?page_id=2";
		var link = window.location.origin;
		query += "&height="+currentStory.height;
		query += "&width="+currentStory.width;
		for (var index = 0; index < currentStory.height * currentStory.width; index++)
		{
			var cell = currentStory.shadows[index];
			if(cell.children.length){
				var shadow = cell.children[0];
				query += "&shadows["+index+"]="+shadow.getAttribute('id');
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
		for (var index = 0; index < currentStory.height * currentStory.width; index++)
		{
			if (currentStory.shadows[index].children.length){
					shadowCount++;
					shadow = currentStory.shadows[index].children[0];
					brands.push(shadow.getAttribute('data-brand'));
					countries.push(shadow.getAttribute('data-country'));
					price += Number(shadow.getAttribute('data-price'));
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
		console.log('buildGrid called');
		grid = document.getElementById('Story_Grid');
		prototype = grid.firstChild;
		while (grid.firstChild) {
			grid.removeChild(grid.firstChild);
		}
		var shadows = [];
		for (var index = 0; index < height * width; index++)
		{
			if (currentStory.shadows.length > index) {
				row.appendChild(currentStory.shadows[index])
			} else {
				let clone = prototype.cloneNode(true);
				clone.setAttribute('data-index', index);
				clone.setAttribute('ondrop','drop(event, this)');
				clone.removeAttribute('style');
				//col.style = 'border:1px solid black;';
				clone.setAttribute('ondragover','allowDrop(event)');
				//col.innerHTML='&nbsp;';
				//row.appendChild(col);
				grid.appendChild(clone);
				currentStory.shadows[index] = clone;
			}
		}
		currentStory.height = height;
		currentStory.width = width;
		updateFooter();
	}
	function drag(evt) {
		console.log('dragging...');
		console.log(evt);
	  evt.dataTransfer.setData("shadow", evt.target.id);
	}
	function allowDrop(evt) {
	  evt.preventDefault();
	}
	function drop(evt, caller) {
		evt.preventDefault();
		console.log(evt);
		var data = evt.dataTransfer.getData("shadow");
		var swap = caller.getElementsByClassName("shadow")
		console.log('start')
		console.log(data)
		console.log(caller)
		console.log(swap)
		index = caller.getAttribute('data-index')
		id = data;
		addShadow(index, id);
		// TODO add actual dropping logic here
		/* if(swap.length){
			document.getElementById(data).parentElement.appendChild(swap[0])
		}
		caller.appendChild(document.getElementById(data));*/
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
		//TODO CSS rotate here instead
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

	function addShadow(index, shadow)
	{
		// TODO handle logic for bumping things down
		updateShadow(index, shadow);
	}

	function updateShadow(index, shadow)
	{
		console.log('updateShadow');
		console.log(index);
		console.log(shadow);
		grid_shadow = currentStory.shadows[index];
		shadow_data = $('#'+shadow)[0]
		grid_shadow.getElementsByTagName('img')[0].src = shadow_data.getElementsByTagName('img')[0].src;
		console.log('end update shadow');
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
		reset();
		for (var index = 0; index < currentStory.height * currentStory.width; index++)
		{
			if (getUrlParam('shadows['+index+']', false)) {
				updateShadow(index, document.getElementById(getUrlParam('shadows['+index+']', false)));
			}
		}
		updateFooter();
	}
	$(document).ready(function(){
		init();
	});
