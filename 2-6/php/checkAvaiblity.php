<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once('server.php');
        $connection = connect();

        $username = $_GET['q'];

        $sql = "SELECT u_username FROM users_table WHERE u_username='$username'";

        $result = mysqli_query($connection,$sql);

        if (mysqli_rows($result) > 0) {
            return false;
        }
        else {
            return true;
        }
    }

?>