$(document).ready(function(){
	//Controls Builder Bottom Toggle
	$("#hideMeta").click(function(){
  $(".Info_Bar").slideToggle(300, function(){
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
	$(".Results .Search_Grid_Card").each(
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


//MODAL TOGGLES

////Shadow Filter Basic Dropdown

//////Button Activation
	$("#shadowFilterBtn").click(function(){
		$("#shadowFilterBasic").toggleClass("On");
		$("#shadowFilterBtn").toggleClass("Selected");
		$("html").toggleClass("Close_Ready");
		// $(".Close_Ready").click(function(){
		// 	if (!$(this).is("#shadowFilterBtn")) {
		// 		$("#shadowFilterBasic").removeClass("On");
		// 		$("#shadowFilterBtn").removeClass("Selected");
		// 	}
		// 	else if (!$(this).is("#shadowFilterBasic")) {
		// 		$("#shadowFilterBasic").removeClass("On");
		// 		$("#shadowFilterBtn").removeClass("Selected");
		// 	}
		// });
	});

//////Close When Out-Click


////Advanced Filter Overlay

//////Button Activation
	$("#openAdvancedFilter").click(function(){
		$("#Shadow_Advanced_Filter").addClass("On");
	});
	
		$("#closeAFOverlay").click(function(){
		$("#Shadow_Advanced_Filter").removeClass("On");
	});
	



//////Close When Out-Click

}); //end of document ready		



