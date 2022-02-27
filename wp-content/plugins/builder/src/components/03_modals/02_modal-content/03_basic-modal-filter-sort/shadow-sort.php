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
				<input onclick="SORT_FIELD='color';SORT_DIRECTION='asc';update();" class="Single_Select" type="radio" id="shadow_sort_color">
				<label class="Single_Select" for="shadow_sort_color">
				Color
				</label>
			<input onclick="SORT_FIELD='color';SORT_DIRECTION='desc';update();" class="Single_Select" type="radio" id="shadow_sort_color_reverse">
				<label class="Single_Select" for="shadow_sort_color_reverse">
				Color Reverse
				</label>
				<input onclick="SORT_FIELD='lightness';SORT_DIRECTION='desc';update();" class="Single_Select" type="radio" id="shadow_sort_lightness_light_dark">
				<label class="Single_Select" for="shadow_sort_lightness_light_dark">
				Light to Dark
				</label>
				<input onclick="SORT_FIELD='lightness';SORT_DIRECTION='asc';update();" class="Single_Select" type="radio" id="shadow_sort_lightness_dark_light">
				<label class="Single_Select" for="shadow_sort_lightness_dark_light">
				Dark to Light
				</label>
        <input onclick="SORT_FIELD='vividness';SORT_DIRECTION='desc';update();" class="Single_Select" type="radio" id="shadow_sort_vividness_vm">
				<label class="Single_Select" for="shadow_sort_vividness_vm">
				Vivid to Muted
				</label>
				<input onclick="SORT_FIELD='vividness';SORT_DIRECTION='asc';update();" class="Single_Select" type="radio" id="shadow_sort_vividness_mv">
				<label class="Single_Select" for="shadow_sort_vividness_mv">
				Muted to Vivid
				</label>
				<input onclick="SORT_FIELD='name';SORT_DIRECTION='asc';update();" class="Single_Select" type="radio" id="shadow_sort_name_az">
				<label class="Single_Select" for="shadow_sort_name_az">
				Name: A to Z
				</label>
				<input onclick="SORT_FIELD='name';SORT_DIRECTION='desc';update();" class="Single_Select" type="radio" id="shadow_sort_name_za">
				<label class="Single_Select" for="shadow_sort_name_za">
				Name: Z to A
				</label>
		</div>

 </div>
</div>
