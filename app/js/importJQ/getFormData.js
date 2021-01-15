(function ($)
{
	$(document).ready(function ()
	{
		var options = {
			target: '#output1',
			// success: showResponse,

			// other available options:
			url: myajax.url,       // override for form's 'action' attribute
			type: 'post',
			delegation: true,

		};

		$('#globalForm').ajaxForm(options);
	});

	function showResponse(responce)
	{
		let dta= responce.data
		$.each(dta, function (index, value)
		{
			$('#'+index).after(value)
		})
		console.log(responce.data)
		$('#error').replaceWith(responce.data)
	}

})(jQuery);