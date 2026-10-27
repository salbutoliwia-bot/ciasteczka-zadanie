<?php
session_start();

//  czy użytkownik jest zalogowany
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
</head>
<body>

    <h1>
        Witaj, <?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>!
    </h1>

    <p>Udało Ci się zalogować do panelu użytkownika.</p>

    <a href="logout.php">Wyloguj się</a>

</body>
</html>