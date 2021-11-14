<div id="listDrawer" class="Modal Fade_In">
	<div class="Grid_Container Grid_Test Space_Between Drawer_Overlay">
		<div class="Build_List_Title Column Gap_24">
			<div class="Panel_Title">You're almost finished!</div>
			<div class="Subheading">Just a few things first</div>
			<button onclick="$('.Shopping_List_Modal').removeClass('On')" class="Text_Button Row Gap_4 Align_Items_Center"><div class="Icon_Container Column Justify_Content_Center">
					  <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.645 12.3433L3.30167 7L8.645 1.645L7 0L0 7L7 14L8.645 12.3433Z"></path></svg>
						</div>Go back to your palette</button>
			</div>
		<div class="Build_List_Carousel Row">
		<div class="Check_List Column Active_Panel Gap_32">
		 <div class="Row Gap_16 Align_Items_Center">
		  <div class="Number_Icon">1.</div>
		  <div class="Panel_Title">Double Check Your List</div>
		 </div>
			<div class="Column Gap_24 Drawer_Container">
				<div class="Column Gap_48">
			  <div class="Grid_Container Shopping_List_Summary Gap_32">
		  		<div class="Palette Search_Grid_Card Palette_Summary Row Justify_Content_Center Story_Size_3w_3t">
							<div class="Card_Container Column Gap_16 Reverse">
								<div class="Palette Column Align_Items_Center">
									<div class="Wrapper">
									</div>
								</div>
						</div>
					</div>
		    <div class="Column Gap_40 Summary_Data">
		     <div class="Column Gap_16">
		      <div class="Heading">Your Shopping List</div>
		      <div class="Row Gap_24">
									<div class="Meta_Label Flex_Container Row Gap_2 Align_items_baseline reverse align_content_baseline">
														<div class="Title">Shadows</div>
														<div id="Shopping_List_Shadow_Count" class="Value">00</div>
													</div>
													<div class="Meta_Label Flex_Container Row Gap_2 Align_items_baseline reverse align_content_baseline">
														<div class="Title">Brands</div>
														<div id="Shopping_List_Brand_Count" class="Value">00</div>
													</div><div class="Meta_Label Flex_Container Row Gap_2 Align_items_baseline reverse align_content_baseline">
														<div class="Title">Countries</div>
														<div id="Shopping_List_Country_Count" class="Value">00</div>
													</div></div>
		     </div>
		      <div class="Total_Row Row Space_Between Align_Items_Flex_End">
									<button class="Text_Button Icon_Button Row Gap_4 Align_Items_Center">
									<div class="Icon_Container">
										<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.645 0L7 5.355L12.355 0L14 1.65667L7 8.65667L0 1.65667L1.645 0Z"></path>
										</svg>
			  				</div>
									<div id="jumpToList" class="Text_Button">See &amp; Edit Full list</div>
								</button>
		      <div class="Price_Widget Flex_Container Column Gap_2 Align_Items_Flex_End">
													<div class="Title Flex_Container">Price Before Shipping</div>
													<div class="Price Flex_Container Row Gap_2 Align_Items_Flex_End">
														<div id="Shopping_List_Story_Price" class="Price_Value">$0.00</div>
														<div class="Price_Units">USD</div>
													</div>
												</div>
		     </div>
		    </div>
			  </div>
  			<div class="Itemized_List Itemized_List Column Gap_40">
   			<div class="Brand_Group Column Gap_24">
    			<div class="Heading Row Space_Between Align_Items_Flex_End">
     			<div>Colourpop Cosmetics</div>
								<div class="Brand_Badges Row Gap_4">
     			<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Ships Worldwide</div>
						</div>
								</div>
    			</div>
    			<div class="List Column Gap_16">
								<?php include "components/shopping-list-shadow-card.php"; ?>
								<?php include "components/shopping-list-shadow-card.php"; ?>
								<?php include "components/shopping-list-shadow-card.php"; ?>
								<?php include "components/shopping-list-shadow-card.php"; ?>

							</div>
   			</div>
   			<div class="Brand_Group Column Gap_24">
    			<div class="Heading Row Space_Between Align_Items_Flex_End">
     			<div>Clionadh Cosmetics</div>
								<div class="Brand_Badges Row Gap_4">
     			<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Ships Worldwide</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Indie</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Cruelty-Free</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
									<div class="Icon_Container">
										<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
											</svg>
										</div>
								<div>Vegan</div>
						</div>
								</div>
    			</div>
    			<div class="List Column Gap_16">
								<?php include "components/shopping-list-shadow-card.php"; ?>
								<?php include "components/shopping-list-shadow-card.php"; ?>
     			</div>
    			</div>
						<div class="Brand_Group Column Gap_24">
    			<div class="Heading Row Space_Between Align_Items_Flex_End">
     			<div>Emme Cosmetics</div>
								<div class="Brand_Badges Row Gap_4">
     			<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Ships Worldwide</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Indie</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Cruelty-Free</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
									<div class="Icon_Container">
										<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
											</svg>
										</div>
								<div>Vegan</div>
						</div>
								</div>
    			</div>
    			<div class="List Column Gap_16">
								<?php include "components/shopping-list-shadow-card.php"; ?>
     			</div>
    			</div>
							<div class="Brand_Group Column Gap_24">
    			<div class="Heading Row Space_Between Align_Items_Flex_End">
     			<div>Glaminatrix Cosmetics</div>
								<div class="Brand_Badges Row Gap_4">
     			<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Ships Worldwide</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Indie</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Cruelty-Free</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
									<div class="Icon_Container">
										<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
											</svg>
										</div>
								<div>Vegan</div>
						</div>
								</div>
    			</div>
    			<div class="List Column Gap_16">
								<?php include "components/shopping-list-shadow-card.php"; ?>
     			</div>
    			</div>
							<div class="Brand_Group Column Gap_24">
    			<div class="Heading Row Space_Between Align_Items_Flex_End">
     			<div>Terra Moons Cosmetics</div>
								<div class="Brand_Badges Row Gap_4">
     			<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Ships Worldwide</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Indie</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
								<div class="Icon_Container">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
										</svg>
								</div>
								<div>Cruelty-Free</div>
						</div>
								<div class="Brand_Characteristic Badge Row Gap_4 Align_Items_Center">
									<div class="Icon_Container">
										<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 1L0 7.3H2.1V12.9H11.9V7.3H14L7 1ZM7 5.025C7.41772 5.025 7.81832 5.19094 8.11369 5.48631C8.40906 5.78168 8.575 6.18228 8.575 6.6C8.575 7.01772 8.40906 7.41832 8.11369 7.71369C7.81832 8.00906 7.41772 8.175 7 8.175C6.58228 8.175 6.18168 8.00906 5.88631 7.71369C5.59094 7.41832 5.425 7.01772 5.425 6.6C5.425 6.18228 5.59094 5.78168 5.88631 5.48631C6.18168 5.19094 6.58228 5.025 7 5.025ZM7 9.4C8.05 9.4 10.15 9.925 10.15 10.975V11.5H3.85V10.975C3.85 9.925 5.95 9.4 7 9.4Z" fill="#101414"></path>
											</svg>
										</div>
								<div>Vegan</div>
						</div>
								</div>
    			</div>
    			<div class="List Column Gap_16">
								<?php include "components/shopping-list-shadow-card.php"; ?>
								<?php include "components/shopping-list-shadow-card.php"; ?>
     			</div>
    			</div>
   			</div>
					<div class="Row Space_Between">
						<button disabled class="Button_Block Prev_Slide">
							Check Your List
						</button>
						<button class="Button_Block Next_Slide">Next: Help Out the Builder
						</button>
					</div>
  </div>
 </div>
 </div>
		<div class="Copy_Code Column Gap_32">
		 <div class="Row Gap_16 Align_Items_Center">
		  <div class="Number_Icon">2.</div>
		  <div class="Panel_Title">Copy Our Affiliate Code</div>
		 </div>
			<div class="Column Gap_24 Drawer_Container">
				<div class="Column Gap_48">
			  <div class="Section_Title">At checkout, paste the code into the discount area to save between 10% – 20%!</div>
					<div class="Code_Copy Row Space_Between Align_Items_Center">
						<span class="Affiliate_Code Panel_title">FIREDRAKEBEAUTYLABS</span>
						<button onclick="navigator.clipboard.writeText('FIREDRAKEBEAUTYLABS');$('.Code_Copy').addClass('Copied');" class="Button_Block">Copy Code</button>
					</div>
					<div class="Helper_Box Column Gap_8 Disclaimer_Explanation">
					 <div class="Heading">Why are we asking you to do this?</div>
					 <div class="Body Small_Text">Non vitae, ac pellentesque fusce ut. Turpis posuere mauris sed vitae. Sed elementum nibh adipiscing eu sit fringilla pharetra elementum. Sit tortor nunc morbi placerat nibh pretium, aliquam. Et ut ut lorem vivamus adipiscing cursus fringilla.</div>
					</div>
					<div class="Row Space_Between">
						<button class="Button_Block Prev_Slide">
							Check Your List
						</button>
						<button class="Button_Block Next_Slide">Next: Help Out the Builder
						</button>
					</div>
				</div>
			</div>
	</div>
		<div class="Buy_Shadows Column Gap_32">
		 <div class="Row Gap_16 Align_Items_Center">
		  <div class="Number_Icon">3.</div>
		  <div class="Panel_Title">Buy Shadows from Brand Sites</div>
		 </div>
			<div class="Column Gap_24 Drawer_Container">
				<div class="Column Gap_32">
					<div class="Helper_Box Column Gap_8 Disclaimer_Explanation">
					 <div class="Heading">Remember: You're not purchasing these shadows from us.</div>
					 <div class="Body Small_Text">After you open the links below, continue through the brand’s checkout process to complete your purchase! <b>Shipping and taxes will likely apply.</b></div>
					</div>
					<div class="Terms_Conditions Row Gap_8">
						<input id="terms" type="checkbox" />
						<label for="terms">I acknowledge that I’m not purchasing these shadows from Firedrake Beauty Labs, and shipping and taxes will be applied to my order. Any problems I have after clicking this button should be addressed by the brand.</label>
					</div>
						<div class="Open_Links Invalid Row Space_Between Align_Items_Center">
						<span class="Panel_Title">Ready to get your shadows?</span>
						<button class="Button_Block">Open Your List in (9) Tabs</button>
					</div>
					<div class="Row Space_Between">
	  			<button class="Button_Block Prev_Slide">Check Your List</button>
	  			<button disabled class="Button_Block Next_Slide">
	   			<div>Next: Help Out the Builder</div>
	  			</button>
	 			</div>
				</div>
			</div>
	</div>
		</div>
		</div>
</div>
