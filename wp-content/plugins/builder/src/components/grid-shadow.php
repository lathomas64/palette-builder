<div  v-for='(shadow, index) in computed_shadows'
			v-bind:class="'Pan_Shape_'+shadow.shape+' Pan_Size_'+shadow.size+' '+shadow.invisible"
			class="Shadow_Image_Container Column Align_Items_Center Justify_Content_Center"
				v-bind:data-index=index
				v-bind:data-shadow-id="shadow.ID"
				v-bind:data-size='shadow.size'
				v-bind:data-height='shadow.height'
				v-bind:data-width='shadow.width'
				v-bind:data-shape='shadow.shape'
				v-bind:data-name='shadow.name'
				v-bind:data-shift='shadow.shift'
				v-bind:data-finish='shadow.finish'
				v-bind:data-color-tag='shadow.color_tag'
				v-bind:data-vividness='shadow.vividness'
				v-bind:data-vividness-sort='shadow.avg_saturation'
				v-bind:data-lightness='shadow.lightness'
				v-bind:data-lightness-sort='shadow.avg_lightness'
				v-bind:data-color-sort='shadow.avg_hue'
				v-bind:data-link='shadow.link'
				v-bind:data-country='shadow.country'
				v-bind:data-ships='shadow.ships'
				v-bind:data-brand='shadow.brand'
				v-bind:data-price='shadow.price'
				onDrop='shadow_story.drop(event, this)'
				ondragover='allowDrop(event)'
				ondragStart='drag(event, this.getAttribute("data-index"))'
				draggable='true'
				>
  <!-- display none for the prototype version when this is used remove display none -->
	<div class="Wrapper" >
		<!-- when we have an image add the image to the wrapper
    <img src="../assets/temp-shadow-imgs/Arsenic.jpg" />
    -->
		<img v-if="shadow.img" :src="shadow.img" />
		<div class="Pan_Shadow Column Justify_Content_Center">
			<?php include "components/pan-controls.php"; ?>
		</div>
	</div>
</div>
