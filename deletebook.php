$neco = $_GET[""]; //$_GET[""] = www.dzardys.eu/pica -> ?args=... <- ===> www.dzardys.eu/pica?args=kkt
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

//naplnění dat do SQL dotazu, ošetření proti SQL injectionu
$stmt = $con->prepare("DELETE FROM books WHERE id=?");
$stmt->bind_param("i", $id);



//podařilo se? ano->vrať mě na příspěvky; ne->napiš mi, proč ne
if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    die("Nepodařilo se odeslat dotaz.\n" . $con->error);
}

