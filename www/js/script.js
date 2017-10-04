$('document').ready(function (){
	
	$('.delete_field').click(function (){
		
		if ( confirm('Are you sure') )
		{
			var url = $(this).attr('href');
			var tr = $(this).parent().parent();
			$.get(url, {}, function (){
				$(tr).fadeOut();
			}, 'json');
		}
	});
	
	$('input.date').datepicker();
	//$('input.date').datepicker( "option", "dateFormat","yy-mm-dd");
})