<div id="storySortBasic" class="Modal Column Basic_Dropdown Fade_In">
 <div class="Column Gap_16">
  <div class="Panel_Title">
   <div class="Heading">Sort Stories</div>
  </div>
		<div class="Column Gap_8">
							<div class="Check_Row Row Align_Items_Center Gap_4">
							<input class="Check_Select" type="checkbox" id="option1" checked="checked">
							<div class="Custom_Checkbox"></div>
							<label class="Check_Select" for="option1">
							Only single-brand stories
							</label>
			</div>
				<div class="Check_Row Row Align_Items_Center Gap_4">
							<input class="Check_Select" type="checkbox" id="option2">
							<label class="Check_Select" for="option2">
							Only same-size stories
							</label>
			</div>
		</div>
  <div class="Column Gap_0">
      <!-- data-name, data-publish-date data-size data-price Story_Card -->
				<input onclick="sort('data-publish-date', 'Story_Card', false);" class="Single_Select" type="radio" id="publish-new-old">
				<label class="Single_Select" for="publish-new-old">
				Publish Date: New to Old
				</label>
        <input onclick="sort('data-publish-date', 'Story_Card', true);" class="Single_Select" type="radio" id="publish-old-new">
				<label class="Single_Select" for="publish-old-new">
				Publish Date: Old to New
				</label>
        <input onclick="sort('data-price', 'Story_Card', false);" class="Single_Select" type="radio" id="price-high-low">
				<label class="Single_Select" for="price-high-low">
				Story Price: High to Low
				</label>
        <input onclick="sort('data-price', 'Story_Card', true);" class="Single_Select" type="radio" id="price-low-high">
				<label class="Single_Select" for="price-low-high">
				Story Price: Low to High
				</label>
        <input onclick="sort('data-size', 'Story_Card', false);" class="Single_Select" type="radio" id="size-small-large">
				<label class="Single_Select" for="size-small-large">
				Story Size: Small to Large
				</label>
        <input onclick="sort('data-size', 'Story_Card', true);" class="Single_Select" type="radio" id="size-large-small">
				<label class="Single_Select" for="size-large-small">
				Story Size: Large to Small
				</label>
        <input onclick="sort('data-name', 'Story_Card', false);" class="Single_Select" type="radio" id="name-a-z">
				<label class="Single_Select" for="name-a-z">
				Name: A to Z
				</label>
        <input onclick="sort('data-name', 'Story_Card', true);" class="Single_Select" type="radio" id="name-z-a">
				<label class="Single_Select" for="name-z-a">
				Name: Z to A
				</label>
		</div>

 </div>
</div>
