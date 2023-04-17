<html>
	<head>
		<title>My submitted page</title>
	</head>
	<body>
		Hello <?php echo $_POST['tName']; ?>
		<br>
		You like Movie <?php echo $_POST['tMovie']; ?>
		<br>
		You are enrolled for <?php echo $_POST['sDegree']; ?> degree.
		<br>
		<?php $status = $_POST['gender']; ?>
		Your gender is <?php echo $status ?>
		<br>
		Your favourite subject is <?php 
			foreach ($_POST['msunit'] as $selectedOption)
				echo $selectedOption."\n";
		?>
	</body>
</html>	