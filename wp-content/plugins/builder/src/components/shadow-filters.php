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
										<input onclick='filter(event);' id="Red" type="checkbox" />
										<label for="Red">Red</label>
									</li>
									<li class="Filter_Button Orange Light">
										<input id="Orange" type="checkbox" />
										<label for="Orange">Orange</label>
									</li>
									<li class="Filter_Button Yellow Light">
										<input id="Yellow" type="checkbox" />
										<label for="Yellow">Yellow</label>
									</li>
									<li class="Filter_Button Green Light">
										<input id="Green" type="checkbox" />
										<label for="Green">Green</label>
									</li>
									<li class="Filter_Button Blue Light">
										<input id="Blue" type="checkbox" />
										<label for="Blue">Blue</label>
									</li>
									<li class="Filter_Button Indigo Dark">
										<input id="Indigo" type="checkbox" />
										<label for="Indigo">Indigo</label>
									</li>
									<li class="Filter_Button Violet Dark">
										<input id="Violet" type="checkbox" />
										<label for="Violet">Violet</label>
									</li>
									<li class="Filter_Button Neutral Dark">
										<input id="Neutral" type="checkbox" />
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
										<input id="Matte" type="checkbox" />
										<label for="Matte">Matte</label>
									</li>
									<li class="Filter_Button Satin Dark">
										<input id="Satin" type="checkbox" />
										<label for="Satin">Satin</label>
									</li>
									<li class="Filter_Button Shimmer Dark">
										<input id="Shimmer" type="checkbox" />
										<label for="Shimmer">Shimmer</label>
									</li>
									<li class="Filter_Button Metallic Light">
										<input id="Metallic" type="checkbox" />
										<label for="Metallic">Metallic</label>
									</li>
									<li class="Filter_Button Sparkle Ligh">
										<input id="Sparkle" type="checkbox" />
										<label for="Sparkle">Sparkle</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="Filter_Section Column Gap_8">
							<div class="Section_Title">
								<div class="Heading">Price Per Pan</div>
							</div>
							<div class="Filter_Intro">I'm interested in eyeshadows between...</div>
							<div class="Row Gap_8 Align_Items_Center">
								<div class="Select_Range Row Gap_4 Align_Items_Center">
									$
									<select>
										<option>Price</option>
										<option>1.00</option>
										<option>1.00</option>
										<option>1.00</option>
										<option>10.00</option>
									</select>
								</div>
								<div>and</div>
								<div class="Select_Range Row Gap_4 Align_Items_Center">
									$
									<select>
										<option>Price</option>
										<option>1.00</option>
										<option>1.00</option>
										<option>1.00</option>
										<option>10.00</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="Right Column Gap_24">
						<div class="Filter_Section Column Gap_8">
							<div class="Section_Title">
								<div class="Heading">Brand Characteristics</div>
							</div>
							<div class="Button_Group">
								<ul class="Row Gap_8 Justify_Content_Flex_Start">
									<li class="Filter_Button">
										<input id="CF" type="checkbox" />
										<label for="CF">Cruelty-Free</label>
									</li>
									<li class="Filter_Button">
										<input id="Veg" type="checkbox" />
										<label for="Veg">Vegan</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="Filter_Section Column Gap_8">
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
										<li>
											<input id="c1" type="checkbox" />
											<label for="c1">Checkbox</label>
										</li>
										<li>
											<input id="c2" type="checkbox" />
											<label for="c2">Checkbox</label>
										</li>
										<li>
											<input id="c3" type="checkbox" />
											<label for="c3">Checkbox</label>
										</li>
										<li>
											<input id="c4" type="checkbox" />
											<label for="c4">Checkbox</label>
										</li>
										<li>
											<input id="c5" type="checkbox" />
											<label for="c5">Checkbox</label>
										</li>
										<li>
											<input id="c6" type="checkbox" />
											<label for="c6">Checkbox</label>
										</li>
										<li>
											<input id="c7" type="checkbox" />
											<label for="c7">Checkbox</label>
										</li>
										<li>
											<input id="c8" type="checkbox" />
											<label for="c8">Checkbox</label>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
