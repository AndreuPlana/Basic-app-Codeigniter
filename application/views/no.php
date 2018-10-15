<!DOCTYPE html>
<html>
<head>
	<title>No</title>
</head>
<body>
	<?php 
foreach ($res as $key => $f) {
    foreach ($f as $key => $value) {
        echo $value."<br>";
    }
    echo "<br>";
}

	 ?>
</body>
</html>