
$(function() {
	// run the currently selected effect
	function hideSocialPlugin() {
		// run the effect
		$("#social-icons").hide("slide",'percent: 0',2000,showShowButton);
	};

	function hideShowButton() {
		// run the effect
		$("#show-social-plugin").hide("slide",'percent: 0',2000,showSocialPlugin);
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
	
});
