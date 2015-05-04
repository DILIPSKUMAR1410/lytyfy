
jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $('.coming-soon').backstretch([
      "/bundles/deviabapp/images/backgrounds/1.jpg"
    , "/bundles/deviabapp/images/backgrounds/2.jpg"
    , "/bundles/deviabapp/images/backgrounds/3.jpg"
    , "/bundles/deviabapp/images/backgrounds/4.jpg"
    , "/bundles/deviabapp/images/backgrounds/5.jpg"
    ], {duration: 3000, fade: 750});

   

    /*
        Tooltips
    */
    $('.social a.facebook').tooltip();
    $('.social a.twitter').tooltip();
    $('.social a.dribbble').tooltip();
    $('.social a.googleplus').tooltip();
    $('.social a.pinterest').tooltip();
    $('.social a.flickr').tooltip();

   

});

