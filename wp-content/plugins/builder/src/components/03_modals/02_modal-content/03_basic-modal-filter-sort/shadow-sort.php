<div id="shadowSortBasic" class="Dropdown Column Basic_Dropdown Fade_In">
 <div class="Column Gap_16">
  <div class="Panel_Title">
   <div class="Heading">Sort Shadows</div>
  </div>
  <div class="Column Gap_0">
							<input onclick="shadow_list.sort('price', 'desc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_price_high_low">
				<label class="Single_Select" for="shadow_sort_price_high_low">
				Price: High to Low
				</label>
				<input onclick="shadow_list.sort('price', 'asc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_price_low_high">
				<label class="Single_Select" for="shadow_sort_price_low_high">
				Price: Low to High
				</label>
				<input onclick="shadow_list.sort('color', 'asc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_color">
				<label class="Single_Select" for="shadow_sort_color">
				Color
				</label>
			<input onclick="shadow_list.sort('color', 'desc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_color_reverse">
				<label class="Single_Select" for="shadow_sort_color_reverse">
				Color Reverse
				</label>
				<input onclick="shadow_list.sort('lightness', 'desc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_lightness_light_dark">
				<label class="Single_Select" for="shadow_sort_lightness_light_dark">
				Light to Dark
				</label>
				<input onclick="shadow_list.sort('lightness', 'asc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_lightness_dark_light">
				<label class="Single_Select" for="shadow_sort_lightness_dark_light">
				Dark to Light
				</label>
        <input onclick="shadow_list.sort('vividness', 'desc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_vividness_vm">
				<label class="Single_Select" for="shadow_sort_vividness_vm">
				Vivid to Muted
				</label>
				<input onclick="shadow_list.sort('vividness', 'asc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_vividness_mv">
				<label class="Single_Select" for="shadow_sort_vividness_mv">
				Muted to Vivid
				</label>
				<input onclick="shadow_list.sort('title', 'asc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_name_az">
				<label class="Single_Select" for="shadow_sort_name_az">
				Name: A to Z
				</label>
				<input onclick="shadow_list.sort('title', 'desc');sort_label(this);" class="Single_Select" type="radio" id="shadow_sort_name_za">
				<label class="Single_Select" for="shadow_sort_name_za">
				Name: Z to A
				</label>
		</div>

 </div>
</div>
