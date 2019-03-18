<?php
	require "header.php";

	$id = htmlspecialchars($_POST["id"]);

	$name = htmlspecialchars($_POST["name"]);
	$details = htmlspecialchars($_POST["details"]);
	$client = htmlspecialchars($_POST["client"]);
	$date = htmlspecialchars($_POST["date"]);
	$sev = htmlspecialchars($_POST["sev"]);
	$notes = htmlspecialchars($_POST["notes"]);
	$date_obj = new DateTime();
	$sub_time = $date_obj->getTimestamp();
	$status = "new";

	$name = str_replace("'", "", $name);
	$details = str_replace("'", "", $details);
	$notes = str_replace("'", "", $notes);
	$client = str_replace("'", "", $client);

	$sql = "UPDATE tickets set name = '$name', details = '$details', client = '$client', sev = '$sev', notes = '$notes' WHERE id=$id";
	echo "<h1>";
	echo "Running ".$sql."\n";
	if ($conn->query($sql) === TRUE)
	{
		echo "Updated ".htmlspecialchars($_POST["details"])." with title ".htmlspecialchars($_POST["name"]);
		$conn->close();
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else
		echo "Something happened with: ".$sql."<br> Error:".$conn->error;

	echo "</h1>";

?>
