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
			window.location = 'student/logout.php';
		}
	});
});

function get_results(get_result_for,target_selector){
	$.ajax({
		url:'student/student-action.php',
		type:'post',
		dataType:'json',
		data:{
			[get_result_for]:true
		},
		success:function(res){
			//console.log(res);
			$(target_selector).html(res.data);
		},
		error:function(err){
			console.log(err);
		}
	}).then(function(){

		$('.course_code').on('change', function(e){
			//	alert(this.value + this.id);
			let row = 'tr#' + this.id;
			//console.log($(row).html());
			get_row(this.value, row, $(row).html());
		});

	}).then(function(){
		$('.endBtn').click(function(){
			console.log( $('select#8').value() );
			//window.location = 'student/timetable.php';
		});
	});
}

function get_row(course_code,target_selector, html_){
	$.ajax({
		url:'student/student-action.php',
		type:'post',
		dataType:'json',
		data:{
			['course_code']:course_code
		},
		success:function(res){
			//console.log(res.data);
			$(target_selector).append(res.data);
		},
		error:function(err){
			console.log(err);
		}
	});
}

$('.endBtn').click(function(){
	
	//window.location = 'student/timetable.php';
})