<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wyświetlanie danych</title>
</head>
<body>

<form method="post">
    <select name="tb_name"></select>
    <button type="submit" name="abcd">Klikaj mnie tu</button>
</form>

<?php
if (isset($_POST['abcd'])) {

    echo "<h3>Wynik:</h3>";

    $conn = new mysqli("localhost", "root", "", "firma");

    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $sql = "SHOW TABLES FROM firma";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Nazwa tabeli</th></tr>";

        while($row = $result->fetch_row()) {
            echo "<tr><td>" . htmlspecialchars($row[0]) . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "Brak tabel w bazie.";
    }

    $conn->close();
}
?>

</body>
</html>
