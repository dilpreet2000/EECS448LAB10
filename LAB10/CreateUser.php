<?php
$user_name = $_POST["user_name"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "d817s143", "Hoov4xoo", "d817s143");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
	if (empty($user_name))
	{
		echo "Username missing! Can not add a blank Username.";
	}
	else 
	{
		$query = "INSERT INTO Users (user_id) VALUES ('$user_name');";

		if(strlen($user_name)>0&&($mysqli->query($query)))
		{
  			echo "User Added!";
		}
		else
		{
  			echo "Cannot add username.";
		}
	}
}
$mysqli->close();
?>