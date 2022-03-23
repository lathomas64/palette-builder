<div class="Brand_Search Filter_Section Column Gap_24">
	<div class="Brand_Characteristics Filter_Section Column Gap_8">
	<div class="Section_Title">
	<div class="Heading">Brand Characteristics</div>
</div>
<div class="Grid_Container Button_Group Gap_8 Justify_Content_Flex_Start">
			<button data-filter="cruelty-free" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="CF"><nobr>Cruelty-Free</nobr></button>
			<button data-filter="veg" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Veg">Vegan</button>
			<button data-filter="independently-owned-indie" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button">Indie</button>
			<button data-filter='eco' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Eco"><nobr>Eco-Friendly</nobr></button>
		<button data-filter='gf' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="GF"><nobr>Gluten Free</nobr></button>
			<button data-filter='halal' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Halal">Halal</button>
			</div>
		</div>
		<div class="Owner_Demographics Filter_Section Column Gap_8">
			<div class="Section_Title">
				<div class="Heading">Owner Demographics</div>
			</div>
			<div class="Grid_Container Button_Group Gap_8 Justify_Content_Flex_Start">
			<button data-filter='aapi' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="AAPI">AAPI</button>
			<button data-filter='black' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Black">Black</button>
			<button data-filter='indigenous' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Indigenous">Indigenous</button>
			<button data-filter='latnix' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Latinx">Latinx</button>
			<button data-filter='lgbtq' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="LGBTQ" type="checkbox" />LGBTQ+</button>
			<button data-filter='woman' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Woman">Woman</button>
		</div>
	</div>
<div class="Brand_Name Filter_Section Column Gap_16">
<div class="Section_Title">
	<div class="Heading">Find a Brand by Name</div>
</div>
<div class="Multi_Select">
	<div class="Search">
		<div class="Input Column Gap_4">
			<label class="Input_Label">Start Typing to Filter List</label>
			<input class="Input" placeholder="Give me a name" type="search" />
		</div>
	</div>
	<div class="Check_List Filterable">
		<ul class="Column Gap_8">
			<?php foreach($brand_list as $brand_id => $brand_name){?>
			<li>
				<input data-filter='<?php echo $brand_id ?>' onclick="Toggle_Filter(event, 'brand');" id="<?php echo $brand_name; ?>" type="checkbox" />
				<label for="<?php echo $brand_name; ?>"><?php echo $brand_name; ?></label>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
</div>
</div>
