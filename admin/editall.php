<?php
	require_once('phpscripts/config.php');

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit record of given table, column and id.</title>
</head>
<body>
	<?php
		$tbl = "tbl_cast";
		$col = "cast_id";
		$id = 1;
		echo single_edit($tbl, $col, $id);
	?>
</body>
</html>