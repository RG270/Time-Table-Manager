<!DOCTYPE html>
<html>
<head>
	<?php
	include 'session.php';
	include 'head.php';
	?>
</head>
<body>
	<?php
	include 'navbar.php'
	?>

	<div class="container">
		<div class="container">
			<h2>Select Floating Courses</h2>
			<table class="table table-striped" id="courses-table">
				<thead>
					<th>S.No.</th>
					<th>Slot</th>
					<th>Course Code</th>
					<th>Course Name</th>
					<th>Type</th>
					<th>Credits</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>

	<script src="admin/admin-script.js"></script>
	<script>
		get_results('get_courses', '#courses-table tbody');
	</script>
</body>
</html>