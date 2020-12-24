<?php

include '../db.php';
function ok($res = "Default Output"){
	exit(json_encode($res));
}

if(isset($_POST['get_courses'])){
	$x = 1;
	$y = 'A';
	$row = '';
	
	while($y != 'I'){

		$sql = "SELECT * FROM `student-courses` where `slot` = '$y'";
		$res = mysqli_query($db,$sql);

		if(mysqli_affected_rows($db) > 0){
			$row .= "<tr id='$x'>
			<th scope='row'>$x</th>
			<td>$y</td>
			<td><select class='course_code' id='$x'>
			<option selected='selected' value='free'>Free</option>";
			while($d = mysqli_fetch_assoc($res)){
				$row .= "<option value='$d[course_code]'>$d[course_code]</option>";
			}
			$row .= "</select></td><span id='data'></span></tr>";
		}else{
			$row .= "<tr>
			<th scope='row'>$x</th>
			<td>$y</td>
			<td>No course Floated</td>
			</tr>";
		}
		$x++;
		$y++;
	}
	$output['type'] = 'success';
	$output['data'] = $row;
	ok($output);
}

if(isset($_POST['course_code'])){

	$code = $_POST['course_code'];

	$sql = "SELECT * FROM `student-courses` where `course_code` = '$code'";
	$res = mysqli_query($db,$sql);

	if(mysqli_affected_rows($db) > 0){
		$row = '';
		while($d = mysqli_fetch_assoc($res)){
			$row .= "<td>$d[course_name]</td>
			<td>$d[type]</td>
			<td>$d[credits]</td>";
		}
	}
	$output['type'] = 'success';
	$output['data'] = $row;
	ok($output);
}

if(isset($_POST['get_timetable'])){
	$week = array("MON", "TUE", "WED", "THU", "FRI");
	$lunch = "LUNCH";

	$sql = "SELECT * FROM `cse_timetable`";
	$res = mysqli_query($db,$sql);

	if(mysqli_affected_rows($db) > 0){
		$row = '';
		$x = 0;

		while($d = mysqli_fetch_assoc($res)){
			$row .= "<tr>
			<th scope='row'>$week[$x]</th>
			<td>$d[1]</td>
			<td>$d[2]</td>
			<td>$d[3]</td>
			<td><strong>$lunch[$x]</strong></td>
			<td>$d[4]</td>
			<td>$d[5]</td>
			<td>$d[6]</td>
			<td>$d[7]</td>
			<td>$d[8]</td>
			</tr>";

			$x++;
		}	
		$output['type'] = 'success';
		$output['data'] = $row;
		ok($output);	
	}else{
		$output['type'] = 'success';
		$output['data'] = "<tr><td>No Result Found...</td></tr>";
		ok($output);	
	}
}

?>

