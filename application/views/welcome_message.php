<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter</title>

	<style type="text/css">
	a {
		padding-left: 5px;
		padding-right: 5px;
		margin-left: 5px;
		margin-right: 5px;
	}
	</style>
</head>
<body>

	<table border='1' style='border-collapse: collapse;'>
		<tr>
			<th>S.no</th>
			<th>Username</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<?php 
		$sno = $row+1;
		foreach($result as $data){
			echo "<tr>";
			echo "<td>".$sno."</td>";
			echo "<td>".$data['username']."</td>";
			echo "<td>".$data['name']."</td>";
			echo "<td>".$data['email']."</td>";
			echo "</tr>";
			$sno++;
		}
		?>
	</table>

	<!-- Paginate -->
	<div style='margin-top: 10px;'>
		<?= $pagination; ?>
	</div>

</body>
</html>