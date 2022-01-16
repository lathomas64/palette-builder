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
	//Open Modal Container
	if(
		$(event.target).parents().is(".Modal_Trigger.Center")
	) {
		$('#centerModal').addClass("On");
	}
	if(
		$(event.target).parents().is(".Modal_Trigger.Left")
	) {
		$('#leftDrawer').addClass("On");
	}
	if(
		$(event.target).parents().is(".Modal_Trigger.Right") || $(event.target).is(".Modal_Trigger.Right")
	) {
		$('#rightDrawer').addClass("On");
	}
	//Display Modal Content
	if(
			$(event.target).is(".Modal_Trigger.List")
		) {
			$(".Check_List").addClass("Active_Panel");
			$(".Copy_Code").removeClass("Active_Panel");
			$(".Buy_Shadows").removeClass("Active_Panel");
			build_shopping_list();
			$('#listDrawer').addClass("On");
		}
	if(
			$(event.target).parents().is(".Modal_Trigger.Builder_Share")
		) {
			$(".Share_Modal").addClass("On");
			$(".Share_Modal").removeClass("Hidden");
	}
	if(
		$(event.target).parents().is(".Modal_Trigger.Help")
	) {
		$("#genericModal").addClass("On");
		$("#genericModal").removeClass("Hidden");
}
	if(
		$(event.target).parents().is(".Modal_Trigger.Disclaimer")
	) {
		$("#genericModal").addClass("On");
		$("#genericModal").removeClass("Hidden");
}
	if(
		$(event.target).parents().is(".Modal_Trigger.Log_In")
	) {
		$(".Login_Content").addClass("On");
		$(".Register_Content").removeClass("On");
}
	if(
		$(event.target).parents().is(".Modal_Trigger.Register")
	) {
		$(".Register_Content").addClass("On");
		$(".Login_Content").removeClass("On");
}
};

function modalClose(event) {
	if (
			$(".Modal").hasClass("On") && 
			(!$(event.target).parents().is(".Drawer_Overlay") || $(event.target).parents().is(".Close"))
		) {
			$(event.target).closest(".On").removeClass("On");
		}
}

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

function shoppingListSlider (event){
	if ($(event.target).is(".Next_Slide") && 
				!$(event.target).attr("disabled")) {
					$(this).closest(".Active_Panel").next().addClass("Active_Panel")
					$(this).closest(".Active_Panel").removeClass("Active_Panel")	
				}
	if ($(event.target).is(".Prev_Slide") && 
				!$(event.target).attr("disabled")) {
					$(this).closest(".Active_Panel").prev().addClass("Active_Panel")
					$(this).closest(".Active_Panel").removeClass("Active_Panel")
				}
}

function shareModalBGSwitcher (event){
	//function to switch .img_container from light to dark
}

function priceTree (event){
	if (
		!$("#Forward").hasClass("Invalid")
	)
	{
		$(".Payment_Information").removeClass("Hidden");
		$("#Forward").addClass("Dark");
	}
	else if ( 
		$(".Filter_Button.Price").is(':checked')
	)
	{
		$("#Forward").removeClass("Invalid").text('Move Forward to Pay [selection here]');
	} 
}

$(document).ready(function(event){

$(resultsHeight);

$(".Pay_Box").click(
	priceTree
);

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
				"left", "0"
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
				"left", "0"
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
	
		//Controls Color Temperature Toggle
	$("button#hideTemp").click(function(){
  $(".Temperature_Options .Button_Group").slideToggle(100, function(){
			$(".Temperature_Options #controlLabel").text(
				$(this).is(':visible') ? "Hide Temperature Options" : "Show Temperature Options");
			$("#tempPlus").toggle();
   $("#tempMinus").toggle();
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
