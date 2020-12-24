<?php

include '../db.php'

if(isset($_POST['get_courses'])){
	$sql = "SELECT * FROM `courses`";
	$res = mysqli_query($db,$sql);

	if(mysqli_affected_rows($db) > 0){
		$row = '';
		$x = 1;
		while($d = mysqli_fetch_assoc($res)){
			$row .= "<tr>
			<th scope='row'>$x</th>
			<td>$d[slot]</td>
			<td>$d[course_code]</td>
			<td>$d[course_name]</td>
			<td>$d[type]</td>
			<td>$d[credits]</td>
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