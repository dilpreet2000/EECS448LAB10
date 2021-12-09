<?php

// Password security is !!really important!! for the KU EECS department
$mysqli = new mysqli('mysql.eecs.ku.edu', 'd817s143', 'Hoov4xoo', 'd817s143');

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$query = "SELECT * FROM Posts;";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        if (isset($_POST[$row['post_id']])) {
            $delete_query = "DELETE FROM Posts WHERE post_id = '" . $row['post_id'] . "';";
            if ($result2 = $mysqli->query($delete_query)) {
                echo "Deleted " . $row['post_id'] . " from the table!<br>";
            }
        }
    }
}

echo '</html>';

?>