// function cascadeCards () {
$(".Active_Panel .Grid > a").each(
	function(index, element){
		card = $(element);
		setTimeout(function() {
   element.animate({
       left: 0
   }, 1000);
}, i * 2000);
		
	});
	
// };

$filters.on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  $filters.removeClass('active');
  $this.addClass('active');

$("#linguetta_next div").each(function(i) {
    var el = $(this);
    setTimeout(function() {
        el.animate({
            left: 0
        }, 1000);
    }, i * 2000);
});​

// 	$(".Search_Grid_Card").each(
// 	function(index, element){
// 		var classes = $(this).attr("class");
// 		var widthxheight = classes.match(/(\d+)w_(\d+)/);
// 		var width = widthxheight[1];
// 		var height = widthxheight[2];
// 		$(this).attr("onclick", "resize("+width+","+height+");return false;");
// 		$(element).find('.Card_Title').text(width * height + " Pans");
// 
// 		$(element).find('.Wrapper').css({
// 			"grid-template-columns" : "repeat(" + width + ", 1fr)",
// 			"grid-template-rows" : "repeat(" + height + ", 1fr)"
// 		}
// 		);
// 
// 		var circle = $("#circleTemplate");
// 		for (
// 			let circles = 0;
// 			circles < width * height;
// 			circles++
// 		) {
// 			$(element).find('.Wrapper').append(circle.clone());
// 		}
// });