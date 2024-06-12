<?php    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticate($username, $password, $conn)) {
        $_SESSION['username'] = $username;

        echo "<script>";
        echo "alert('Login Berhasil');";
        echo "window.location.href = '". $BASE_URL . "admin" ."';";
        echo "</script>";
        exit();
    } else {
        echo "<script>";
        echo "confirm('Username atau password anda salah.');";
        echo "if(confirm){window.location.href = '". $BASE_URL . "admin/login" ."';}";
        echo "</script>";
    }

?>