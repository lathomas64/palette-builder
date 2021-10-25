<?php
/**
design: https://www.figma.com/file/FckXtNi9zlIb2qkLXsstVX/v1---Design---Palette-Builder?node-id=0%3A1
interactions(outdated): https://xd.adobe.com/view/8b60cc5e-3fde-4dee-aaa0-da29909116f6-de33/screen/5d364e8c-1e4a-455e-b122-0aa75ad9f87c

 */

?>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.12/lib/draggable.bundle.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel='stylesheet' href="http://pb.rainbowcapitalism.com/wp-content/plugins/builder/css/builder.css">
<div class='container-fluid'>
	<div class='row'>
		<div class='col-7' style="border:1px solid black;display:flex;flex-direction:column;">
			<div class='row' id='pb-header'>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Small-Black.png' onclick="alert('This should expand a menu, but we don't have that yet. Sorry')"></img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/start_over.png' onclick="reset()">Start Over</img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector1.png' onclick="alert('saving not implemented yet. Sorry')">Save</img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector2.png' onclick="share();">Share</img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector3.png' onclick="alert('redo not implemented yet. Sorry')">Redo</img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector4.png' onclick="alert('undo not implemented yet. Sorry')">Undo</img></span>
				<span><img src='http://pb.rainbowcapitalism.com/wp-content/uploads/2021/05/Vector5.png' onclick="rotate()">Rotate</img></span>
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
				<div id='meta-with-title'>
					Your Palette:
					<span>Shadows <span id='shadow-count'>0</span></span>
					<span>Brands <span id='story-brands'>0</span></span>
					<span>Countries <span id='story-countries'>0</span></span>
				</div>
				
				<div id='price'>
					<span>Estimated Price (USD) 
					$<span id='story-price'>0</span> Plus shipping</span>
					
					<button id='build-list' onclick="alert('Build shopping list page not implemented yet. Sorry');">Build Shopping List</button>
				</div>
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
				showing 00 shadows. Click or Drag to select. <button onclick="document.getElementById('modal-shadow-filter').style.display = 'block'">Filters</button> <button onclick="alert('not implemented yet. Sorry!');">Sort</button>
				<div id='modal-shadow-filter' class='modal'>
					<button class="close" onclick="document.getElementById('modal-shadow-filter').style.display = 'none'">&times;</button>
					<div class="modal-content">
						<?php include "components/shadow-filters.php" ?>
					</div>					
				</div>
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
<script src="http://pb.rainbowcapitalism.com/wp-content/plugins/builder/js/builder.js"></script>