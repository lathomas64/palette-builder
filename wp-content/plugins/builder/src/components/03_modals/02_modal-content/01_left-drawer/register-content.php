	<div class="Register_Content Column Gap_32 Hidden">
  <div class="Panel_Title Column Gap_8">
   <div class="Heading">Register for the Builder</div>
			<div class="Body Small_Text">Deflector power at maximum. Energy discharge in six seconds. Warp reactor core primary coolant failure. Fluctuate phaser resonance frequencies.</div>
  </div>
			<div class="Column Gap_16">
				<div class="Column Gap_8">
		  	<div class="Panel_Title">
		   	<div class="Heading Subsection_Title">By creating an account, you can...</div>
		  	</div>
				</div>
					<div class="Row Gap_16 Align_Content_Flex_Start">
						<div class="Image_Card Column Gap_8">
						 	<div class="Image_Placeholder">&nbsp;</div>
						 	<p class="Feature">Access your color stories anywhere, any time. </p>
											</div>
						<div class="Image_Card Column Gap_8">
					 	<div class="Image_Placeholder">&nbsp;</div>
							 	<p class="Feature">Access your color stories anywhere, any time. </p>
								</div>
						<div class="Image_Card Column Gap_8">
					 	<div class="Image_Placeholder">&nbsp;</div>
						 	<p class="Feature">Access your color stories anywhere, any time. </p>
							</div>
					</div>
			</div>
			<div class="Pay_Box">
		 	<div class="Column Gap_32">
					<div class="Column Gap_16">
						<div class="Column Gap_8">
		    	<div class="PreHeading">step 1/3</div>
		    	<div class="Panel_Title">
		     	<div class="Heading">Name a Fair Price to Get Started</div>
							</div>
						</div>
						<p>Need a bit of an explainer here. </p>
						<div class="Color_Family Button_Group Row Nowrap Gap_4 Justify_Content_Flex_Start">
							<input class="Filter_Button Price" onclick="fireGumroadEmbed(2);" id="payOp1" type="radio" name="price" />
							<label class="Filter_Button Price" for="payOp1">$2.00</label>
							<input class="Filter_Button Price" onclick="fireGumroadEmbed(5);" id="payOp2" type="radio" name="price" />
							<label class="Filter_Button Price" for="payOp2">$5.00</label>
							<input class="Filter_Button Price" onclick="fireGumroadEmbed(10);" id="payOp3" type="radio" name="price" />
							<label class="Filter_Button Price" for="payOp3">$10.00</label>
							<div class="Pay_Option_Custom Row Nowrap Gap_0 Align_Items_Center">
									<div class="Currency_Symbol">$</div>
									<label class="Custom_Price_Input">
											<span class="SR_Only">Other Amount</span>
											<input onchange="fireGumroadEmbed(this.value);priceTree();" type="number" class="Other_Amt" name="amount" step=".50" min="1.00" placeholder="Other Amount" value="">
									</label>
							</div>
							</div>
					</div>
					<button id="Forward"class="Button_Block Invalid">Select a payment amount to move forward</button>
					<div class="Payment_Information Hidden">
						<div class="Column Gap_8">
		    	<div class="PreHeading">step 2/3</div>
		    	<div class="Panel_Title">
		     	<div class="Heading">Let Us Know Your Payment Information</div>
							</div>
						</div>
						<!-- todo replace this with the actual product -->
						<!-- attach here -->
						<div id="gumroad-target">
						</div>
						<div class="Column Gap_16">
							<div> paypal stuff</div>
							<div class="Column Gap_8">
  		<div class="Panel_Title">
   		<div class="PreHeading Divider">Or</div>
  		</div>
		</div>
								<div class="Column Gap_16">
									<div class="Input Column Gap_4">
	   						<label class="Input_Label" for="username">Username</label>
	   						<input class="Input" type="text" placeholder="Enter Username" id="register_username" required>
									</div>
									<div class="Input Column Gap_4">
    						<label class="Input_Label" for="password">Password</label>
    						<input id="register_password" class="Input" type="password" placeholder="Enter Password">
									</div>
									<div class="Column Gap_24">
									<div class="Row Space_Between Align_Items_Center">
    						<button onclick="submitUserData()" type="Submit" class="Button_Block Row Align_Items_center">Submit Payment and Create Account</button>
 									</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
	</div>
