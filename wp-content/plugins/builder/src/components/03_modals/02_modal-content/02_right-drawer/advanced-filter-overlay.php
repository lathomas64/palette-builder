<div id ="advancedFilters" class="Sticky Shadow_Filters Row Justify_Content_Space_Between">
		<div class="Panel_Title">
			<div class="Heading">Find Shadows</div>
		</div>
		<div class="Row Gap_16">
			<button class="Toggle_Accordion Text_Button Button_Micro Row Gap_4 Align_Items_Center">
				<div class="Icon_Container Column Justify_Content_Center">
					<svg class="svgMinus Hidden" width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1.40336H0V0.260498H8V1.40336Z" fill="#959595"></path></svg>
					<svg class="svgPlus" width="8" height="8" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M14 8H8V14H6V8H0V6H6V0H8V6H14V8Z"></path>
					</svg>
					</div>
				<div class="text">Open All</div>
			</button>
			<button class="Reset Text_Button Icon_Button Row Gap_4 Align_Items_Center">
				<div class="Icon_Container">
					<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.571429 8L0 7.42857L3.42857 4L0 0.571429L0.571429 0L4 3.42857L7.42857 0L8 0.571429L4.57143 4L8 7.42857L7.42857 8L4 4.57143L0.571429 8Z" ></path>
				</svg>
					</div>
				<div class="Text_Button" onclick="shadow_list.reset_filters();">reset all filters</div>
			</button>
			<button id="afCloseBtn" class="Text_Button Icon_Button Row Gap_4 Align_Items_Center Close">
			<div class="Icon_Container">
				<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.645 0L7 5.355L12.355 0L14 1.65667L7 8.65667L0 1.65667L1.645 0Z" fill="#none"/>
				</svg>
			</svg>
			</div>
			<div>Close</div></button>
		</div>
</div>
<div id="advancedFilterContent" class="Panel_Content  Advanced_Filters Column Gap_40">
	<div class="Column Gap_16">
		<div class="Accordion">
			<div class="Panel">
						<div class="Trigger Title Row Space_Between Align_Items_Center">
							<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
								<div class="Heading">Shadow Properties</div>
							</div>
						</div>
							<div class="Content">
								<div class="Column Gap_24">
									<div class="Color Filter_Section Column Gap_16">
									<?php include "components/01_filter-sections/color.php"; ?>
									<?php include "components/01_filter-sections/vividness.php"; ?>
									<?php include "components/01_filter-sections/lightness.php"; ?>
								</div>
							</div>
							<div class="Filter_Section Column Gap_8">
								<?php include "components/01_filter-sections/finish.php"; ?>
							</div>
							<div class="Filter_Section Column Gap_8">
								<?php include "components/01_filter-sections/chroma-shifts.php"; ?>
								</div>
							</div>
						</div>
			</div>
			<div class="Panel">
				<div class="Trigger Title Row Space_Between Align_Items_Center">
					<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
						<div class="Heading">Price &amp; Shipping</div>
					</div>
				</div>
				 <div class="Content">
				  <div class="Column Gap_24">
					  <?php include "components/01_filter-sections/price-shipping.php"; ?>
					</div>
				</div>
			</div>
			<div class="Panel">
				<div class="Trigger Title Row Space_Between Align_Items_Center">
					<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
						<div class="Heading">Pan Format</div>
					</div>
				</div>
					<div class="Content">
						<div class="Column Gap_24">
							<?php include "components/01_filter-sections/pan-format.php"; ?>
					</div>
				</div>
	</div>
			<div class="Panel">
				<div class="Trigger Title Row Space_Between Align_Items_Center">
					<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
						<div class="Heading">Brand</div>
					</div>
				</div>
			<div class="Content">
				<div class="Column Gap_24">
					<?php include "components/01_filter-sections/brand-characteristics.php"; ?>
			</div>
		</div>
</div>
		</div>
	</div>
</div>
