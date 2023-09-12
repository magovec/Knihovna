<?php
include("components/header.php");
if (isset($_SESSION["logged"])) {
    header("Location: /Knihovna/index.php");
    exit();
}?>

<div class="container">

    <form action="log.php" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Uživatelské jméno</label>
        <input type="text" name="username" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-success">Přihlásit se</button>
    </form>

</div>

