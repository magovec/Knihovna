<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$db = "knihovna";

$con = new mysqli($hostname, $username, $password, $db);

if ($con->connect_error) {
    die("Připojení k databázi se nezdařilo: \n" . $con->connect_error);
}
$id = htmlspecialchars($_GET["id"]);
$role = htmlspecialchars($_GET["role"]);

//naplnění dat do SQL dotazu, ošetření proti SQL injectionu
$stmt = $con->prepare("UPDATE users SET role=? WHERE id=?");
$stmt->bind_param("ii", $role, $id);



//podařilo se? ano->vrať mě na příspěvky; ne->napiš mi, proč ne
if ($stmt->execute()) {
    header("Location: admin.php");
    exit();
} else {
    die("Nepodařilo se odeslat dotaz.\n" . $con->error);
}
