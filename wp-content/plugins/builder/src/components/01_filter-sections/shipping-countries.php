<?php

$shipping_countries = get_terms(array(
    'taxonomy' => 'tax_shipping',
    'hide_empty' => false,
));
?>
<div class="Section_Title">
	<div class="Heading">Shipping Country</div>
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
			<!-- we may have issues here because of ids being duplicated across instances of shipping countries -->
			<?php foreach($shipping_countries as $option){?>
			<li>
				<!-- <?php print_r($option); ?> -->
				<input data-filter="<?php echo $option->slug; ?>" onclick="Toggle_Filter(this, 'shipping');" id="<?php echo $option->name; ?>" type="checkbox" />
				<label for="<?php echo $option->name; ?>"><?php echo $option->name; ?></label>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
