<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zmiana planu lekcji</title>
    <style>
        #lekcja {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <form action="sql.php" method='GET' id='sql'>
        <input type="text" name='query'>
        <button type='submit'>SQL</button>
    </form>

    <form action="lekcja.php" method='GET' id='lekcja'>
        <select name="day">
            <option value="1">Poniedziałek</option>
            <option value="2">Wtorek</option>
            <option value="3">Sroda</option>
            <option value="4">Czwartek</option>
            <option value="5">Piątek</option>
        </select>

        <select name="hour">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>

        <select name="przedmiot">
            <?php
                $baza = mysqli_connect('localhost', 'root', '', 'plan');
                if(mysqli_errno($baza)) {
                    echo "Error";
                }

                $result = mysqli_query($baza, "SELECT DISTINCT name FROM plan;");

                while($row = mysqli_fetch_array($result)) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }

                mysqli_close($baza);
            ?>
        </select>
        <input type='submit' name='edit' value='Dodaj zastępstwo'><br>
        <input type='submit' name='delete' value='Usuń'>
    </form>
</body>
</html>