<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAN LEKCJI</title>
    <style>
        table {
            background-image: linear-gradient(
                to bottom right, #09dbca, #37e310
            );
        }
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr, td {
            margin: 0;
            padding: 10px 15px;
            text-align: center;
        }

        .header {
            background-color: rgb(155, 155, 155);
        }
    </style>
</head>
<body>
    <table>
        <th colspan='6' class='header'>PLAN LEKCJI</th>
        <tr class='header'>
            <td>Godzina</td>
            <td>Poniedziałek</td>
            <td>Wtorek</td>
            <td>Sroda</td>
            <td>Czwartek</td>
            <td>Piątek</td>
        </tr>
        <?php

            $baza = mysqli_connect('localhost', 'root', '', 'plan');
            if(mysqli_errno($baza)) {
                echo "Error";
            }

            for ($h=1; $h <= 9; $h++) {
                echo "<tr><td class='header'>$h</td>";
                for ($d=1; $d <= 5; $d++) {
                    $result = mysqli_query($baza, "SELECT * FROM plan WHERE hour=$h AND day=$d;");
                    $row = mysqli_fetch_array($result);
                    if($row) {
                        echo "<td>$row[3]<br><sub>$row[4]</sub></td>";
                    } else echo "<td></td>";
                }
                echo "</tr>";
            }
            
            mysqli_close($baza);
        ?>
    </table>
    <a href="form.php"><button>Zmień</button></a>
</body>
</html>