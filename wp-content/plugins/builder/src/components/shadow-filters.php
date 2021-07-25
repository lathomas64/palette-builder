<head>
	<meta charset="UTF-8" />
</head>
<body>
	<div class="Singles_Filter">
		<div class="Column">
			<div class="Content Column Gap_24">
				<div class="Panel_Title Row Space_Between">
					<div class="Heading">Filter Results</div>
					<button class="Search">Open Advanced Search</button>
				</div>
				<div class="Filter_Groups Row Gap_24">
					<div class="Left Column Gap_24">
						<div class="Filter_Section Column Gap_8">
							<div class="Section_Title">
								<div class="Heading">Color Family</div>
							</div>
							<div class="Button_Group">
								<ul class="Row Gap_4 Justify_Content_Flex_Start">
									<li class="Filter_Button Red Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Red" type="checkbox" />
										<label for="Red">Red</label>
									</li>
									<li class="Filter_Button Orange Light">
										<input onclick='Checkbox_Or_Filter(event);' id="Orange" type="checkbox" />
										<label for="Orange">Orange</label>
									</li>
									<li class="Filter_Button Yellow Light">
										<input onclick='Checkbox_Or_Filter(event);' id="Yellow" type="checkbox" />
										<label for="Yellow">Yellow</label>
									</li>
									<li class="Filter_Button Green Light">
										<input onclick='Checkbox_Or_Filter(event);' id="Green" type="checkbox" />
										<label for="Green">Green</label>
									</li>
									<li class="Filter_Button Blue Light">
										<input onclick='Checkbox_Or_Filter(event);' id="Blue" type="checkbox" />
										<label for="Blue">Blue</label>
									</li>
									<li class="Filter_Button Indigo Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Indigo" type="checkbox" />
										<label for="Indigo">Indigo</label>
									</li>
									<li class="Filter_Button Violet Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Violet" type="checkbox" />
										<label for="Violet">Violet</label>
									</li>
									<li class="Filter_Button Neutral Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Neutral" type="checkbox" />
										<label for="Neutral">Neutral</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="Filter_Section Column Gap_8">
							<div class="Section_Title">
								<div class="Heading">Finish</div>
							</div>
							<div class="Button_Group">
								<ul class="Row Gap_4">
									<li class="Filter_Button Matte Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Matte" type="checkbox" />
										<label for="Matte">Matte</label>
									</li>
									<li class="Filter_Button Satin Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Satin" type="checkbox" />
										<label for="Satin">Satin</label>
									</li>
									<li class="Filter_Button Shimmer Dark">
										<input onclick='Checkbox_Or_Filter(event);' id="Shimmer" type="checkbox" />
										<label for="Shimmer">Shimmer</label>
									</li>
									<li class="Filter_Button Metallic Light">
										<input onclick='Checkbox_Or_Filter(event);' id="Metallic" type="checkbox" />
										<label for="Metallic">Metallic</label>
									</li>
									<li class="Filter_Button Sparkle Ligh">
										<input onclick='Checkbox_Or_Filter(event);' id="Sparkle" type="checkbox" />
										<label for="Sparkle">Sparkle</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="Filter_Section Column Gap_8"><?php include "filter-sections/price-range.php"; ?></div>
					</div>
					<div class="Right Column Gap_24">
						<div class="Filter_Section Column Gap_8">
							<div class="Section_Title">
								<div class="Heading">Brand Characteristics</div>
							</div>
							<div class="Button_Group">
								<ul class="Row Gap_8 Justify_Content_Flex_Start">
									<li class="Filter_Button">
										<input onclick='Checkbox_And_Filter(event);' id="CF" type="checkbox" />
										<label for="CF">Cruelty-Free</label>
									</li>
									<li class="Filter_Button">
										<input onclick='Checkbox_And_Filter(event);' id="Veg" type="checkbox" />
										<label for="Veg">Vegan</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="Filter_Section Column Gap_8"><?php include "filter-sections/shipping-countries.php"; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
