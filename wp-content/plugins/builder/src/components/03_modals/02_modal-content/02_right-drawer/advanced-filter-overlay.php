<div class="Row Justify_Content_Space_Between">
		<div class="Panel_Title">
			<div class="Heading">Find Shadows</div>
		</div>
	<button id="afCloseBtn" class="Text_Button Icon_Button Row Gap_4 Align_Items_Center Close">
	<div class="Icon_Container">
		<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M1.645 0L7 5.355L12.355 0L14 1.65667L7 8.65667L0 1.65667L1.645 0Z" fill="#none"/>
		</svg>
	</svg>
	</div>
	<div>Close</div></button>
</div>
<div id="advancedFilterContent" class="Panel_Content  Advanced_Filters Column Gap_40">
	  <div class="Column Gap_16">
					<div class="Accordion">
						<div class="Panel">
									<input class="Trigger" type="checkbox" id="panel1">
									<label class="Trigger Title Row Space_Between Align_Items_Center" for="panel1">
										<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
											<div class="Heading">Price &amp; Shipping</div>
											<div class="Intro">Property 1 | Property 2 | Prop...</div>
										</div>
										</label>
							 <div class="Content">
							  <div class="Column Gap_24">
								  <?php include "components/01_filter-sections/price-shipping.php"; ?>
	  							<div class="Row Justify_Content_Flex_End">
		    				<button class="Button_Block Dark">Save and Close Section</button>
									</div>
								</div>
	 					</div>
						</div>
						<div class="Panel">
							<input class="Trigger" type="checkbox" id="panel2">
							<label class="Trigger Title Row Space_Between Align_Items_Center" for="panel2">
								<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
									<div class="Heading">Shadow Properties</div>
									<div class="Intro">Property 1 | Property 2 | Prop...</div>
								</div>
								</label>
								<div class="Content">
									<div class="Column Gap_24">
										<div class="Color Filter_Section Column Gap_16">
											<div class="Column Gap_8">
												<div class="Color Heading">Advanced Color Selection</div>
												<div class="Intro">The view of the earth from the moon fascinated me - a small disk, 240,000 mniles away.</div>
												</div>
												<div class="Indent Column Gap_16">
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
										<div class="Row Justify_Content_Flex_End">
										<button class="Button_Block Dark">Save and Close Section</button>
									</div>
								</div>
							</div>
				</div>
						<div class="Panel">
							<input class="Trigger" type="checkbox" id="panel3">
							<label class="Trigger Title Row Space_Between Align_Items_Center" for="panel3">
								<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
									<div class="Heading">Pan Format</div>
									<div class="Intro">Property 1 | Property 2 | Prop...</div>
								</div>
								</label>
								<div class="Content">
									<div class="Column Gap_24">
										<?php include "components/01_filter-sections/pan-format.php"; ?>
										<div class="Row Justify_Content_Flex_End">
										<button class="Button_Block Dark">Save and Close Section</button>
									</div>
								</div>
							</div>
				</div>
				<div class="Panel">
					<input class="Trigger" type="checkbox" id="panel4">
					<label class="Trigger Title Row Space_Between Align_Items_Center" for="panel4">
						<div class="Row Gap_16 Justify_Content_Flex_Start Align_Items_Center">
							<div class="Heading">Brand</div>
							<div class="Intro">Property 1 | Property 2 | Prop...</div>
						</div>
						</label>
						<div class="Content">
							<div class="Column Gap_24">
								<?php include "components/01_filter-sections/brand-characteristics.php"; ?>
								<div class="Row Justify_Content_Flex_End">
								<button class="Button_Block Dark">Save and Close Section</button>
							</div>
						</div>
					</div>
		</div>
						</div>
					<div class="Accordion_Controls Row Space_Between">
					<button class="Text_Button Button_Micro Row Gap_4 Align_Items_Center">
						<div class="Icon_Container Column Justify_Content_Center">
							<svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1.57254L0 1.57254L0 0.429688L8 0.429688V1.57254Z" fill="#959595"></path></svg></div>
						<div>Open All</div>
					</button>
					<button class="Text_Button Icon_Button Row Gap_4 Align_Items_Center">
						<div class="Icon_Container">
							<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.571429 8L0 7.42857L3.42857 4L0 0.571429L0.571429 0L4 3.42857L7.42857 0L8 0.571429L4.57143 4L8 7.42857L7.42857 8L4 4.57143L0.571429 8Z" ></path>
						</svg>
							</div>
						<div class="Text_Button" onclick="shadow_list.reset_filters();">reset filters</div>
					</button>
								</div>
					</div>
	    <!-- <div class="Row Justify_Content_Flex_End">
			<button class="Button_Block Row Justify_Content_Center Close">Apply All Filters and Close Search</button>
	    </div> -->
	  </div>
