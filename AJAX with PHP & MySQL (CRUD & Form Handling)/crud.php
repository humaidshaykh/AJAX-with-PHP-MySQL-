<?php

$conn = mysqli_connect("localhost", "root", "", "ajax_testing");


if (isset($_POST["insertData"])) {
    $query = "INSERT INTO `users`(`username`, `password`) VALUES ('$_POST[username]','$_POST[pass]')";

    if (mysqli_query($conn, $query)) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_GET['selectData'])) {
    $queryy = "SELECT * FROM `users`";

    if ($results = mysqli_query($conn, $queryy)) {
        $data = "";
        while ($row = mysqli_fetch_assoc($results)) {
            $data .= "
            <tr>
                <td>$row[username]</td>
                <td>$row[password]</td>
            </tr>
            ";
        }
        echo $data;
    }
}
?>