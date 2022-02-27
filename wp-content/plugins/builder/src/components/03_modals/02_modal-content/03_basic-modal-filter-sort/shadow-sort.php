<div id="shadowSortBasic" class="Dropdown Column Basic_Dropdown Fade_In">
 <div class="Column Gap_16">
  <div class="Panel_Title">
   <div class="Heading">Sort Shadows</div>
  </div>
  <div class="Column Gap_0">
							<input onclick="SORT_FIELD='price';SORT_DIRECTION='desc';update();" class="Single_Select" type="radio" id="shadow_sort_price_high_low">
				<label class="Single_Select" for="shadow_sort_price_high_low">
				Price: High to Low
				</label>
				<input onclick="SORT_FIELD='price';SORT_DIRECTION='asc';update();" class="Single_Select" type="radio" id="shadow_sort_price_low_high">
				<label class="Single_Select" for="shadow_sort_price_low_high">
				Price: Low to High
				</label>
				<input onclick="sort_children('data-color-sort', '#Shadow_Search .Results .Grid', true);" class="Single_Select" type="radio" id="shadow_sort_color">
				<label class="Single_Select" for="shadow_sort_color">
				Color
				</label>
			<input onclick="sort_children('data-color-sort', '#Shadow_Search .Results .Grid', false);" class="Single_Select" type="radio" id="shadow_sort_color_reverse">
				<label class="Single_Select" for="shadow_sort_color_reverse">
				Color Reverse
				</label>
				<input onclick="sort_children('data-lightness-sort', '#Shadow_Search .Results .Grid', false);" class="Single_Select" type="radio" id="shadow_sort_lightness_light_dark">
				<label class="Single_Select" for="shadow_sort_lightness_light_dark">
				Light to Dark
				</label>
				<input onclick="sort_children('data-lightness-sort', '#Shadow_Search .Results .Grid', true);" class="Single_Select" type="radio" id="shadow_sort_lightness_dark_light">
				<label class="Single_Select" for="shadow_sort_lightness_dark_light">
				Dark to Light
				</label>
        <input onclick="sort_children('data-vividness-sort', '#Shadow_Search .Results .Grid', false);" class="Single_Select" type="radio" id="shadow_sort_vividness_vm">
				<label class="Single_Select" for="shadow_sort_vividness_vm">
				Vivid to Muted
				</label>
				<input onclick="sort_children('data-vividness-sort', '#Shadow_Search .Results .Grid', true);" class="Single_Select" type="radio" id="shadow_sort_vividness_mv">
				<label class="Single_Select" for="shadow_sort_vividness_mv">
				Muted to Vivid
				</label>
				<input onclick="sort_children('data-name', '#Shadow_Search .Results .Grid', true);" class="Single_Select" type="radio" id="shadow_sort_name_az">
				<label class="Single_Select" for="shadow_sort_name_az">
				Name: A to Z
				</label>
				<input onclick="sort_children('data-name', '#Shadow_Search .Results .Grid', false);" class="Single_Select" type="radio" id="shadow_sort_name_za">
				<label class="Single_Select" for="shadow_sort_name_za">
				Name: Z to A
				</label>
				<input onclick="sort_children('data-brand', '#Shadow_Search .Results .Grid', false);" class="Single_Select" type="radio" id="shadow_sort_brand_za">
				<label class="Single_Select" for="shadow_sort_brand_za">
				Shadow Brand: Z to A
				</label>
				<input onclick="sort_children('data-brand', '#Shadow_Search .Results .Grid', true);" class="Single_Select" type="radio" id="shadow_sort_brand_az">
				<label class="Single_Select" for="shadow_sort_brand_az">
				Shadow Brand: A to Z
				</label>
		</div>

 </div>
</div>
