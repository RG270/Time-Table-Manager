
$(".formAd").click(function(e){
	e.preventDefault();
	$(".login-credentials").html(`
		<form id="login-form">
		<div class="form-group >
		<span class="form-group">Administrator ID</span>
		<input class="form-control" type="text" name="username" placeholder="Administrator Id">
		</div>

		<div class="form-group">
		<span class="form-group">Password</span>
		<input class="form-control" type="password" name="password" placeholder="Password">
		</div>

		<div class="form-group">
		<input type="hidden" name="login" value="admin">
		<input type="submit" class="btn btn-info float-right" value="Login">
		</div>
		</form>
		`);
});

$(".formSt").click(function(e){
	e.preventDefault();

	$(".login-credentials").html(`
		<form id="login-form">
		<div class="form-group">
		<span class="form-group">Student ID</span>
		<input class="form-control" type="text" name="username" placeholder="Student Id">
		</div>

		<div class="form-group">
		<span class="form-group">Password</span>
		<input class="form-control" type="password" name="password" placeholder="Password">
		</div>

		<div class="form-group">
		<input type="hidden" name="login" value="student">
		<input type="submit" class="btn btn-info float-right" value="Login">
		</div>
		</form>
		`);
});

$(document).on("submit", "#login-form", function(e){
	e.preventDefault();	

	let form = $(this);
	let form_data = new FormData($(form)[0]);

	$.ajax({

				url: 'action.php', //sending request
				type: 'post', //send information in $_POST
				dataType: 'json', //response datatype
				data: form_data, //what data to be send
				contentType: false, 
				processData: false, 

				success:function(result){ //function called when data.php executed and give some result

					console.log(result);
					
					if(result.type == 'success'){
						Swal.fire({
							type: 'Success',
							title: 'Logged In...',
							html: result.msg
						})
					}

					if(result.login_type == 'success'){
						if(confirm('Welcome'))
							window.location = result.url;
					}

					if(result.type == 'error'){
						Swal.fire({
							type: 'error',
							title: 'OOps...1',
							html: result.msg
						})
					}
				},

				error: function(err){ // function called when error occured on data.php
					console.log(err);
					alert(err.responseText);
					Swal.fire({
						type: 'error',
						title: 'Oops...2',
						html: err.msg
					})
				}
			});
});

// $(document).on("submit", "#student-login", function(e){
// 	e.preventDefault();
// 	console.log(e);
// });