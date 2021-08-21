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
	
	
	// Acc
	$(".Right_Panel_Nav button").click(
		function(){
	var numberIndex = $(this).index();

	if (!$(this).is("Active_Panel")) {
		$("button").removeClass("Active_Panel");
		$(".Search_Filter_Panel").removeClass("Active_Panel");

		$(this).addClass("Active_Panel");
		$(".Search_And_Filter").find(".Search_Filter_Panel").eq(numberIndex).addClass("Active_Panel");

//		var listItemHeight = $(".naccs ul")
//			.find("li:eq(" + numberIndex + ")")
//			.innerHeight();
//		$(".naccs ul").height(listItemHeight + "px");
	}
});

}); //end of document ready