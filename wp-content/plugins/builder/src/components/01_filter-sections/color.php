<div class="Colors Filter_Section Column Gap_8">
	<div class="Section_Title">
		<div class="Heading">Color Family</div>
	</div>
	<div class="Color_Family Button_Group">
		<ul class="Row Gap_4 Justify_Content_Flex_Start">
			<li>
				<input data-filter="01 Red" onclick='Toggle_Filter(event, "colors");' class="Filter_Button" id="Red" type="checkbox" />
				<label class="Filter_Button Red Dark" for="Red">Red</label>
			</li>
			<li >
				<input data-filter="02 Orange" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Orange" type="checkbox" />
				<label class="Filter_Button Orange Light"for="Orange">Orange</label>
			</li>
			<li >
				<input data-filter="03 Yellow" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Yellow" type="checkbox" />
				<label class="Filter_Button Yellow Light"for="Yellow">Yellow</label>
			</li>
			<li>
				<input data-filter="04 Green" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Green" type="checkbox" />
				<label 	class="Filter_Button Green Light"for="Green">Green</label>
			</li>
			<li>
				<input data-filter="05 Blue" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Blue" type="checkbox" />
				<label 	class="Filter_Button Blue Light"for="Blue">Blue</label>
			</li>
			<li>
				<input data-filter="06 Indigo" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Indigo" type="checkbox" />
				<label 	class="Filter_Button Indigo Dark"for="Indigo">Indigo</label>
			</li>
			<li>
				<input data-filter="07 Violet" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Violet" type="checkbox" />
				<label 	class="Filter_Button Violet Dark"for="Violet">Violet</label>
			</li>
			<li>
				<input data-filter="08 Pink" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Pink" type="checkbox" />
				<label 	class="Filter_Button Pink Dark"for="Pink">Pink</label>
			</li>
			<li>
				<input data-filter="09 True Neutral" onclick='Toggle_Filter(event, "colors");' class="Filter_Button"id="Neutral" type="checkbox" />
				<label 	class="Filter_Button Neutral Dark "for="Neutral">Neutral</label>
			</li>
		</ul>
	</div>
		<div class="Temperature_Options Reverse Column Gap_8">
		<button class="Text_Button Icon_Button Expand Row Gap_4 Justify_Content_Center Align_Items_Center" id="hideTemp">
			<div class="Icon_Container">
				<svg id="tempPlus" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 8H8V14H6V8H0V6H6V0H8V6H14V8Z"></path>
				</svg>
				<svg id="tempMinus" style="display:none;"  width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg" style=""><path d="M8 1.40336H0V0.260498H8V1.40336Z" fill="#959595"></path>
			</svg>
				</div>
			<div id="controlLabel" >Show Temperature Options </div>
	</button>
		<div class="Temperature_Options Button_Group Column Gap_8" style="display:none;">
			<div>Select temperatures to refine color choices above.</div>
			<ul class="Row Gap_4 Justify_Content_Flex_Start">
				<li>
					<input data-filter="warm" onclick='Toggle_Filter(event, "temperature");' class="Filter_Button" id="warm" type="checkbox" />
					<label class="Filter_Button Warm_Toned Red Dark" for="warm">Warm-Toned</label>
				</li>
				<li >
					<input data-filter="neutral" onclick='Toggle_Filter(event, "temperature");' class="Filter_Button"id="neutralt" type="checkbox" />
					<label class="Filter_Button Red  Dark"for="neutralt">Neutral-Toned</label>
				</li>
				<li >
					<input data-filter="cool" onclick='Toggle_Filter(event, "temperature");' class="Filter_Button"id="cool" type="checkbox" />
					<label class="Filter_Button Red Cool_Toned  Dark"for="cool">Cool-Toned</label>
				</li>
			</ul>
	</div>
</div>
</div>
