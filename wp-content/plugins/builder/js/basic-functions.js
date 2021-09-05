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

}); //end of document ready			$("button.temp").click(function(){
// 	$(".Results .Search_Grid_Card").each(
// 	function(){
// 		var classes = $(this).attr("class");
// 		var widthxheight = classes.match(/(\d+)w_(\d+)/);
// 		var width = widthxheight[1];
// 		var height = widthxheight[2];
//
// 		$(".Results .Search_Grid_Card .Wrapper").css(
// 			"grid-template-rows", width
// 		);
//
// 		var circle = $("#circleTemplate");
//
// 		for (
// 			let circles = 0;
// 			circles < width * height;
// 			circles++
// 		) {
// 			$(".Results .Search_Grid_Card .Wrapper").append(circle);
// 		};
//
// 	});
//
// });
