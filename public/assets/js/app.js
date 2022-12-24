$(function(){
	$('.checkall').on('change',function(){
		var checked = $(this).prop('checked');
		$(this).parents('table').find('tbody td input:checkbox').prop('checked',checked);
	});

	$('table.table tbody input:checkbox').on('change',function(){
		//alert($(this).prop('checked'));
		if($(this).prop('checked') == false){
			$(this).parents('table').find('thead th input:checkbox').prop('checked',false);
		}
	});
});