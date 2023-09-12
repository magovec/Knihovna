<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$db = "knihovna";

$con = new mysqli($hostname, $username, $password, $db);

if($con->connect_error){
    die("Připojení k databázi se nezdařilo: \n" . $con->connect_error);
}
session_start();
?>
<!doctype html>
<html lang="cs" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <link href="design/bootstrap-dark.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Domů</a>
                </li>
                <?php if(!isset($_SESSION["logged"])){?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Registrace</a>
                </li>
                <?php }?>
                <?php if(isset($_SESSION["logged"]) && ($_SESSION["role"] == 2)) {?>
                <li class="nav-item">
                    <a class="text-warning nav-link" href="admin.php">Administrace</a>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION["logged"])){?>
                <li class="nav-item">
                    <a class="text-danger nav-link" href="logout.php">Odhlásit se</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
