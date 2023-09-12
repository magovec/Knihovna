<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$db = "knihovna";

$con = new mysqli($hostname, $username, $password, $db);

if($con->connect_error){
    die("Připojení k databázi se nezdařilo: \n" . $con->connect_error);
}

$title = htmlspecialchars($_POST["title"]);
$author = htmlspecialchars($_POST["author"]);
$genre = htmlspecialchars($_POST ["genre"]);
$pages = htmlspecialchars($_POST ["pages"]);

//naplnění dat do SQL dotazu, ošetření proti SQL injectionu
$stmt = $con->prepare("INSERT INTO books (title, author, genre, pages) VALUES(?, ?, ?, ?)");
$stmt->bind_param("sssi", $title, $author, $genre, $pages);

//podařilo se? ano->vrať mě na příspěvky; ne->napiš mi, proč ne
if($stmt->execute()){
    header("Location: index.php");
    exit();
}
else{
    die("Nepodařilo se odeslat dotaz.\n" . $con->error);
}
