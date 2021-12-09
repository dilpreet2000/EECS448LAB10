<?php
$user_name = $_POST["user_name"];
$user_content = $_POST["user_content"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "d817s143", "Hoov4xoo", "d817s143");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
	if (empty($user_content))
	{
		echo "No content in post!";
	}
	else 
	{
		$query = "SELECT * FROM Users WHERE user_id='$user_name';";
		if ($entity = $mysqli->query($query)) 
		{
   			if($row = $entity->fetch_assoc()) 
			{
      				$query = "INSERT INTO Posts (content,author_id) VALUES ('$user_content','$user_name');";
        			if($mysqli->query($query))
				{
          				echo "Post Added!";
        			}
    			}
    			else
			{
      				echo "User not found!";
    			}
    			$entity->free();
		}
	}
}
$mysqli->close();
?>