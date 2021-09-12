var currentStory = new Object();
	undo_stack = [];
	redo_stack = [];
	restore_list = [];
	function undo()
	{
		if(undo_stack.length > 0)
		{
			undo_stack.pop()();
		} else {
			console.log('no actions to undo');
		}

	}
	function redo()
	{
		if(redo_stack.length > 0)
		{
			redo_stack.pop()();
		} else {
			console.log('no actions to redo');
		}
	}
	function unique(list) {
		return Array.from(new Set(list))
	}
	function share() {
		var query = "?source=share";
		var link = window.location.origin+window.location.pathname;
		query += "&height="+currentStory.height;
		query += "&width="+currentStory.width;
		for (var index = 0; index < currentStory.height * currentStory.width; index++)
		{
			var cell = currentStory.shadows[index];
			if(cell.getAttribute("data-shadow-id")){
				var shadow = cell.children[0];
				query += "&shadows["+index+"]="+cell.getAttribute("data-shadow-id");
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
			if (currentStory.shadows[index].getAttribute('data-shadow-id') != null){
					shadowCount++;
					shadow = currentStory.shadows[index];
					brands.push(shadow.getAttribute('data-brand'));
					countries.push(shadow.getAttribute('data-country'));
					price += Number(shadow.getAttribute('data-price'));
				}
		}
		brands = unique(brands);
		countries = unique(countries);
		document.getElementById('Footer_Shadow_Count').innerHTML=shadowCount.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Brand_Count').innerHTML=brands.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Country_Count').innerHTML=countries.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Story_Price').innerHTML="$"+price.toFixed(2);

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
			if(index >= currentStory.shadows.length){
				let clone = prototype.cloneNode(true);
				clone.setAttribute('data-index', index);
				clone.setAttribute('ondrop','drop(event, this)');
				clone.removeAttribute('style');
				clone.setAttribute('ondragover','allowDrop(event)');
				clone.setAttribute('ondragStart','drag(event, '+index+')');
				$(clone).find('.Up_Arrow')[0].setAttribute("onclick", "shift_up("+index+")");
				$(clone).find('.Right_Arrow')[0].setAttribute("onclick", "shift_right("+index+")");
				$(clone).find('.Down_Arrow')[0].setAttribute("onclick", "shift_down("+index+")");
				$(clone).find('.Left_Arrow')[0].setAttribute("onclick", "shift_left("+index+")");
				$(clone).find('.Remove')[0].setAttribute("onclick", "deleteShadow("+index+")");
				grid.appendChild(clone);
				currentStory.shadows[index] = clone;
			}else if (currentStory.shadows[index].getAttribute('data-shadow-id') != null) {
				//this may be unecessary but we want to make sure the shadows reflect the story
				//this should load new shadows when the story changes
				updateShadow(index, currentStory.shadows[index].getAttribute('data-shadow-id'));
			}
		}
		currentStory.height = height;
		currentStory.width = width;
		updateFooter();
	}
	function drag(evt, index) {
		console.log('dragging...');
		console.log(evt);
		if(index != undefined)
		{
			//do internal drag stuff here
			console.log('we need the index and the shadow here but how to grab?');
			console.log(evt.target);
			evt.dataTransfer.setData("index", index);
		} else {
	  	evt.dataTransfer.setData("shadow", evt.target.id);
		}
	}
	function allowDrop(evt) {
	  evt.preventDefault();
	}
	function drop(evt, caller) {
		evt.preventDefault();
		console.log(evt);
		var data = evt.dataTransfer.getData("shadow");
		if(!data)
		{
				let index = evt.dataTransfer.getData("index");
				let swap_index = caller.getAttribute('data-index');
				swap(index, swap_index);
		}
		else
		{
			console.log('start')
			console.log(data)
			console.log(caller)
			index = caller.getAttribute('data-index')
			id = data;
			addShadow(index, id);
			updateFooter();
			console.log(evt);
		}
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

	function shift_left(index)
	{
		position = index % currentStory.width;
		if(position == 0)
		{
			// TODO what do we do if they try to move left on the edge
			//target = currentStory.width-1;
			return;
		} else {
			swap(index, index-1);
		}
	}

	function shift_right(index)
	{
		position = index % currentStory.width;
		if(position == currentStory.width-1)
		{
			// TODO what do we do if they try to move right on the edge
			return;
		} else {
			swap(index, index+1);
		}
	}

	function shift_up(index)
	{
		row = Math.floor(index / currentStory.width);
		if(row == 0)
		{
			// TODO what do we do if they try to move up on the edge
			return;
		} else {
			swap(index, index-currentStory.width);
		}
	}

	function shift_down(index)
	{
		row = Math.floor(index / currentStory.width);
		if(row == currentStory.height-1)
		{
			// TODO what do we do if they try to move down on the edge
			return;
		} else {
			swap(index, index+parseInt(currentStory.width));
		}
	}

	function swap(index1, index2, undo=false)
	{
		shadow1 = currentStory.shadows[index1].getAttribute("data-shadow-id");
		shadow2 = currentStory.shadows[index2].getAttribute("data-shadow-id");
		updateShadow(index2, shadow1);
		updateShadow(index1, shadow2);
		//temp = currentStory.shadows[index1];
		//currentStory.shadows[index1] = currentStory.shadows[index2];
		//currentStory.shadows[index2] = temp;

		currentStory.shadows[index1].setAttribute("data-index", index1);
		currentStory.shadows[index2].setAttribute("data-index", index2);
		if(undo)
		{
			redo_stack.push(()=>swap(index1,index2));
		}
		else {
			undo_stack.push(()=>swap(index1,index2, true));
		}
	}

	function resize(width, height) {
		let old_shadows = currentStory.shadows;
		let length = Math.min(currentStory.shadows.length, height * width);
		let size_class = "Story_Size_"+width+"w_"+height+"t"
		let orientation = height >= width ? "Portrait_Square" : "Landscape";
		reset(height, width);
		for (var index = 0; index < length; index++)
		{
			if (old_shadows[index].getAttribute("data-shadow-id") != null) {
				updateShadow(index, old_shadows[index].getAttribute("data-shadow-id"));
			}
		}

		if(orientation == "Landscape")
		{
			$('.Story_Grid')[0].setAttribute("class", "Story_Grid Row Justify_Content_Left Align_Items_Center");
		}
		else {
			$('.Story_Grid')[0].setAttribute("class", "Story_Grid Column Justify_Content_Left Align_Items_Center");
		}

		$(".Palette")[0].setAttribute("class", "Palette "+size_class+" Flex_Container")
		$(".Palette_Container")[0].setAttribute("class", "Palette_Container Flex_Container Column "+orientation+" Justify_Content_Center Align_Items_Center")
	}

	function reset(height=currentStory.height, width=currentStory.width) {
		currentStory.shadows = [];
		buildGrid(false, height, width);
	}

	function cascadeShadows(index, shadow)
	{
		console.log(index);
		console.log(currentStory.shadows.length);
		if (index >= currentStory.shadows.length) {
			console.log('we are exiting cascade without checking anything');
			return;//we cannot do anything greater then the current length
		}
		if(index < currentStory.shadows.length && currentStory.shadows[index].getAttribute('data-shadow-id') != null) {
			cascadeShadows(parseInt(index)+1, currentStory.shadows[index].getAttribute('data-shadow-id'));
		}
		updateShadow(index, shadow);

	}

	function addShadow(index, shadow)
	{
		//TODO undo for cascade goes here
		//handle area and possibility of bumping shadows from end of list.

		//handle area and possibility of bumping shadows from end of list.
		//undo_stack.push(()=>deleteShadow(index, true));
		original = []
		for (var i = 0; i < currentStory.height * currentStory.width; i++)
		{
			original[i] = currentStory.shadows[i].getAttribute("data-shadow-id");
		}
		cascadeShadows(index, shadow);
		restore_list.push(original);
		undo_stack.push(()=>{
			console.log('undoing add shadow...');
			restore = restore_list.pop();
			for(var i = 0; i < restore.length; i++)
			{
				updateShadow(i, restore[i]);
				currentStory.shadows[i].setAttribute('data-index', i);
			}
			redo_stack.push(()=>addShadow(index,shadow));
		});
	}

	function deleteShadow(index, undo=false)
	{
		current_shadow = currentStory.shadows[index].getAttribute("data-shadow-id");
		updateShadow(index, null)
		currentStory.shadows[index].setAttribute('data-index', index);
		updateFooter();
		if(undo)
		{
			redo_stack.push(()=>undeleteShadow(index,current_shadow));
		}
		else {
			undo_stack.push(()=>undeleteShadow(index,current_shadow, true));
		}
	}

	function undeleteShadow(index, shadow, undo=false)
	{
		updateShadow(index, shadow);
		updateFooter();
		if(undo)
		{
			redo_stack.push(()=>deleteShadow(index));
		}
		else {
			undo_stack.push(()=>deleteShadow(index, true));
		}
	}
	function updateShadow(index, shadow)
	{
		console.log('updateShadow');
		console.log(index);
		console.log(shadow);
		grid_shadow = currentStory.shadows[index];
		shadow_data = $('#'+shadow)[0];
		image_element = null;
		$(grid_shadow).removeClass("Pan_Shape_Round Pan_Shape_Square Pan_Shape_Rectangle");
		$(grid_shadow).removeClass("Pan_Size_26 Pan_Size_37 Pan_Size_Irregular");

		if (shadow != null){
			$(grid_shadow).addClass("Pan_Shape_"+shadow_data.getAttribute("data-shape"));
			$(grid_shadow).addClass("Pan_Size_"+shadow_data.getAttribute("data-size"));
		} else {
			$(grid_shadow).addClass("Shadow_Image_Container Column Align_Items_Center Justify_Content_Center Pan_Size_26 Pan_Shape_Round");
		}
		if( grid_shadow.getElementsByTagName('img').length > 0)
		{
			image_element = grid_shadow.getElementsByTagName('img')[0];
		} else {
			image_element = document.createElement("img");
			grid_shadow.getElementsByClassName('wrapper')[0].appendChild(image_element);
		}
		if(shadow != null) {
			image_element.src = shadow_data.getElementsByTagName('img')[0].src;

			shadow_attributes = shadow_data.attributes;
			for(index = 0; index < shadow_attributes.length; index++)
			{
				let attribute = shadow_attributes[index];
				if(attribute.name.includes("data-")){
					grid_shadow.setAttribute(attribute.name, attribute.value);
				}

			}
			grid_shadow.setAttribute('data-shadow-id', shadow);
		} else {
			console.log('null removing grid shadow data attributes:');
			console.log(grid_shadow);
			image_element.remove();
			remove_list = [];
			shadow_attributes = grid_shadow.attributes;
			for(index = 0; index < shadow_attributes.length; index++)
			{
				let attribute = shadow_attributes[index];
				if(attribute.name.includes("data-")){
					remove_list.push(attribute.name);
				}
			}
			remove_list.forEach(attribute=>grid_shadow.removeAttribute(attribute));
			console.log(grid_shadow);
		}
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
		resize(currentStory.width, currentStory.height);
		for (var index = 0; index < currentStory.height * currentStory.width; index++)
		{
			shadow = getUrlParam('shadows['+index+']', false);
			if (shadow) {
				console.log('trying to set a shadow:'+index);
				console.log('shadow is:'+shadow)
				updateShadow(index, shadow);
			}
		}
		updateFooter();
	}
	$(document).ready(function(){
		init();
	});
