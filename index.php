<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="text" name="nazwisko" id="" placeholder="Wpisz nazwisko:">
        <input type="submit" name="submit" id="" value="Filtruj">
    </form>
    <?php
    $polaczenie = mysqli_connect('localhost', 'root', '', 'szkola zsz');

    if (isset($_POST['nazwisko']) && $_POST['nazwisko'] != '') { 
        $nazwisko = $_POST['nazwisko'];
        $nazwisko = mysqli_real_escape_string($polaczenie, $nazwisko);
        $sql = "SELECT * FROM uczniowie WHERE nazwisko='$nazwisko'";
        $wynik = mysqli_query($polaczenie, $sql);
        if (mysqli_num_rows($wynik) > 0) {
            echo "<table border='1'><tr><th>Imię</th><th>Nazwisko</th><th>Wiek</th></tr>";
            while ($wiersz = mysqli_fetch_assoc($wynik)) {
                echo "<tr><td>" . $wiersz["imie"] . "</td><td>" . $wiersz["nazwisko"] . "</td><td>" . $wiersz["wiek"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Brak wyników";
        }
    } else {
        echo "Nie podałeś nazwiska";
    }


    mysqli_close($polaczenie);
    ?>
</body>

</html>