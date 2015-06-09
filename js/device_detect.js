var isiPhone = /iphone/i.test(navigator.userAgent.toLowerCase());
var isAndroid = /android/i.test(navigator.userAgent.toLowerCase());
var isBlackBerry = /blackberry/i.test(navigator.userAgent.toLowerCase());
var isWindowsPhone = /windows phone/i.test(navigator.userAgent.toLowerCase());


if(isiPhone)
{
   $(location).attr('href',"http://www.cindymateus-design.be/tfe/test/mobile.html");
}
else if(isAndroid){

     $(location).attr('href',"http://www.cindymateus-design.be/tfe/test/mobile.html");
}
else if(isBlackBerry){

      $(location).attr('href',"http://www.cindymateus-design.be/tfe/test/mobile.html");

}
else if (isWindowsPhone) {
  
       $(location).attr('href',"http://www.cindymateus-design.be/tfe/test/mobile.html");
 
};

$(window).resize(function() {

	if($(window).width() < 600){


		$(location).attr('href',"http://www.cindymateus-design.be/tfe/test/mobile2.html");
	}
});