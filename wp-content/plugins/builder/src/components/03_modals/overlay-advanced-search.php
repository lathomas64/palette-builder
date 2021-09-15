	<section class="Row Space_Between Drawer_Overlay">
		<div class="">&nbsp;</div>
		<div class="Advanced_Search_Filter">
	 <div class="Close_Modal Row Justify_Content_Flex_Start">
		 <button id="afCloseBtn" class="Text_Button Icon_Button Row Gap_4 Align_Items_Center">
	  <div class="Icon_Container">
	   <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 7.05333L3.05533 4L8 0.94L6.47773 0L0 4L6.47773 8L8 7.05333Z"></path>
   </svg>
			</div>
	  <div>go back </div></button>
	 </div>
	 <div class="Panel_Content Column Gap_40">
	  <div class="Panel_Title">
	   <div class="Heading">Advanced Search</div>
	  </div>
	  <div class="Column Gap_16">
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
		 <div class="Text_Button">reset filters</div>
		</button>
	    </div>
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
					</div>
	    <div class="Row Justify_Content_Flex_End">
			<button class="Button_Block Row Justify_Content_Center">
	 <div>Apply All Filters and Close Search</div>
	</button>
	    </div>
	  </div>
	 </div>
	</section>
