( function( $ )
{
  function footer_adjustment()
	{
		if ( document.querySelector( 'footer#colophon' ) ) 
		{
			var footer_height = document.querySelector( 'footer#colophon' ).offsetHeight,
			new_space;

			new_space = document.querySelector( 'body' );
			new_space.style.paddingBottom = footer_height + 'px';
		}
	}
	
	function navbar_collapse()
	{
		var intFrame = window.innerHeight;
		var heroImage = document.querySelector('.hero-wrap').offsetHeight;
		console.log(heroImage);
		console.log(intFrame);
		if ($("#masthead").offset().top > heroImage) {
			$("#masthead").addClass("transparent-header");
		} else {
			$("#masthead").removeClass("transparent-header");
		}
	}

  window.onresize = function()
	{
		footer_adjustment();
  };
  
  window.onload = function()
	{
		footer_adjustment();

		navbar_collapse();
		$(window).scroll(navbar_collapse);
  };
  
})( jQuery );
