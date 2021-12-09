<html>

<head>
    <title>Delete Posts</title>
</head>

<body>
    <center><h2>Delete Posts</h2></center>

    <br>
    <br>


    <form method="post" action="DeletePostsBackend.php">
        <table class="table">
            <thead>
            <th>Post id</th>
            <th>User id</th>
            <th>Post content</th>
            <th>Delete?</th>
            </thead>
            <tbody>
            <?php
                $mysqli = new mysqli('mysql.eecs.ku.edu', 'd817s143', 'Hoov4xoo', 'd817s143');

                if ($mysqli->connect_errno) {
                    printf("Connect failed: %s\n", $mysqli->connect_error);
                    exit();
                }

                $query = "SELECT * FROM Posts;";

                if ($result = $mysqli->query($query)) {

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $row_html  = "<tr>";
                        $row_html .= "<td>" . $row['post_id'] . "</td>";
                        $row_html .= "<td>" . $row['author_id'] . "</td>";
                        $row_html .= "<td>" . $row['content'] . "</td>";
                        $row_html .= "<td><input type='checkbox' name='" . $row['post_id'] . "'></td></tr>";
                        echo $row_html;
                    }
                }
            ?>
            </tbody>
        </table>
        <br>
        <input type="submit">
    </form>
</body>

</html>