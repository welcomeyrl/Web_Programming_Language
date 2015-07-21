
var createSlideshow = function(slideshowElem, duration) {
	var duration = 5000;
	var transition = 2000; 
	var picture = slideshowElem.children("img");
	var picLength = picture.length;
	var i = 0;
	var  picTransition = function(){
		picture.eq(i).fadeOut(transition, function(){
			i++;
			if (i === picLength){
				i = 0;
			}
			picture.eq(i).fadeIn(transition);
		});
	};

	picture.hide(0);
	picture.eq(0).fadeIn(transition);

	setInterval(picTransition, duration);

};

	

//var funtionname = function() {};

$(document).ready(function() {
	createSlideshow($(".slideshow"));
});





/*
$(document).ready(function() {
	


$(".slideshow img").fadeOut(0).eq(0).fadeIn(0);
var i = 0;

setInterval(function(){

if($(".slideshow img").length > (i+1)){

$(".slideshow img").eq(i).fadeOut(2000).next("img").fadeIn(2000);

i++;

}

else{

$(".slideshow img").eq(i).fadeOut(2000).siblings("img").eq(0).fadeIn(2000);

i= 0;
}

}, 5000);


});

*/




