<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: panel.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    if ($login == "admin" && $haslo == "1234") {
        $_SESSION['username'] = $login;

        if (isset($_POST['remember'])) {
            setcookie("login", $login, time() + 7 * 24 * 60 * 60, "/");
        } else {
            setcookie("login", "", time() - 3600, "/");
        }

        header("Location: panel.php");
        exit;
    } else {
        $error = "Błędny login lub hasło!";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>

    <style>
  
  body {
    text-align: center;
    background: pink;
    font-family: Arial;
}

form {
    display: inline-block;
    padding: 20px;
    border: 2px solid black;
    border-radius: 10px;
    background: white;
 
}


 
</style>


</head>
<body>

<h2>Logowanie</h2>

<p style="color:red;"><?= $error ?></p>

<form method="post">
    Login:<br>
    <input type="text" name="login"
           value="<?= htmlspecialchars($_COOKIE['login'] ?? $_POST['login'] ?? '') ?>"
           required><br><br>

    Hasło:<br>
    <input type="password" name="haslo" required><br><br>

    <input type="checkbox" name="remember"> Zapamiętaj mnie<br><br>

    <button type="submit">Zaloguj się</button>
</form>

</body>
</html>
