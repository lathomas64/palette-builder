$(document).ready(function(){

//Temporary hover JS for demo

		var shadowDetail = $("#shadowDetail");
		var searchPanel = $(".Right_Panel");
		var arrangementSpace = $(".Builder");
		var builderWidth = arrangementSpace.outerWidth();
  var detailPanelWidth = shadowDetail.outerWidth();

$(".Single_Pan_Card").mouseenter(function() {
					setTimeout (function() {
						shadowDetail.addClass("On");
						shadowDetail.css(
							"left", builderWidth - detailPanelWidth
						);
					}, 1000);
		}).mouseleave(function () {
	  if (
				!$("#shadowDetail:hover").length !=0 &&
				!$("#shadowDetail").length !=0
			) {
		   setTimeout (function() {
						shadowDetail.removeClass("On");
					}, 2000);
	  }
	});
	
	$("#shadowDetail").mouseleave(function () {
	  if (
				!$(".Single_Pan_Card:hover").length !=0
			) {
		   setTimeout (function() {
						shadowDetail.removeClass("On");
					}, 2000);
	  }
	});
	
	//Controls Builder Bottom Toggle
	$("#hideMeta").click(function(){
  $(".Info_Bar").slideToggle(100, function(){
			$("#controlLabel").text(
				$(this).is(':visible') ? "Hide Panel" : "Show Panel");
			$('#svgPlus').toggle();
   $('#svgMinus').toggle();
			$("#hideMeta").toggleClass("Minimized_Tab");
		});
	});


	// Changing panels with button click
	$(".Right_Panel_Nav button").click(
		function(){
	var numberIndex = $(this).index();

	if (!$(this).is("Active_Panel")) {
		$("button").removeClass("Active_Panel");
		$(".Search_Filter_Panel").removeClass("Active_Panel");

		$(this).addClass("Active_Panel");
		$(".Search_And_Filter").find(".Search_Filter_Panel").eq(numberIndex).addClass("Active_Panel");
	}
	});

//Draw circles for story cards
	$(".Search_Grid_Card").each(
	function(index, element){
		var classes = $(this).attr("class");
		var widthxheight = classes.match(/(\d+)w_(\d+)/);
		var width = widthxheight[1];
		var height = widthxheight[2];
		$(this).attr("onclick", "resize("+width+","+height+");return false;");
		$(element).find('.Card_Title').text(width * height + " Pans");

		$(element).find('.Wrapper').css({
			"grid-template-columns" : "repeat(" + width + ", 1fr)",
			"grid-template-rows" : "repeat(" + height + ", 1fr)"
		}
		);

		var circle = $("#circleTemplate");
		for (
			let circles = 0;
			circles < width * height;
			circles++
		) {
			$(element).find('.Wrapper').append(circle.clone());
		}
});

//HELPER BOX DISMISSES

	$("#dismissShadowHelperbtn").click(function(){
  $("#shadowHelper").addClass("Closed");
	});

////Advanced Filter Overlay

//////Button Activation
	$("#advancedFilterBtn").click(function(){
		$("#advancedFilterDrawer").addClass("On");
		$("#advancedFilterDrawer").addClass("Fade_In_Right");
		$("#shadowFilterBtn").removeClass("Selected")
		$("#shadowFilterBasic").removeClass("On")
	});
	
//////Button Close	
		$("#afCloseBtn").click(function(){
		$("#advancedFilterDrawer").removeClass("Fade_In_Right");
		$("#advancedFilterDrawer").delay(3000).removeClass("On");
	});

	
//////Close When Out-Click

	//Show and Hide Palette Summary LIst
	$("#toggleListBtn").click(function(){
  $(".Palette_Contents").slideToggle(100, function(){
			$("#toggleListBtn").text(
				$(this).is(':visible') ? "Hide List" : "Show List");
			$(".Text_Button").find('.svgPlus').toggle();
   $(".Text_Button").find('.svgMinus').toggle();
		}), function () {
			//This next part is good, just need to figure out how to get it to call back or settimeout
			if ($(".Palette_Contents").prop('scrollHeight') > $(".Palette_Contents").outerHeight() ) {
				alert("this element is overflowing !!");
			}};
	});

}); //end of document ready		

