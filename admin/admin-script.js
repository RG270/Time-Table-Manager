$('.logout').click(function() {
	Swal.fire({
		title: "Are you sure?",
		text: "You will not be able see data after log out!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#ffff00',
		confirmButtonText: 'Yes, I am sure!',
		cancelButtonText: "No, cancel it!",
		closeOnConfirm: false,
		closeOnCancel: false
	}).then(function(isconfirm){
		if(isconfirm.value){
			window.location = 'admin/logout.php';
		}
	});
});

function get_results(get_result_for,target_selector){
	$.ajax({
		url:'admin/admin-action.php',
		type:'post',
		dataType:'json',
		data:{
			[get_result_for]:true
		},
		success:function(res){
			console.log(res);
			$(target_selector).html(res.data);
		},
		error:function(err){
			console.log(err);
		}
	});
}