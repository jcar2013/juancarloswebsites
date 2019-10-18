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

  window.onresize = function()
	{
		footer_adjustment();
  };
  
  window.onload = function()
	{
		footer_adjustment();
  };
  
})( jQuery );
