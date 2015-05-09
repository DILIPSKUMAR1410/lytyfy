// var scrollCount =0;
// $(document).ready(function()
// {
// 	var h=$( window ).height();
// 	$(".box").css({'height':h+'px'});
// 	$("#small-box-container").css({'height':h-200+'px'});
// 	$("#solutions-container").css({'height':h-200+'px'});
// 	$("#careers-container").css({'height':h-200+'px'});
// 	$("#careers-link").css({'height':h-200+'px'});
// 	$(".small-box").css({'height':h+'px'});
// 	$(".sl-box1").css({'height':h+'px'});
// 	$(".sl-box2").css({'height':h+'px'});
// 	$(".link").css({'height':((h-200)/3)+'px','padding-top':((h-200)/6)+'px'});
// 	// Scroll the whole document 
// 	$('nav').localScroll({
// 	   target:'body'
// 	});		
// 	// Scroll the content inside the #scroll-container div
// 	$('#about-links').localScroll({
// 	   target:'#small-box-container'
// 	});	
// 	$('#solutions-links').localScroll({
// 	   target:'#solutions-container'
// 	});		
// 	$('#careers-links').localScroll({
// 	   target:'#careers-container'
// 	});	
// 	$("body").keydown(function(ev){
//         if(ev.which == 40 ) {
//         	if(scrollCount == 0) {
//         		scrollCount++;
//            		$("html, body").animate({ scrollTop: "700px" });
//            	}
//            	else if(scrollCount == 1) {
//            		scrollCount++;
//            		$("html, body").animate({ scrollTop: "1400px" });
//            	} else if (scrollCount == 2) {
//            		scrollCount++;
//            		$("html, body").animate({ scrollTop: "2100px" });
//            	}
//         }
//         if(ev.which == 38 ) {
//         	if(scrollCount == 1) {
//         		scrollCount++;
//            		$("html, body").animate({ scrollTop: "0px" });
//            	}
//            	else if(scrollCount == 2) {
//            		scrollCount++;
//            		$("html, body").animate({ scrollTop: "700px" });
//            	} else if (scrollCount == 2) {
//            		scrollCount++;
//            		$("html, body").animate({ scrollTop: "1400px" });
//            	}
//         }
// 	});			
// });
