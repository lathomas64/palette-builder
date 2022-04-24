function resizeControls () {
	const shadowControls = document.querySelectorAll('.Shadow_Controls');
console.log('boop 2');
const resizeObserver = new ResizeObserver(entries => {
	console.log('boop 5');
	console.log(entries);
		for (let entry of entries) {
				// if(entry.contentBoxSize) {
				// 		// Firefox implements `contentBoxSize` as a single content rect, rather than an array
				// 		const contentBoxSize = Array.isArray(entry.contentBoxSize) ? entry.contentBoxSize[0] : entry.contentBoxSize;
				// 		// h1Elem.style.fontSize = Math.max(1.5, contentBoxSize.inlineSize / 200) + 'rem';
				// 		// pElem.style.fontSize = Math.max(1, contentBoxSize.inlineSize / 600) + 'rem';
				// } else {
				console.log('boop14');
				if(entry.contentRect.width < 125) {
					console.log(entry.target);
					entry.target.classList.add('Sub_125');
			}
				// }
		}
});
shadowControls.forEach(entry => {
		resizeObserver.observe(entry);
});
}



function stickyNav(){
	var $sticky = $(".Sticky");
	// $sticky.addClass('Scrolled');
	$sticky.toggleClass('Scrolled', $('.Filter_Wrapper').scrollTop() > $sticky.height());
	};

function toggleSelect() {
	$(this).toggleClass("Selected");
}

function filterBtnReset() {
	$(".Accordion .Filter_Button").removeClass("Selected");
}

function toggleAccordion() {
	var $AccTrigger = $(".Accordion .Trigger");
		$AccTrigger.toggleClass("Selected", !$AccTrigger.hasClass("Selected"));
		var text = $(".Toggle_Accordion .text").text();
		$('.Toggle_Accordion .text').text(
						text == "Open All" ? "Close All" : "Open All");
			$("svg.svgPlus").toggleClass("Hidden");
			$("svg.svgMinus").toggleClass("Hidden");
		};

function openShadowDetail(target)
{

	var shadowDetail = $("#shadowDetail");
	var arrangementSpace = $(".Builder");
	var builderWidth = arrangementSpace.outerWidth();
	var detailPanelWidth = shadowDetail.outerWidth();

	$(target).addClass("Hovered");
	update_shadow_detail($(target));
	shadowDetail.css("left", builderWidth - detailPanelWidth);
	shadowDetail.css("display", "flex");
	setTimeout(function () {
		shadowDetail.addClass("Fade_In");
	}, 500);
}

function closeShadowDetail(target, fastClose=100)
{
	var shadowDetail = $("#shadowDetail");
	$(target).removeClass("Hovered");
	setTimeout(function () {
		if ($(".Hovered").length == 0) {
			shadowDetail.removeClass("Fade_In");
			shadowDetail.css("left", "0");
			shadowDetail.css("display", "");
		}
	}, fastClose);
}

function resultsHeight(event) {
	if ($(event.target).is(".Dismiss")) {
		var helperBox = $(event.target).closest(".Helper_Box");
		helperBox.addClass("Closed");
		setTimeout(function () {
			helperBox.addClass("Hidden");
		}, 300);
		var resultsContainerHeight = $(".Right_Panel").outerHeight() - helperBox.outerHeight() - $(".Results_Control_Bar").outerHeight();
		$(".Results_Container").css("height", resultsContainerHeight);
	} else {
		var resultsContainerHeight = $(".Right_Panel").outerHeight() - $(".Helper_Box").outerHeight() - $(".Results_Control_Bar").outerHeight() - 48;
		$(".Results_Container").css("height", resultsContainerHeight);
		$(".Results_Container")[0].setAttribute("onscroll", "shadow_list.load_shadows(true);");
	}
}

function modalOpen(event) {
	//Open Modal Container
	if ($(event.target).parents().is(".Modal_Trigger.Center")) {
		$("#centerModal").addClass("On");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Left")) {
		$("#leftDrawer").addClass("On");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Right") || $(event.target).is(".Modal_Trigger.Right")) {
		$("#rightDrawer").toggleClass("On");
	}
	//Display Modal Content
	if ($(event.target).is("#shadowFilterBtn")) {
		$("#advancedFilterContent").addClass("On");
	}
	if ($(event.target).is(".Modal_Trigger.List")) {
		$(".Check_List").addClass("Active_Panel");
		$(".Copy_Code").removeClass("Active_Panel");
		$(".Buy_Shadows").removeClass("Active_Panel");
		build_shopping_list();
		$("#listDrawer").addClass("On");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Builder_Share")) {
		$(".Share_Modal").addClass("On");
		$(".Share_Modal").removeClass("Hidden");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Help")) {
		$("#genericModal").addClass("On");
		$("#genericModal").removeClass("Hidden");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Disclaimer")) {
		$("#genericModal").addClass("On");
		$("#genericModal").removeClass("Hidden");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Log_In")) {
		$(".Login_Content").addClass("On");
		$(".Register_Content").removeClass("On");
	}
	if ($(event.target).parents().is(".Modal_Trigger.Register")) {
		$(".Register_Content").addClass("On");
		$(".Login_Content").removeClass("On");
	}
}

function modalClose(event) {

	var CloseBtn = $(".Modal").hasClass("On") && ($(event.target).is(".Drawer_Overlay") || $(event.target).parents().is(".Close") || $(event.target).is("Close"));

	if ((CloseBtn) && $(event.target).parents().is("#rightDrawer")) {
		$(".Filter_Wrapper").scrollTop(0);
		$("#advancedFilterBtn").removeClass("Selected");
		stickyNav();
	}

	if (CloseBtn) {
		$(event.target).parents().removeClass("On");
	}

}

function shoppingListSlider(event) {
	if ($(event.target).is(".Next_Slide") && !$(event.target).attr("disabled")) {
		$(this).closest(".Active_Panel").next().addClass("Active_Panel");
		$(this).closest(".Active_Panel").removeClass("Active_Panel");
	}
	if ($(event.target).is(".Prev_Slide") && !$(event.target).attr("disabled")) {
		$(this).closest(".Active_Panel").prev().addClass("Active_Panel");
		$(this).closest(".Active_Panel").removeClass("Active_Panel");
	}
}

function shareModalBGSwitcher(event) {
	if ($("#lightBG").is(":checked")) {
		$("Img_Container").removeClass(".Dark");
		$("Img_Container").addClass(".Light");
	} else if ($("#darkBG").is(":checked")) {
		$("Img_Container").removeClass(".Dark");
		$("Img_Container").addClass(".Light");
	}
}

function priceTree(event) {
	if (!$("#Forward").hasClass("Invalid")) {
		$(".Payment_Information").removeClass("Hidden");
		$("#Forward").addClass("Dark");
	} else if ($(".Filter_Button.Price").is(":checked")) {
		$("#Forward").removeClass("Invalid").text("Move Forward to Pay [selection here]");
	}
}

$(document).ready(function (event) {

resizeControls();

	sort_children('data-color-sort', '#Shadow_Search .Results .Grid', true);
	$("BG_Options").click(shareModalBGSwitcher);

	$(resultsHeight);

	$(".Toggle_Accordion").click(toggleAccordion);

	$(".Filter_Button").click(toggleSelect);
	$(".Accordion .Trigger").click(toggleSelect);

	$(".Pay_Box").click(priceTree);

	$(".Dismiss").click(resultsHeight);

	$(".Modal_Trigger").click(modalOpen);

	$(".Modal").click(modalClose);

	$("#listDrawer button").click(shoppingListSlider);

	//Controls Builder Bottom Toggle
	$("#hideMeta").click(function () {
		$(".Info_Bar").slideToggle(100, function () {
			$("#controlLabel").text($(this).is(":visible") ? "Hide Panel" : "Show Panel");
			$("#svgPlus").toggle();
			$("#svgMinus").toggle();
			$("#hideMeta").toggleClass("Minimized_Tab");
		});
	});

	//Controls Color Temperature Toggle
	$("button#hideTemp").click(function () {
		$(".Temperature_Options > .Temperature_Options_Drawer").slideToggle(100, function () {
			$(".Temperature_Options #controlLabel").text($(this).is(":visible") ? "Hide Temperature Options" : "Show Temperature Options");
			$("#tempPlus").toggle();
			$("#tempMinus").toggle();
		});
	});

	// Changing panels with button click
	$(".Right_Panel_Nav button").click(function () {
		var numberIndex = $(this).index();

		if (!$(this).is("Active_Panel")) {
			$("button").removeClass("Active_Panel");
			$(".Search_Filter_Panel").removeClass("Active_Panel");

			$(this).addClass("Active_Panel");
			$(".Search_And_Filter").find(".Search_Filter_Panel").eq(numberIndex).addClass("Active_Panel");
		}
	});

	//Draw circles for story cards
	$(".Search_Grid_Card").each(function (index, element) {
		var classes = $(this).attr("class");
		var widthxheight = classes.match(/(\d+)w_(\d+)/);
		var width = widthxheight[1];
		var height = widthxheight[2];
		$(this).attr("onclick", "shadow_story.resize(" + width + "," + height + ");return false;");
		$(element)
			.find(".Card_Title")
			.text(width * height + " Pans");

		$(element)
			.find(".Wrapper")
			.css({
				"grid-template-columns": "repeat(" + width + ", 1fr)",
				"grid-template-rows": "repeat(" + height + ", 1fr)",
			});

		var circle = $("#circleTemplate");
		for (let circles = 0; circles < width * height; circles++) {
			$(element).find(".Wrapper").append(circle.clone());
		}
	});

	//////Close When Out-Click

	//Show and Hide Palette Summary List
	$("#toggleListBtn").click(function () {
		$(".Palette_Contents").slideToggle(100, function () {
			$("#toggleListBtn").text($(this).is(":visible") ? "Hide List" : "Show List");
			$(".Text_Button").find(".svgPlus").toggle();
			$(".Text_Button").find(".svgMinus").toggle();
		});
		setTimeout(function () {
			if ($(".Palette_Contents").prop("scrollHeight") > $(".Palette_Contents").outerHeight()) {
				$(".Scroll_Prompt").show();
			}
		}, 100);
	});


}); //end of document ready
