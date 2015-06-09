

$('#menu').click(function(){

	if( $('#main-nav').hasClass('open_menu') ){

		$('#main-nav').removeClass('open_menu');
		$('#menu').removeClass('cross');
		$('#menu').addClass('transition');
		$('#main-nav').addClass('transition');

	}
	else{
		$('#main-nav').addClass('open_menu');
		$('#menu').addClass('cross');
		$('#menu').addClass('transition');
		$('#login-box').removeClass('open');

    $('#setup-box').removeClass('open');
    $('#setup-box').addClass('transition');
	}

});


$('#login').click(function(){

	if( $('#login-box').hasClass('open') ){

    $('#login-box').css('display', 'none');
		$('#login-box').removeClass('open');
		$('#login-box').addClass('transition');
		
	}
	else{
    $('#mdp_oblie').addClass('transition');
    $('#mdp_oblie').removeClass('open');
    $('#login-box').css('display', 'block');
		$('#login-box').addClass('open');
		$('#main-nav').removeClass('open');
		$('#menu').removeClass('cross');

    $('#main-nav').removeClass('open_menu');
    $('#menu').removeClass('cross');
    $('#menu').addClass('transition');
    $('#main-nav').addClass('transition');
	}

});

$('#chat_ico').click(function(){

  if($('#statut_bar').hasClass('open_bar')){

    $('#statut_bar').removeClass('open_bar');
    $('#chat_ico').removeClass('deplace');
    $('#fenetre_message').removeClass('open_fenetre');
    
  }
  else{
    $('#statut_bar').addClass('open_bar');
    $('#chat_ico').addClass('deplace');
    $('#fenetre_message').addClass('open_fenetre');
  }

});

$('#mdp_oblie').css('display', 'none');

$('#mdp').click(function(){

      $('#mdp_oblie').css('display', 'block');
      $('#login-box').addClass('transition');
      $('#mdp_oblie').addClass('open');
      $('#login-box').removeClass('open'); 

});

$('#recuperer').click(function(){

    $('#mdp_oblie').addClass('transition');
    $('#mdp_oblie').addClass('open');
  

});

$('#fermer').click(function(){

    $('#mdp_oblie').addClass('transition');
    $('#mdp_oblie').removeClass('open');
  

});



$('#setup').click(function(){

	if( $('#setup-box').hasClass('open') ){

		$('#setup-box').removeClass('open');
		$('#setup-box').addClass('transition');
		
	}
	else{
		$('#setup-box').addClass('open');
		$('#main-nav').removeClass('open');
		$('#menu').removeClass('cross');

    $('#main-nav').removeClass('open_menu');
    $('#menu').removeClass('cross');
    $('#menu').addClass('transition');
    $('#main-nav').addClass('transition');
	}

});

$('#ok_bene span').click(function(){

	$('#ok_bene').addClass('close');
});

$('#ok_assoc span').click(function(){

	$('#ok_assoc').addClass('close');
});

$('#mail_exist span').click(function(){

	$('#mail_exist').addClass('close');
});

$('#fail span').click(function(){

	$('#fail').addClass('close');
});




$("#avantage_bene").addClass('display');
$("#inscription_bene").addClass('display');
$("#btn_benevole").addClass('current')

$('#btn_association').click(function(){

	$(".public").removeClass('display');
	$("#nav_communaute li").removeClass('current');
	$("#avantage_assoc").addClass('display');
	$("#inscription_assoc").addClass('display');
	$("#btn_association").addClass('current');
	$("#association_img").addClass('up');

});

$('#btn_benevole').click(function(){

	$(".public").removeClass('display');
	$("#nav_communaute li").removeClass('current');
	$("#avantage_bene").addClass('display');
	$("#inscription_bene").addClass('display');
	$("#btn_benevole").addClass('current');
	$("#association_img").removeClass('up');

});

$( "#luxembourg" ).hover(
  function() {
    $('#provinces #lux').addClass( "show" );
  }, function() {
    $('#provinces #lux').removeClass( "show" );
  }
);


$( "#namur" ).hover(
  function() {
    $('#provinces #nam').addClass( "show" );
  }, function() {
    $('#provinces #nam').removeClass( "show" );
  }
);

$( "#hainaut").hover(
  function() {
    $('#provinces #hai').addClass( "show" );
  }, function() {
    $('#provinces #hai').removeClass( "show" );
  }
);

$( "#hainaut2").hover(
  function() {
    $('#provinces #hai').addClass( "show" );
  }, function() {
    $('#provinces #hai').removeClass( "show" );
  }
);

$( "#limbourg").hover(
  function() {
    $('#provinces #lim').addClass( "show" );
  }, function() {
    $('#provinces #lim').removeClass( "show" );
  }
);

$( "#anvers").hover(
  function() {
    $('#provinces #anv').addClass( "show" );
  }, function() {
    $('#provinces #anv').removeClass( "show" );
  }
);


$( "#brabant_wallon").hover(
  function() {
    $('#provinces #bw').addClass( "show" );
  }, function() {
    $('#provinces #bw').removeClass( "show" );
  }
);


$( "#brabant_flamand").hover(
  function() {
    $('#provinces #bf').addClass( "show" );
  }, function() {
    $('#provinces #bf').removeClass( "show" );
  }
);


$( "#flandre_occidentale").hover(
  function() {
    $('#provinces #foc').addClass( "show" );
  }, function() {
    $('#provinces #foc').removeClass( "show" );
  }
);

$( "#flandre_orientale").hover(
  function() {
    $('#provinces #for').addClass( "show" );
  }, function() {
    $('#provinces #for').removeClass( "show" );
  }
);

$( "#bruxelles").hover(
  function() {
    $('#provinces #bxl').addClass( "show" );
  }, function() {
    $('#provinces #bxl').removeClass( "show" );
  }
);

$( "#liege").hover(
  function() {
    $('#provinces #lie').addClass( "show" );
  }, function() {
    $('#provinces #lie').removeClass( "show" );
  }
);




$('#modif span').click(function(){

  $('#tri').removeClass('close');
  $('#tri').addClass('open');

});










