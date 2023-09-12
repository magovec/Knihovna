<?php
$servername = "localhost";
$database = "knihovna";
$username = "root";
$password = "";

$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
else{
    $username = $_POST["username"];
    $passwd = $_POST["password"];
    $hashed = password_hash($passwd, PASSWORD_DEFAULT);

    $stmt = $con->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);

    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows == 0 ){
            echo "Toto uživatelské jméno neexistuje.";
        }
        else{
            $row = $result->fetch_assoc();
            if(password_verify($passwd, $row["password"])){

                    ini_set('session.gc_maxlifetime', 3600 * 24 * 365);
                    session_set_cookie_params(3600 * 24 * 365);
                    session_start();
                    $_SESSION["logged"] = 1;
                    $_SESSION["username"] = $username;
                    $_SESSION["role"] = $row["role"];
                    $stmt->close();
                    $con->close();
                    header("Location: /Knihovna/index.php");


            }
            else{
                echo "Zadané heslo není správné.";
            }
        }
    }
}