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

	<div class="container0">
		<table class="table table-striped text-center" id="time-table">
			<thead>
				<th>Days/Time</th>
				<th>8:00AM - 9:30AM</th>
				<th>9:30AM - 11:00AM</th>
				<th>11:00AM - 12:30PM</th>
				<th></th>
				<th>1:00PM - 1:55PM</th>
				<th>2:00PM - 2:55PM</th>
				<th>3:00PM - 3:55PM</th>
				<th>4:00PM - 4:55PM</th>
				<th>5:00PM - 5:55PM</th>
			</thead>
			<tbody>
				<tr><td>MON</td></tr>
				<tr><td>TUE</td></tr>
				<tr><td>WED</td></tr>
				<tr><td>THU</td></tr>
				<tr><td>FRI</td></tr>
			</tbody>
		</table>
	</div>

	<script src="student/student-script.js"></script>
	<script>
		get_results('get_timetable', '#time-table tbody');
	</script>
</body>
</html>