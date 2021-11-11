//Functions for showing left & right drawers
// When X button is clicked, call drawer function and function to reveal content

//SHADOW RESULTS HEIGHT CALC

function resultsHeight(event){
	if($(event.target).is(".Dismiss")) {
		var helperBox = $(event.target).closest(".Helper_Box");
		helperBox.addClass("Closed");
		setTimeout (function() {
			helperBox.addClass("Hidden");
		}, 300);
			var resultsContainerHeight = $(".Right_Panel").outerHeight() - helperBox.outerHeight() - $(".Results_Control_Bar").outerHeight();
		$(".Results_Container").css(
		"height", resultsContainerHeight
		);
}
else {
		var resultsContainerHeight = $(".Right_Panel").outerHeight() - $('.Helper_Box').outerHeight() - $(".Results_Control_Bar").outerHeight() - (48);

	$(".Results_Container").css(
		"height", resultsContainerHeight
	);
}
};

function modalOpen(event){
	if(
		$(event.target).is(".Modal_Trigger.Center")
	) {
		$('#centerModal').addClass("On");
	}
	if(
		$(event.target).is(".Modal_Trigger.Left")
	) {
		$('#leftDrawer').addClass("On");
	}
	if(
		$(event.target).is(".Modal_Trigger.Right")
	) {
		$('#rightDrawer').addClass("On");
	}
if(
		$(event.target).is(".Modal_Trigger.List")
	) {
		$(".Check_List").addClass("Active_Panel");
		$(".Copy_Code").removeClass("Active_Panel");
		$(".Buy_Shadows").removeClass("Active_Panel");
		build_shopping_list();
		$('#listDrawer').addClass("On");
	}
};

function modalClose(event) {
	if (
			$(".Modal").hasClass("On") && 
			!$(event.target).parents().is(".Drawer_Container")
		) {
			$(".Modal").removeClass("On");
		}
}

function shoppingListSlider (event){
	if ($(event.target).is("Next_Slide")) {
		$(this).closest("Active_Panel").removeClass("Active_Panel");		
		$(this).next().addClass("Active_Panel");
	}
}

$(document).ready(function(event){

$(resultsHeight);

$(".Dismiss").click(
	resultsHeight
);

$(".Modal_Trigger").click(
	modalOpen
);

$(".Modal").click(
	modalClose
);

$("#listDrawer button").click(
	shoppingListSlider
);

//Temporary hover JS for demo

		var shadowDetail = $("#shadowDetail");
		var shadowCard = $(".Results .Single_Pan_Card");
		var searchPanel = $(".Right_Panel");
		var arrangementSpace = $(".Builder");
		var builderWidth = arrangementSpace.outerWidth();
  var detailPanelWidth = shadowDetail.outerWidth();

shadowCard.mouseenter(function() {
	$(this).addClass("Hovered");
		update_shadow_detail($(this));
		shadowDetail.css(
				"left", builderWidth - detailPanelWidth
			);
						shadowDetail.css(
				"display", "flex"
			);
		setTimeout (function() {
			shadowDetail.addClass("Fade_In");
		}, 3000);
		}).mouseleave(function () {
			$(this).removeClass("Hovered");
	   setTimeout (function() {
			  if (
						$(".Hovered").length == 0
			) {
				shadowDetail.removeClass("Fade_In");
				shadowDetail.css(
				"left", ""
			);
						shadowDetail.css(
				"display", ""
			);
					}
				}, 1000);
	}).mousedown(function(){
		shadowDetail.removeClass("Fade_In");
		setTimeout (function() {
			shadowDetail.css(
				"left", ""
			);
						shadowDetail.css(
				"display", ""
			);
		}, 101);
	}).mouseup(function() {
		$(this).addClass("Hovered");
		update_shadow_detail($(this));
		shadowDetail.css(
				"left", builderWidth - detailPanelWidth
			);
						shadowDetail.css(
				"display", "flex"
			);
			shadowDetail.addClass("Fade_In");
		});

	shadowDetail.mouseenter(function() {
		$(this).addClass("Hovered");
	}).mouseleave(function () {
		$(this).removeClass("Hovered");
  setTimeout (function() {
		  if ($(".Hovered").length == 0) {
				shadowDetail.removeClass("Fade_In");
					}
				}, 3000);
	});

		var storyDetail = $("#storyDetail");
		var storyCard = $(".Story_Size .Search_Grid_Card")

storyCard.mouseenter(function() {
		$(this).addClass("Hovered");
		update_shadow_detail($(this));
		storyDetail.css(
				"left", builderWidth - detailPanelWidth
			);
						storyDetail.css(
				"display", "flex"
			);
		setTimeout (function() {
			storyDetail.addClass("Fade_In");
		}, 1000);
		}).mouseleave(function () {
			$(this).removeClass("Hovered");
	   setTimeout (function() {
			  if (
						$(".Hovered").length == 0
			) {
				storyDetail.removeClass("Fade_In");
				storyDetail.css(
				"left", ""
			);
				storyDetail.css(
				"display", ""
			);
					}
				}, 3000);
			}).mousedown(function(){
		storyDetail.removeClass("Fade_In");
		setTimeout (function() {
			storyDetail.css(
				"left", ""
			);
						storyDetail.css(
				"display", ""
			);
		}, 101);
	}).mouseup(function() {
		$(this).addClass("Hovered");
		update_shadow_detail($(this));
		storyDetail.css(
				"left", builderWidth - detailPanelWidth
			);
						storyDetail.css(
				"display", "flex"
			);
			storyDetail.addClass("Fade_In");
		});

storyDetail.mouseenter(function() {
		$(this).addClass("Hovered");
	}).mouseleave(function () {
		$(this).removeClass("Hovered");
  setTimeout (function() {
		  if ($(".Hovered").length == 0) {
				storyDetail.removeClass("Fade_In");
					}
				}, 3000);
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

////Advanced Filter Overlay

//NOTE: advancedFilterDrawer & advancedFilterBtn were removed in refactoring. Code below needs to be reworked

//////Button Activation
	$("#advancedFilterBtn").click(function(){
		// $("#advancedFilterDrawer").addClass("On");
		// $("#advancedFilterDrawer").addClass("Fade_In_Right");
		$("#shadowFilterBtn").removeClass("Selected")
		$("#shadowFilterBasic").removeClass("On")
	});

//////Button Close
		$("#afCloseBtn").click(function(){
		$("#advancedFilterDrawer").removeClass("Fade_In_Right");
		$("#advancedFilterDrawer").delay(3000).removeClass("On");
	});


//////Close When Out-Click

	//Show and Hide Palette Summary List
	$("#toggleListBtn").click(function(){
  $(".Palette_Contents").slideToggle(100, function(){
			$("#toggleListBtn").text(
				$(this).is(':visible') ? "Hide List" : "Show List");
			$(".Text_Button").find('.svgPlus').toggle();
   $(".Text_Button").find('.svgMinus').toggle();
		});
		setTimeout (function() {
			if (
				$(".Palette_Contents").prop('scrollHeight') > $(".Palette_Contents").outerHeight()
			) {
				$(".Scroll_Prompt").show();
			}
		}, 100);
	});



}); //end of document ready
