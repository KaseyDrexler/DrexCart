
// draw attention to a panel

$.fn.flashBackground = function(flashColor, duration) {

	var previousColor = $(this).css('background-color') || '#ffffff';

	var tmpColor      = flashColor || '#ffff99';

	var tmpDuration   = duration || 2000;



	$(this).css('background-color', tmpColor);

	$(this).animate({backgroundColor:previousColor}, tmpDuration);

	return this;

}

// notification

$.fn.notify = function(message, type) {
	if (!type) {
		type = 'success';
	}
	if (type=='success') {
		background = 'rgba(200,255,200,0.6)';
		borderLeft = '4px solid #009900';
		icon = '<i style="position:absolute;right:30px;top:0px;color:#009900;" class="fa fa-check fa-4x"></i>';
	} else if (type=='error') {
		background = 'rgba(255,200,200,0.6)';
		borderLeft = '4px solid #990000';
		icon = '<i style="position:absolute;right:30px;top:0px;color:#990000;" class="fa fa-exclamation fa-4x"></i>';
	} else if (type=='warning') {
		background = 'rgba(255,200,0,0.6)';
		borderLeft = '4px solid #ff9900';
		icon = '<i style="position:absolute;right:30px;top:0px;color:#ff9900;" class="fa fa-exclamation fa-4x"></i>';
	}
	
	$('body').append('<div id="panel-notify" style="border-left:'+borderLeft+';width:300px;padding:20px;position:fixed;top:10px;right:10px;background-color:'+background+';box-shadow:4px 4px 4px rgba(0,0,0,0.6);"><a href="javascript:void(0);" onclick="javascript:$(\'#panel-notify\').remove();" style="position:absolute;right:5px;top:5px;font-weight:bold;color:#999999;text-decoration:none;">x</a>'+icon+'<span style="z-index:5001;padding-right:70px;">'+message+'</span></div>');
	//alert(message);
	/* doesn't work
	$(document).click(function () {
		
			setTimeout(function () {$('#panel-notify').remove()}, 10);
		
	}); */
	setTimeout(function () {
		$('#panel-notify').fadeOut(1000).remove();
		//$(document).unbind('click');
	}, 5000);
	
	return this;

}

