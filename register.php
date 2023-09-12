<?php
include("components/header.php");
if (isset($_SESSION["logged"])) {
    header("Location: /Knihovna/index.php");
    exit();
}?>

    <div class="container">
        <form action="./reg.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Uživatelské jméno</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3"
            <label for="password2" class="form-label">Znovu Heslo</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div>
        <button type="submit" class="btn btn-warning">Registrovat</button>
        </form>
    </div>
