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

//HELPER BOX DISMISSES

	$("#dismissShadowHelperbtn").click(function(){
  $("#shadowHelper").slideUp(200);
		$("#shadowHelper").fadeOut(200);
	});


//MODAL TOGGLES

////Shadow Filter Basic Dropdown

//////Button Activation
	$("#shadowFilterBtn").click(function(){
		$("#shadowFilterBasic").toggleClass("On");
		$("#shadowFilterBtn").toggleClass("Selected");
	});
	
//////Close on out-click
	$(document).click(function() {
    var container = $("#shadowFilterBasic");
				var shadowFilterBtn = $("#shadowFilterBtn");
				var advancedFilterBtn = $("advancedFilterBtn")
    if (
					!container.is(event.target) && 
					!container.has(event.target).length && 
					!shadowFilterBtn.is(event.target) &&
					!shadowFilterBtn.has(event.target).length
				) {
     container.removeClass("On");
					$("#shadowFilterBtn").removeClass("Selected");
    }

});

////Shadow Sort Basic Dropdown

//////Button Activation
	$("#shadowSortBtn").click(function(){
		$("#shadowSortBasic").toggleClass("On");
		$("#shadowSortBtn").toggleClass("Selected");
	});
	
	//////Close on out-click
	$(document).click(function() {
    var container = $("#shadowSortBasic");
				var shadowFilterBtn = $("#shadowSortBtn");
    if (
					!container.is(event.target) && 
					!container.has(event.target).length && 
					!shadowFilterBtn.is(event.target) &&
					!shadowFilterBtn.has(event.target).length
				) {
     container.removeClass("On");
					$("#shadowSortBtn").removeClass("Selected");
    }

});

////Advanced Filter Overlay

//////Button Activation
	$("#advancedFilterBtn").click(function(){
		$("#Shadow_Advanced_Filter").addClass("On");
		$("#shadowFilterBtn").removeClass("Selected")
		$("#shadowFilterBasic").removeClass("On")
	});
	
//////Button Close	
		$("#afCloseBtn").click(function(){
		$("#Shadow_Advanced_Filter").removeClass("On");
	});
	
//////Close When Out-Click

}); //end of document ready		



