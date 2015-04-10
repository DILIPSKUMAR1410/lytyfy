
$(function() {
	// run the currently selected effect
	function hideSocialPlugin() {
		// run the effect
		var options = {};
		$("#social-icons").hide("size",options,1000,showShowButton);
	};

	function hideShowButton() {
		// run the effect
		showSocialPlugin();
		$("#show-social-plugin").hide();//"size",'percent: 0',2000,showSocialPlugin);
	};

	// callback function to bring a hidden box back
	function showShowButton() {
			$( "#show-social-plugin" ).removeAttr( "style" ).hide().fadeIn();
	};

	function showSocialPlugin() {
		$( "#social-icons" ).removeAttr( "style" ).hide().fadeIn();
	};
	
	// set effect from select menu value
	$( "#hide-social-plugin" ).click(function() {
		hideSocialPlugin();
	});
	
	$( "#show-social-plugin" ).click(function() {
	hideShowButton();
	});
	var stateHide=true;
	$(document).ready(function(){
	    $("#state").click(function(){
	    	stateHide = stateHide ? false : true;
	        $("#stateToggle").toggle("fast","swing");
	        if(stateHide) {
	        	$("#state+-").text("+");}
	        else
	        	$("#state+-").text("-");
	        
	    });
	});

	
});



