<?php
/**
Template name: ShadowTest
design: https://www.figma.com/file/FckXtNi9zlIb2qkLXsstVX/v1---Design---Palette-Builder?node-id=0%3A1
interactions(outdated): https://xd.adobe.com/view/8b60cc5e-3fde-4dee-aaa0-da29909116f6-de33/screen/5d364e8c-1e4a-455e-b122-0aa75ad9f87c
/usr/share/wordpress/wp-content/themes/twentynineteen

 */

?>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.12/lib/draggable.bundle.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<div class='container-fluid'>
	<div class='row'>
		<div class='col-7' style="border:1px solid black;">
			<div class='row' id='pb-footer'>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Small-Black.png' onclick="alert('This should expand a menu, but we don't have that yet. Sorry')"></img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/start_over.png' onclick="reset()">Start Over</img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector1.png' onclick="alert('saving not implemented yet. Sorry')">Save</img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector2.png' onclick="share();">Share</img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector3.png' onclick="alert('redo not implemented yet. Sorry')">Redo</img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector4.png' onclick="alert('undo not implemented yet. Sorry')">Undo</img>
				<img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector5.png' onclick="rotate()">Rotate</img>
			</div>
			<div class='row' id='pb-main'>
			<!--<img src='palette.png'></img>-->
			<div id='palette-grid' class='col palette'> <!-- in future this will be dynamic -->
				<div class='row'>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
				</div>
				<div class='row'>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
				</div>
				<div class='row'>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
					<div class='col' ondrop="drop(event, this)" style="border:1px solid black;" ondragover="allowDrop(event)" >&nbsp;</div>
				</div>
			</div>
			</div>
			<div class='row' id='pb-footer'>
				Your Palette:
				Shadows <span id='shadow-count'>0</span>
				Brands <span id='story-brands'>0</span>
				Countries <span id='story-countries'>0</span>
				
				Estimated Price (USD) 
				$<span id='story-price'>0</span> Plus shipping
				
				<button onclick="alert('Build shopping list page not implemented yet. Sorry');">Build Shopping List</button>
			</div>
		</div>
		
		<div class='col-4' id='pb-secondary' style="border:1px solid black;">
			<div id='size' class='section-content'>
				<!--<img src="size_panel.png"></img>-->
				<h2>Change Color Story Size</h2>
				<div>about this panel</div>
				Showing 14 sizes Filter sizes: <button onclick="alert('not implemented yet. Sorry!');">all</button><button onclick="alert('not implemented yet. Sorry!');">Small</button><button onclick="alert('not implemented yet. Sorry!');">Medium</button><button onclick="alert('not implemented yet. Sorry!');">Large</button>
				<div class='row'>
					<div class='col' onclick="buildGrid(event, 3, 3)">9 pans</div>
					<div class='col' onclick="buildGrid(event, 3, 4)">12 pans</div>
					<div class='col' onclick="buildGrid(event, 2, 7)">14 pans</div>
					<div class='col' onclick="buildGrid(event, 3, 5)">15 pans</div>
				</div>
			</div>
			<div id='shadows' class='section-content'>
				<h2> Find Eyeshadows</h2>
				showing 00 shadows. Click or Drag to select. <button onclick="alert('not implemented yet. Sorry!');">Filters</button> <button onclick="alert('not implemented yet. Sorry!');">Sort</button>
				<div id='shadowList'>
					<?php
					 $args = array(  
						'post_type' => 'shadow',
						'post_status' => 'publish',
						'posts_per_page' => -1, 
						'orderby' => 'title', 
						'order' => 'ASC',
						'cat' => 'home',
					);
					
					$loop = new WP_Query( $args ); 
					echo '<span> Your Results ' . $loop->found_posts . ' shadows';
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php 
							$brand = get_field('brand');
						?>
						<div>
							<p><?php the_title(); ?></p>
							<img data-country='<?php echo get_post_field('country', $brand[0]); ?>' data-brand='<?php echo get_post_field('post_title', $brand[0]);?>' data-price='<?php echo get_field('price') ?>' id='<?php the_ID(); ?>' width=112 height=112 class='shadow' src="<?php echo get_field('pan_photo')['url']; ?>" draggable="true" ondragstart="drag(event)"></img>
						</div>
					<?php
						//echo '<div>';
						//the_title();
						//get_the_id();
						//$image = get_post_custom_values("pan_photo");
						//echo '</div>';
						// the_meta();
						//$keys = get_post_custom_keys();
						/*foreach ( (array) $keys as $key ) {
							$values = array_map( 'trim', get_post_custom_values( $key ) );
							$value  = implode( ', ', $values );
							echo '<tr>';
							echo $value;
							echo '</tr>';
						}*/
					endwhile;

					wp_reset_postdata();
				?>
				</div>
			</div>
			<div id='stories' class='section-content'>
				<h2> Community Color Stories</h2>
				<hr>
				<div>about this panel</div>
				Showing 00 color stories <button onclick="alert('not implemented yet. Sorry!');">Options</button> <button onclick="alert('not implemented yet. Sorry!');">Sort</button>
			</div>
			<div id='yours' class='section-content'>
				<h2> Your Saved Color Stories</h2>
				<hr>
				<div>about this panel</div>
				Showing 00 color stories <button onclick="alert('not implemented yet. Sorry!');">Options</button> <button onclick="alert('not implemented yet. Sorry!');">Sort</button>
			</div>
		</div>
		
		<div class='col-1' id='pb-sidebar' style="border:1px solid black;">
			<h2> Find Stuff</h2>
			<hr>
			<button class='section-link' onclick="openTab(event, 'size')"><img src="http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/size_icon.png"></img></button>
			<button class='section-link' onclick="openTab(event, 'shadows')"><img src="http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/shadow_icon.png"></img></button>
			<button class='section-link' onclick="openTab(event, 'stories')"><img src="http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/stories_icon.png"></img></button>
			<button class='section-link' onclick="openTab(event, 'yours')"><img src="http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/yours_icon.png"></img></button>
		</div>
	</div>
</div>
	<script>
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
	init();
	</script>
