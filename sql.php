<?php
    $query = $_GET["query"];

    $baza = mysqli_connect('localhost', 'root', '', 'plan');
    if(mysqli_errno($baza)) {
        echo "Error";
    }

    $result = mysqli_query($baza, $query);

    while($row = mysqli_fetch_array($result)) {
        echo "$row[0] | $row[1] | $row[2] | $row[3] | $row[4]<br>";
    }

    mysqli_close($baza);
?>