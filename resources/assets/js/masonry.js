  var masonryInit = true;

  if( $('.masonry-item').length ) {

    var $container = $('.masonry_container');

    if( masonryInit ) {

      masonryInit = false;

      $container.masonry({
        itemSelector: '.masonry-item'
      });

    } else {

      $container.masonry('reloadItems');

    }

    $container.imagesLoaded( function() {

      $container.masonry();

    });

  }