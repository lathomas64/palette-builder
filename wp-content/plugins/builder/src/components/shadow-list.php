<div class="Results Column">
	<div class="Results_Control_Bar Row Space_Between Align_Items_Center">
		<div class="Body Small_Text">
			<span id='Shadow_Count'>Showing ?? shadows</span>
		</div>
		<div class="Row Gap_24 Align_Items_Center Filters">
			<div class="Search">
			<label class="Hidden">Start Typing to Filter List</label>
			<input onsearch="shadow_list.search(this.value)" onkeyup="shadow_list.search(this.value)" id="Filter_By_Text" class="Input" placeholder="Search by name" type="search" />
	</div>
			<div class="Row Gap_8">
			<button id="advancedFilterBtn" class="Filter_Button Icon_Button Align_Items_Center Row Gap_4 Modal_Trigger Right">
				<div class="Icon_Container">
					<svg width="13" height="14" viewBox="0 0 13 14" fill="#09262A" xmlns="http://www.w3.org/2000/svg"><path d="M8.55526 13.1271C8.58636 13.3604 8.5086 13.6093 8.32973 13.7726C8.25779 13.8447 8.17233 13.9019 8.07825 13.9409C7.98417 13.9799 7.88332 14 7.78147 14C7.67962 14 7.57877 13.9799 7.48469 13.9409C7.39062 13.9019 7.30516 13.8447 7.23321 13.7726L4.11475 10.6541C4.02993 10.5712 3.96544 10.4698 3.92632 10.3578C3.88719 10.2458 3.8745 10.1263 3.88922 10.0086V6.02696L0.164173 1.25983C0.037885 1.09771 -0.0190985 0.892191 0.00567355 0.688185C0.0304456 0.48418 0.134959 0.298273 0.296377 0.171088C0.444135 0.0622138 0.607446 0 0.778534 0H11.6659C11.837 0 12.0003 0.0622138 12.1481 0.171088C12.3095 0.298273 12.414 0.48418 12.4388 0.688185C12.4636 0.892191 12.4066 1.09771 12.2803 1.25983L8.55526 6.02696V13.1271ZM2.36498 1.55534L5.44457 5.49037V9.78312L6.99991 11.3385V5.48259L10.0795 1.55534H2.36498Z" /></svg>
				</div>
				<div class="Tab_Label">Filter</div>
			</button>
			<button id="shadowSortBtn" class="Filter_Button Icon_Button Row Gap_4 Align_Items_Center">
				<div class="Icon_Container">
					<svg fill="#09262A" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.9 9.8H14L11.2 12.6L8.4 9.8H10.5V0H11.9V9.8ZM0 9.8H7V11.2H0V9.8ZM2.8 1.4V2.8H0V1.4H2.8ZM0 5.6H4.9V7H0V5.6Z" />
					</svg>
				</div>
				<div class="Tab_Label">Sort</div>
			</button>
			</div>
		</div>
	</div>
	<div class="Column Results_Container">
		<div class="Grid Row Gap_16 Grid_Container">
			<a v-for='shadow in shadows'
						v-bind:data-size='shadow.size'
						v-bind:data-height='shadow.height'
						v-bind:data-width='shadow.width'
						v-bind:data-shape='shadow.shape'
						v-bind:data-name='shadow.name'
						v-bind:data-shift='shadow.shift'
						v-bind:data-finish='shadow.finish'
						v-bind:data-color-tag='shadow.color_tag'
						v-bind:data-vividness='shadow.vividness'
						v-bind:data-vividness-sort='shadow.avg_saturation'
						v-bind:data-lightness='shadow.lightness'
						v-bind:data-lightness-sort='shadow.avg_lightness'
						v-bind:data-color-sort='shadow.avg_hue'
						v-bind:data-link='shadow.link'
						v-bind:data-country='shadow.country'
						v-bind:data-ships='shadow.ships'
						v-bind:data-brand='shadow.brand'
						v-bind:data-price='shadow.price'
						v-bind:id='shadow.ID'
						draggable="true" ondragstart="drag(event)"
						@click="add_to_story(shadow)"
						onMouseEnter="console.log('open');openShadowDetail(this);"
						onMouseLeave="console.log('close');closeShadowDetail(this);"
						class="Single_Pan_Card Flex_Container" href="#">
				<div class="Card_Container Column Gap_8">
					<div class="Shadow_Name">{{shadow.name}}</div>
					<div v-bind:class="'Pan_Shape_'+shadow.shape+' Pan_Size_'+shadow.size" class="Shadow_Image_Container Column Align_Items_Center Justify_Content_Center">
						<div class="Wrapper">
							<img :src="shadow.img" />
							<div class="Pan_Shadow"></div>
						</div>
					</div>
				</div>
			</a>
	</div>
	</div>
</div>
