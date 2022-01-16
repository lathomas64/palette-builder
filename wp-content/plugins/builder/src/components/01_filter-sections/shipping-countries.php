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
			<?php foreach($shipping_options as $option){?>
			<li>
				<input data-filter="<?php echo strtolower(str_replace(" ","-",$option)); ?>" onclick="Toggle_Filter(event, 'shipping');" id="<?php echo $option; ?>" type="checkbox" />
				<label for="<?php echo $option; ?>"><?php echo $option; ?></label>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
