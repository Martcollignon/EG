// ==========================
//     SMOOTH SCROLLING 
// ==========================

(function($){  
    $.fn.juizScrollTo = function(speed){  
        if(!speed) var speed = 'slow';  
             
        return this.each(function(){  
            $(this).click(function(){  
                var goscroll = false;  
                var the_hash = $(this).attr("href");  
                var regex = new RegExp("(.*)\#(.*)","gi");  
                var the_element = '';  
   
                if(the_hash.match("\#(.+)")) {  
   
                    the_hash = the_hash.replace(regex,"$2");  
   
                    if($("#"+the_hash).length>0) {  
                        the_element = "#" + the_hash;  
                        goscroll = true;  
                    }  
                    else if($("a[name=" + the_hash + "]").length>0) {  
                        the_element = "a[name=" + the_hash + "]";  
                        goscroll = true;  
                    }  
                         
                    if(goscroll) {  
                        var container = 'html';  
                        if ($.browser.webkit) container = 'body';  
   
                        $(container).animate({  
                            scrollTop:$(the_element).offset().top  
                        }, speed);  
                        return false;  
                    }  
                }  
            });  
        });  
    };  
})(jQuery)  
     
$('a[href^="#"]').juizScrollTo('slow'); 


// ==========================
//     SHOW PEB SECTION
// ==========================


$('.section__peb--show').hide();

$('.more--peb').click(function() {	
  $('.section__peb--show').fadeIn( "quick" );
});

$('.less--peb').click(function() {
	$('.section__peb--show').css( "display", "inherit" );
	$('.section__peb--show').fadeOut( "quick" );
});

// ==========================
//     WAYPOINT LOGO
// ==========================

$(".desktop .section__menu--logo").hide();

$('#section_description').waypoint(function(direction) {
  if (direction === 'down') {
   $(".section__menu--logo").fadeIn();
  }
}, {
  offset: '150'
}).waypoint(function(direction) {
  if (direction === 'up') {
    $(".section__menu--logo").fadeOut();
  }
}, {
  offset: '150'
});


