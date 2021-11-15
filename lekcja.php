<?php
    $day = $_GET['day'];
    $hour = $_GET['hour'];
    $newName = $_GET['przedmiot'];
    $baza = mysqli_connect('localhost', 'root', '', 'plan');
    if(mysqli_errno($baza)) {
        echo "Error";
    }

    if(isset($_GET['edit'])) {
        mysqli_query($baza, "UPDATE plan SET name='$newName' WHERE day='$day' AND hour='$hour';");
    }
    if(isset($_GET['delete'])) {
        mysqli_query($baza, "DELETE FROM plan WHERE day='$day' AND hour='$hour';");
    }
    ob_start();
    header('Location: http://localhost:8080/plan/');
    ob_end_flush();
    die();
    mysqli_close($baza);
?>