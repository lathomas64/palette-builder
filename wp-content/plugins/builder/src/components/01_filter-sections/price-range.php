  <div class="Section_Title">
	  <div class="Heading">Price Per Pan</div>
  </div>
  <div class="Filter_Intro">I'm interested in eyeshadows between...</div>
  <div class="Row Gap_8 Align_Items_Center">
	  <div class="Select_Range Row Gap_4 Align_Items_Center">
		  $
		  <select onchange='Update_Price(event, "min");'>
			  <option value=-1>Price</option>
			  <option value=1>1.00</option>
			  <option value=10>10.00</option>
			  <option value=25>25.00</option>
			  <option value=100>100.00</option>
		  </select>
	  </div>
	  <div>and</div>
	  <div class="Select_Range Row Gap_4 Align_Items_Center">
		  $
		  <select onchange='Update_Price(event, "max");'>
        <option value=-1>Price</option>
			  <option value=1>1.00</option>
			  <option value=10>10.00</option>
			  <option value=25>25.00</option>
			  <option value=100>100.00</option>
		  </select>
	  </div>
  </div>
