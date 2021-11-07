var currentStory = new Object();
	undo_stack = [];
	redo_stack = [];
	restore_list = [];
	overflow_shadows = [];
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

	function setAside(shadow)
	{
		shadow_data = $('#'+shadow)[0];
		if(shadow_data !== undefined)
		{
			prototype = $(".Results_Container .Grid")[0].children[0];
			aside_shadow = prototype.cloneNode(true);
			aside_shadow.removeAttribute("id");
			$(aside_shadow).removeClass("Pan_Shape_Round Pan_Shape_Square Pan_Shape_Rectangle");
			$(aside_shadow).removeClass("Pan_Size_26 Pan_Size_37 Pan_Size_Irregular");
			$(aside_shadow).addClass("Pan_Shape_"+shadow_data.getAttribute("data-shape"));
			$(aside_shadow).addClass("Pan_Size_"+shadow_data.getAttribute("data-size"));
			$(aside_shadow).removeClass("Invisible");
			image_element = aside_shadow.getElementsByTagName('img')[0];
			image_element.src = shadow_data.getElementsByTagName('img')[0].src;

			shadow_attributes = shadow_data.attributes;
			for(index = 0; index < shadow_attributes.length; index++)
			{
				let attribute = shadow_attributes[index];
				if(attribute.name.includes("data-")){
					aside_shadow.setAttribute(attribute.name, attribute.value);
				}

			}
			aside_shadow.setAttribute('data-shadow-id', shadow);
			$('.Set_Aside').append(aside_shadow);
			//add aside_shadow to the set aside list
		}
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
		currentStory.brands = brands;
		currentStory.countries = countries;
		currentStory.shadowCount = shadowCount;
		document.getElementById('Footer_Shadow_Count').innerHTML=shadowCount.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Brand_Count').innerHTML=brands.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Country_Count').innerHTML=countries.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Footer_Story_Price').innerHTML="$"+price.toFixed(2);

		document.getElementById('Shopping_List_Shadow_Count').innerHTML=shadowCount.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Shopping_List_Brand_Count').innerHTML=brands.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Shopping_List_Country_Count').innerHTML=countries.length.toLocaleString("en-US", {"minimumIntegerDigits":2});
		document.getElementById('Shopping_List_Story_Price').innerHTML="$"+price.toFixed(2);

	}
	function buildGrid(evt, height, width) {
		console.log('buildGrid called');
		grid = document.getElementById('Story_Grid');
		//updateShadow(0, null); //clear out first shadow for prototype
		prototype = grid.firstChild.cloneNode(true);

		image_element = prototype.getElementsByTagName('img')[0];
		if(image_element !== undefined)
		{
				image_element.remove();
		}
		remove_list = [];
		shadow_attributes = prototype.attributes;
		for(index = 0; index < shadow_attributes.length; index++)
		{
			let attribute = shadow_attributes[index];
			if(attribute.name.includes("data-")){
				remove_list.push(attribute.name);
			}
		}
		$(prototype).addClass('Invisible');
		remove_list.forEach(attribute=>prototype.removeAttribute(attribute));

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
				clone.setAttribute('draggable', 'true');
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
		if(index != undefined)
		{
			//do internal drag stuff here
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

	function resize(width, height, undo=false) {
		let old_shadows = currentStory.shadows;
		let length = Math.min(currentStory.shadows.length, height * width);
		let size_class = "Story_Size_"+width+"w_"+height+"t"
		let orientation = height >= width ? "Portrait_Square" : "Landscape";

		if(!undo){
			original = []
			for (var i = 0; i < currentStory.height * currentStory.width; i++)
			{
				original[i] = currentStory.shadows[i].getAttribute("data-shadow-id");
			}
			restore_list.push(original);
			old_height = currentStory.height;
			old_width = currentStory.width;
			undo_stack.push(()=>{
				console.log('undoing resize...');
				resize(old_width, old_height,true);
				restore = restore_list.pop();
				for(var i = 0; i < restore.length; i++)
				{
					updateShadow(i, restore[i]);
					currentStory.shadows[i].setAttribute('data-index', i);
				}
				redo_stack.push(()=>resize(width, height));
			});
		}
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
		updateFooter();
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
		if(index < currentStory.shadows.length-1 && currentStory.shadows[index].getAttribute('data-shadow-id') != null) {
			cascadeShadows(parseInt(index)+1, currentStory.shadows[index].getAttribute('data-shadow-id'));
		} else if(index == currentStory.shadows.length-1 && currentStory.shadows[index].getAttribute('data-shadow-id') != null) {
			console.log('overflow');
			overflow_shadows.push(currentStory.shadows[index].getAttribute('data-shadow-id'));
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
			updateFooter();
			redo_stack.push(()=>addShadow(index,shadow));
		});
	}

	function deleteShadow(index, undo=false)
	{
		current_shadow = currentStory.shadows[index].getAttribute("data-shadow-id");
		setAside(current_shadow);
		updateShadow(index, null);
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
			$(grid_shadow).removeClass("Invisible");

		} else {
			$(grid_shadow).addClass("Shadow_Image_Container Column Align_Items_Center Justify_Content_Center Pan_Size_26 Pan_Shape_Round Invisible");
		}
		if( grid_shadow.getElementsByTagName('img').length > 0)
		{
			image_element = grid_shadow.getElementsByTagName('img')[0];
		} else {
			image_element = document.createElement("img");
			//grid_shadow.getElementsByClassName('wrapper')[0].appendChild(image_element);
			wrapper = grid_shadow.getElementsByClassName('wrapper')[0];
			wrapper.insertBefore(image_element, wrapper.firstChild);
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
			$(grid_shadow).find('.Shadow_Name').text(grid_shadow.getAttribute('data-name'));
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

	function update_shadow_detail(shadow)
	{
		source_img = shadow.find('img').attr('src');
		console.log(source_img);
		shape = shadow.attr('data-shape');
		size = shadow.attr('data-size');
		height = shadow.attr('data-height');
		width = shadow.attr('data-width');
		name = shadow.attr('data-name');
		brand = shadow.attr('data-brand');
		//price shift finish color-family color-temp vivdness lightness
		price = shadow.attr('data-price');
		shift = shadow.attr('data-shift');
		finish = shadow.attr('data-finish');
		color_tag = shadow.attr('data-color-tag');
		temp = shadow.attr('data-color-temp');
		vividness = shadow.attr('data-vividness');
		lightness = shadow.attr('data-lightness');
		image_classes = "Shadow_Image_Container Column Align_Items_Center ";
		image_classes += "Justify_Content_Center Pan_Size_";
		image_classes += size;
		image_classes += " Pan_Shape_";
		image_classes += shape;
		image_classes += " Pan_Height_";
		image_classes += height;
		image_classes += " Pan_Width_";
		image_classes += width;
		$("#shadowDetail img").attr("src", source_img);
		$("#shadowDetail .Shadow_Image_Container").attr("class", image_classes);
		$("#shadowDetail .Shadow_Name").text(name);
		$("#shadowDetail .Shadow_Brand").text(brand);
		if(width == height)
		{
			$('#shadowDetail ul').children()[0].children[1].textContent = width + "mm";
		} else {
			$('#shadowDetail ul').children()[0].children[1].textContent = width + "mm x " + height + "mm";
		}
		$('#shadowDetail ul').children()[1].children[1].textContent = shape;
		$('#shadowDetail ul').children()[2].children[1].textContent = price;
		$('#shadowDetail ul').children()[3].children[1].textContent = shift;
		$('#shadowDetail ul').children()[4].children[1].textContent = finish;
		$('#shadowDetail ul').children()[5].children[1].textContent = color_tag;
		$('#shadowDetail ul').children()[6].children[1].textContent = vividness;
		$('#shadowDetail ul').children()[7].children[1].textContent = lightness;
	}

	function search_shadows(query)
	{
		var count = 0;
		$(".Results .Single_Pan_Card").each(
			function(index, element){
				card = $(element);
				text = card.find(".Shadow_Name").text().toLowerCase();
				if(text.includes(query.toLowerCase()))
				{
					count += 1;
					card.removeClass("Hidden");
				} else {
					card.addClass("Hidden");
				}
			});
			$("#Shadow_Count").text("Showing "+count+" shadow(s)");
	}

	function flatten_story() {
		story = []
		for(var index = 0; index < currentStory.shadows.length; index++)
		{
			story.push(currentStory.shadows[index].getAttribute('data-shadow-id'));
		}
		return story;
	}

	function save() {
		console.log('This should save the current story to the current logged in user');
		name = prompt('What do you want to name the current story?');
		currentStory.name = name;
		jQuery.ajax({
						url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
						method: 'POST',
						data: {
								'action':'save_story', // This is our PHP function below
								'name': name,
								'height': currentStory.height,
								'width': currentStory.width,
								'story': flatten_story()
						},
						success:function(data) {
							console.log(data);
						}
		});
	}
	function load_story(event, element) {
		var story = JSON.parse(element.getAttribute("data-story-json"));
		if(story != null){
			console.log(story);
			resize(story.width, story.height);
			for(var index = 0; index < story.shadows.length; index++){
				updateShadow(index, story.shadows[index]);
			}
			updateFooter();
		}
	}
	function build_story_card(story){
		template = $(".Search_Grid_Card_Template")[0];
		width = story["width"];
		height = story["height"];
		card = $(template).clone();
		card_class = "Search_Grid_Card Story_Card Column Story_Size_"+width+"w_"+height+"t"
		card.attr("class", card_class);
		card.attr("onclick", "load_story(event, this);");
		card.find('.Card_Title').text(story["name"]);
		card.attr("data-publish-date", story["published"]);
		card.attr("data-name", story["name"]);
		card.attr("data-size", story["size"]);
		card.attr("data-price", story["price"]);
		card.attr("data-story-json", JSON.stringify(story));

		card.find('.Wrapper').css({
			"grid-template-columns" : "repeat(" + width + ", 1fr)",
			"grid-template-rows" : "repeat(" + height + ", 1fr)"
		}
		);

		var circle = $("#circleTemplate");
		for (
			let circles = 0;
			circles < width * height;
			circles++
		) {
			card.find('.Wrapper').append(circle.clone());
		}
		return card;
	}

	function pull_user_stories() {
		$("#User_Story_Target .Filter_Button_Filter");
		jQuery.ajax({
						url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
						method: 'POST',
						data: {
								'action':'user_stories', // This is our PHP function below
						},
						success:function(data) {
							console.log(data);
							parsed = JSON.parse(data);
							grid = $("#User_Story_Target .Story_Size");
							while(grid.children().length){
								grid.children()[0].remove();
							}
							for(var index = 0; index < parsed.length; index++){
								console.log(parsed[index]);
								card = build_story_card(parsed[index]);
								$("#User_Story_Target .Story_Size").append(card);
							}
						}
		});
	}

	function pull_community_stories() {
		jQuery.ajax({
						url: '/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
						method: 'POST',
						data: {
								'action':'community_stories', // This is our PHP function below
						},
						success:function(data) {
							console.log(data);
							parsed = JSON.parse(data);
							grid = $("#Community_Story_Target .Story_Size")
							while(grid.children().length){
								grid.children()[0].remove();
							}
							for(var index = 0; index < parsed.length; index++){
								console.log(parsed[index]);
								card = build_story_card(parsed[index]);
								card.addClass("Community_Story_Card");
								$("#Community_Story_Target .Story_Size").append(card);
							}
						}
		});
	}

	function register_modal(buttonTarget, modalTarget)
	{
		var container = $(modalTarget);
		var dropdownBtn = $(buttonTarget);

		dropdownBtn.click(function(){

		var activePanel = dropdownBtn.closest('.Active_Panel');
		var dropdownLoc = activePanel.find('.Helper_Box').outerHeight() + activePanel.find(".Results_Control_Bar").outerHeight() + $(".Active_Panel .Helper_Box:not('.Closed')").length * 32;
					container.css(
						"top", dropdownLoc
					);
		container.toggleClass("On");
		dropdownBtn.toggleClass("Selected");
		});
		$(document).click(function() {

			if (
						!container.is(event.target) &&
						!container.has(event.target).length &&
						!dropdownBtn.is(event.target) &&
						!dropdownBtn.has(event.target).length
					) {
	     container.removeClass("On");
						$(buttonTarget).removeClass("Selected");
	    }
		});
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
				updateShadow(index, shadow);
			}
		}
		updateFooter();
	}
	$(document).ready(function(){
		init();
		register_modal("#Community_Story_Target .Filter_Button_Filter", "#CommunityStoryFilterBasic");
		register_modal("#User_Story_Target .Filter_Button_Filter", "#UserStoryFilterBasic");
		register_modal("#Community_Story_Target .Filter_Button_Sort", "#CommunityStorySortBasic");
		register_modal("#User_Story_Target .Filter_Button_Sort", "#UserStorySortBasic");
		register_modal("#shadowSortBtn", "#shadowSortBasic");
		register_modal("#shadowFilterBtn", "#shadowFilterBasic");
	});
