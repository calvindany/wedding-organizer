<?php    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = authenticate($username, $password, $conn);

    if ($result > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['pk_tb_user'] = $result; 

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