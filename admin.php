<?php

include("components/header.php");
if (!isset($_SESSION["logged"]) || $_SESSION["role"] < 1) {
    header("Location: http://localhost:8080/Knihovna/login.php");
    exit();
}?>
    <div class='mx-auto w-75'>
        <table class="table">
            <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Správce</th>
                <th scope="col">Admin</th>
                <th scope="col">Uživatel</th>
            </tr>
            </thead>
            <tbody>
<?php
$result = $con->query("SELECT * FROM users ORDER BY role DESC");
while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $username = $row["username"];
    $role = $row["role"];

    echo "

    <tr>
        <th>$id</th>
        <td>$username</td>
        <td>$role</td>
        <td><a class='btn btn-warning' href='role.php?id=$id&role=2'</a>2</td>
        <td><a class='btn btn-success' href='role.php?id=$id&role=1'</a>1</td>
        <td><a class='btn btn-danger' href='role.php?id=$id&role=0'</a>0</td>
    </tr>
    </tbody>

";
}
?>
        </table>
    </div>
