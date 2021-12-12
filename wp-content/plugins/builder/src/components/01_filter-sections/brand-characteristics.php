<div class="Brand_Search Filter_Section Column Gap_24">
	<div class="Brand_Characteristics Filter_Section Column Gap_8">
	<div class="Section_Title">
	<div class="Heading">Brand Characteristics</div>
</div>
<div class="Button_Group">
	<ul class="Row Gap_8 Justify_Content_Flex_Start">
		<li>
			<input data-filter="cruelty-free" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="CF" type="checkbox" />
			<label class="Filter_Button" for="CF"><nobr>Cruelty-Free</nobr></label>
		</li>
		<li>
			<input data-filter="veg" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Veg" type="checkbox" />
			<label class="Filter_Button" for="Veg">Vegan</label>
		</li>
		<li>
			<input data-filter="independently-owned-indie" onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Indie" type="checkbox" />
			<label class="Filter_Button" for="Indie">Indie</label>
		</li>
		<li>
		<li>
			<input data-filter='eco' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Eco" type="checkbox" />
			<label class="Filter_Button" for="Eco"><nobr>Eco-Friendly</nobr></label>
		</li>
			<input data-filter='gf' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="GF" type="checkbox" />
			<label class="Filter_Button" for="GF"><nobr>Gluten Free</nobr></label>
		</li>
		<li>
			<input data-filter='halal' onclick='Toggle_Filter(event, "characteristics");' class="Filter_Button" id="Halal" type="checkbox" />
			<label class="Filter_Button" for="Halal">Halal</label>
		</li>
	</ul>
</div>
	</div>
	<div class="Owner_Demographics Filter_Section Column Gap_8">
	<div class="Section_Title">
	<div class="Heading">Owner Demographics</div>
</div>
<div class="Button_Group">
	<ul class="Row Gap_8 Justify_Content_Flex_Start">
		<li>
			<input data-filter='aapi' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="AAPI" type="checkbox" />
			<label class="Filter_Button" for="AAPI">AAPI</label>
		</li>
			<input data-filter='black' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Black" type="checkbox" />
			<label class="Filter_Button" for="Black"><nobr>	Black</nobr></label>
		</li>
		<li>
			<input data-filter='indigenous' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Indigenous" type="checkbox" />
			<label class="Filter_Button" for="Indigenous">Indigenous</label>
		</li>
		<li>
			<input data-filter='latnix' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Latinx" type="checkbox" />
			<label class="Filter_Button" for="Latinx">Latinx</label>
		</li>
		<li>
			<input data-filter'woman' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="Woman" type="checkbox" />
			<label class="Filter_Button" for="Woman">Woman</label>
		</li>
		<li>
			<input data-filter='lgbtq' onclick='Toggle_Filter(event, "demographics");' class="Filter_Button" id="LGBTQ" type="checkbox" />
			<label class="Filter_Button" for="LGBTQ">LGBTQ+</label>
		</li>
	</ul>
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
			<?php foreach($brand_list as $brand){?>
			<li>
				<input onclick="Toggle_Filter(event, 'brand');" id="<?php echo $brand; ?>" type="checkbox" />
				<label for="<?php echo $brand; ?>"><?php echo $brand; ?></label>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
</div>
</div>
