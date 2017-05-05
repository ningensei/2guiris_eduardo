var $imagenes = $('.imagenes').imagesLoaded( function() {
  
  $imagenes.show();
  // init Masonry after all images have loaded
  $imagenes.masonry({
    // set itemSelector so .grid-sizer is not used in layout
	itemSelector: '.item',
	// use element for option
	// columnWidth: '.grid-sizer',
	percentPosition: true
  });
});