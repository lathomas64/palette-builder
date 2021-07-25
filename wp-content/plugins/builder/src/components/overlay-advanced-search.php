<head>
	<meta charset="UTF-8" />
	<title>Universal Palette Builder – Firedrake Beauty Labs</title>
	<link rel="stylesheet" type="text/css" href="../../css/variables.css" />
	<link rel="stylesheet" type="text/css" href="../../css/basic-styles.css" />
	<link rel="stylesheet" type="text/css" href="../../css/builder-styles.css" />
	<link rel="stylesheet" href="https://use.typekit.net/mxy5ujb.css" />
</head>
<body>
	<section class="Row Space_Between Drawer_Overlay">
		<div class="">&nbsp;</div>
		<div class="Advanced_Search_Filter"> 
	 <div class="Row Justify_Content_Flex_End">
		 <button class="Text_Button Icon_Button Row Gap_4 Align_Items_Center">
	  <div class="Icon_Container">
	   <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 7.05333L3.05533 4L8 0.94L6.47773 0L0 4L6.47773 8L8 7.05333Z" fill="#0E444B"></path></svg></div>
	  <div>go back </div></button>
	 </div>
	 <div class="Panel_Content Column Gap_40">
	  <div class="Panel_Title">
	   <div class="Heading">Advanced Filter</div>
	  </div>
	  <div class="Column Gap_16">
	    <div class="Accordion_Controls Row Space_Between">
		<button class="Text_Button Button_Micro Row Gap_4 Align_Items_Center">
		 <div class="Icon_Container Column Justify_Content_Center">
		  <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1.57254L0 1.57254L0 0.429688L8 0.429688V1.57254Z" fill="#959595"></path></svg></div>
		 <div class="go_away">Hide Panel</div>
		</button>
		<button class="Text_Button Row Gap_4 Align_Items_Center">
		 <div class="Icon_Container">
		  <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.571429 8L0 7.42857L3.42857 4L0 0.571429L0.571429 0L4 3.42857L7.42857 0L8 0.571429L4.57143 4L8 7.42857L7.42857 8L4 4.57143L0.571429 8Z" fill="#48715C"></path>
	  	</svg>
	  	</div>
		 <div class="Text_Button">clear filters</div>
		</button>
	    </div>
<div class="Accordion_Panel">
	 <div class="Accordion_Trigger">
	  <div class="Row Space_Between Align_Items_Center">
	   <div class="Accordion_Title">
	    <div class="Heading">Price &amp; Shipping</div>
	   </div>
	   <div class="Icon_Container">
	    <svg width="15" height="1" viewBox="0 0 15 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.3999 0.643136H0.399902V0.357422H14.3999V0.643136Z" fill="#F8E968"></path></svg></div>
	  </div>
	 </div>
	 <div class="Accordion_Content">
	  <div class="Column Gap_24">
	  <div class="Filter_Section Column Gap_8">
		  <?php include "../filter-sections/price-range.php"; ?>
	  </div>
	  <div class="Filter_Section Column Gap_8"><?php include "../filter-sections/shipping-countries.php"; ?>
	    </div>
	  <div class="Row Justify_Content_Flex_End">
		    <button class="Block_Button Dark">Save and Close Section</button></div>
	  </div>
	  
	 </div>
	</div>
	    <div class="Row Justify_Content_Flex_End">
<button class="Block_Button Row Justify_Content_Center">
	 <div>Apply All Filters and Close Search</div>
	</button>
	    </div>
	   
	  </div>
	 </div>
	
	
			</div>
		</div>
	</section>
</body>


