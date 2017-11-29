$(function() {
	$('#menuShowItem').click(function() {
		$( "##menuList li:not(#menuShowItem)" ).each(function( index ) {
		  $( this ).slideToggle();
		});
		}, function() {
		// on mouseout, reset the background colour
		$( "#menuList li:not(#menuShowItem)" ).each(function( index ) {
		  $( this ).slideToggle();
		});
	});
});
$('.leagueItem').click(function(){
	console.log("hey")
	$(this).findChild(".leagueDescription").slideToggle();
});

$( window ).resize(function() {
  if($( window ).width()>768){
	  $("#menuShowItem").css("display","none");
  }else{
	  $("#menuShowItem").css("display","block");
  }
});