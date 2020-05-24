
(function ($) {
	"use strict";
	var isEditMode = false;
	$(window).on('elementor/frontend/init', function () {

		//Apply in the Editor mode only
		if ( elementorFrontend.isEditMode() ) { 
			isEditMode = true; 
			//playerLoadedinEditMode = false;
			//Load Music Player content in the Editor mode

			elementorFrontend.hooks.addAction( 'frontend/element_ready/music-player.default', function() {
				if (typeof setIronAudioplayers == 'function') { 
					$('.iron-audioplayer wave').remove();
					setIronAudioplayers();	
				}
			});	
		}
	});

}(jQuery));






			
		


