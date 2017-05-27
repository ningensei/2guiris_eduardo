setTimeout(function(){
	$('.novedades').masonry({
	  // set itemSelector so .grid-sizer is not used in layout
	  itemSelector: '.item',
	  // use element for option
	  // columnWidth: '.grid-sizer',
	  percentPosition: true
	});
}, 100);
	
