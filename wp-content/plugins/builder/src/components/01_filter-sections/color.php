<div class="Column Gap_8">
<div class="Heading Row Space_Between">
	<div>Color</div>
	<button class="Reset Text_Button Icon_Button Row Gap_4 Align_Items_Center">
	<div class="Icon_Container">
		<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.571429 8L0 7.42857L3.42857 4L0 0.571429L0.571429 0L4 3.42857L7.42857 0L8 0.571429L4.57143 4L8 7.42857L7.42857 8L4 4.57143L0.571429 8Z" ></path>
	</svg>
		</div>
	<div class="Text_Button" onclick="shadow_list.reset_filters();">reset color selections</div>
</button></div>
<div class="Intro">Make selections in any combination of Hue, Vividness, and Lightness to find your perfect color.</div>
</div>
<div class="Indent Column Gap_16">
<div class="Colors Filter_Section Column Gap_8">
	<div class="Section_Title">
		<div class="Heading">Hue</div>
	</div>
		<div class="Grid_Container Gap_4 Justify_Content_Flex_Start Color_Family Button_Group">
			<button data-filter="01 Red" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Red Dark" id="Red">Red</button>
				<button data-filter="02 Orange" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Orange Light"id="Orange">Orange</button>
				<button data-filter="03 Yellow" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Yellow Light"id="Yellow">Yellow</button>
				<button data-filter="04 Green" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Green Light"id="Green">Green</button>
				<button data-filter="05 Blue" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Blue Light"id="Blue">Blue</button>
				<button data-filter="06 Indigo" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Indigo Dark"id="Indigo" type="checkbox">Indigo</button>
				<button data-filter="07 Violet" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Violet Dark"id="Violet">Violet</button>
				<button data-filter="08 Pink" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Pink Dark"id="Pink">Pink</button>
				<button data-filter="09 True Neutral" onclick='Toggle_Filter(this, "colors");' class="Filter_Button Neutral Dark"id="Neutral" type="checkbox">Neutral</button>
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
		<div class="Temperature_Options_Drawer Column Gap_8" style="display:none;">
			<div>Select temperatures to refine color choices above.</div>
			<div class="Grid_Container Button_Group Gap_4 Justify_Content_Flex_Start">
					<button data-filter="warm" onclick='Toggle_Filter(this, "temperature");' class="Filter_Button Warm_Toned Red Dark" id="warm">Warm-Toned</button>
					<button data-filter="neutral" onclick='Toggle_Filter(this, "temperature");' class="Filter_Button Red  Dark"id="neutralt">Neutral-Toned</button>
					<button data-filter="cool" onclick='Toggle_Filter(this, "temperature");' class="Filter_Button Red Cool_Toned  Dark"id="cool">Cool-Toned</button>

			</div>
	</div>
</div>
</div>
