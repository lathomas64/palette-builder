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

$(".Story_Size .Search_Grid_Card").each(
	function(){
		var classes = $(this).attr("class");
		var widthxheight = classes.match(/(\d+)w_(\d+)/);
		var width = widthxheight[1];
		var height = widthxheight[2];
		
		$(".Wrapper").css({
			"display" : "grid",
			"grid-template-rows" : height,
			"grid-template-columns" : width
			}
		);
		
		var circle = $("#circleTemplate");
			
		for (
			let circles = 0; 
			circles < width * height; 
			circles++
		) {
			$(".Wrapper").appendChild(circle);
		};
			
	});
	
}); //end of document ready