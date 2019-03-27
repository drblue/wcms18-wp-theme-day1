(function($) {

	$(document).ready(function() {
		// This will be run when DOM has signaled that it has finished rendering all elements
		$('.card').on('click', function(e) {
			console.log("Ooooh someone tickled me, here's the details:", e);
		});
	});

})(jQuery);
