$(document).ready(function() { 
   gridder();
   
});

function gridder() {
	$('#gridder').click(function  () {
		$('#wrapper').toggleClass('showgrid');
	})
}

/*
// plugin definition
$.fn.btnHit = function(options) {
	// Extend our default options with those provided.
	// Note that the first arg to extend is an empty object -
	// this is to keep from overriding our “defaults” object.
	var opts = $.extend({}, $.fn.btnHit.defaults, options);  
	$this = $(this);
	
	$this.click(function  () {
		console.log('foo');
		return false;
	});
	
	
	};
	// plugin defaults – added as a property on our plugin function
$.fn.btnHit.defaults = {
	
};
 
*/

$('li.next a, li.prev a').live('click', function(e) {
	e.preventDefault();
	$this = $(this);
	$parentDiv = $this.parents('div:first');
	$parentDiv.html('<img src="/images/shared/loader.gif" alt="Loading" />');
	$.get($this.attr('href'), function(data) {
		if(data.length > 0)
		{
			$parentDiv.html(data);
		}
	});
});

$('.complete').click(function(e) {
	e.preventDefault();
	$url = 'http://goodbeerbadmovie.com/share/'+$('#movieId').val()+'/'+$('#beerId').val();
	window.location = $url;
});