(function($){
	$.fn.UItoTop = function(options) {

 		var defaults = {
			text: '',
			min: 500,			
			scrollSpeed: 800,
  			containerID: 'toTop',
  			containerClass: 'toTop fa fa-angle-up',
			easingType: 'linear'
					
 		};

 		var settings = $.extend(defaults, options);
		var containerIDhash = '#' + settings.containerID;
		var containerHoverIDHash = '#'+settings.containerHoverID;
			
		$('body').append('<a href="#" id="'+settings.containerID+'" class="'+settings.containerClass+'" >'+settings.text+'</a>');		
		
		$(containerIDhash).click(function(){
			$('html, body').stop().animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		
								
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': $(window).scrollTop() + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) 
				$(containerIDhash).addClass('active');
			else
				$(containerIDhash).removeClass('active');
		});
};
})(jQuery);
