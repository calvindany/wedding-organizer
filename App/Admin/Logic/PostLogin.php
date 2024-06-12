<?php
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username =="admin" && $password == "admin") {
        $_SESSION['username'] = $username;

        echo "<script>";
        echo "alert('Login Berhasil');";
        echo "window.location.href = '". $BASE_URL . "Admin" ."';";
        echo "</script>";
        exit();
    } else {
        echo "<script>";
        echo "confirm('Username atau password anda salah.');";
        echo "if(confirm){window.location.href = '". $BASE_URL . "admin/login" ."';}";
        echo "</script>";
    }

?>