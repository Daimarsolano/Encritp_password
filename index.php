<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encript_pass</title>
</head>
<body>

    <h2>Encriptador de Contraseña en PHP</h2>

    <form method="post" action="">
        <label for="password">Contraseña:</label>
        <input type="text" name="password" placeholder="Ingrese su contraseña">
        <br><br>

        <input type="submit" name="md5" value="Encriptar con MD5">
        <input type="submit" name="sha1" value="Encriptar con SHA1">
        <input type="submit" name="sha256" value="Encriptar con SHA256">
        <input type="submit" name="aes" value="Encriptar con AES">
        <input type="submit" name="bcrypt" value="Encriptar con BCRYPT">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];

        if (isset($_POST["md5"])) {
            $encrypted = md5($password);
        } 
        elseif (isset($_POST["sha1"])) {
            $encrypted = sha1($password);
        } 
        elseif (isset($_POST["sha256"])) {
            $encrypted = hash('sha256', $password);
        }
         elseif (isset($_POST["aes"])) {
            $key = "UnaClaveSecreta123"; 
            $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, 0, $key);
        } 
        elseif (isset($_POST["bcrypt"])) {
            $encrypted = password_hash($password, PASSWORD_BCRYPT);
        }

        echo "<p><strong>Contraseña encriptada:</strong> $encrypted</p>";
    }
    ?>
</body>
</html>
