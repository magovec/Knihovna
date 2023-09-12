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
    $passwd2 = $_POST["password2"];

    if($passwd2 != $passwd){
        echo "Zadaná hesla se neshodují.";
    }
    else{
        $stmt = $con->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $username);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                echo "Toto uživatelské jméno je již zabrané.";
            }
            else{
                $hashed = password_hash($passwd, PASSWORD_DEFAULT);
                $stmt = $con->prepare("INSERT INTO users (username, `password`) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashed);

                if($stmt->execute()){
                    $stmt->close();
                    $con->close();
                    header("Location: /Knihovna/login.php");
                }
                else{
                    echo "Error: " . $stmt . "<br>" . $con->error;
                }
            }
        }
        else{
            echo "Error: " . $stmt . "<br>" . $con->error;
        }
    }
}