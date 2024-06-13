<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    function authenticate($username, $password, $conn) {

        $query = "SELECT pk_tb_password FROM tb_users WHERE username = '$username'";

        $result = $conn->query($query);

        if ($result->num_rows > 0)  
        { 
            while($row = $result->fetch_assoc()) 
            { 
                $data = $row;
            }

            if(password_verify($password, $data['password'])) {
                return $data['pk_tb_user'];
            }
        }

        return 0;
    }

    function isUserLoggedIn() {
        include "Config.php";
        if (!isset($_SESSION['username'])) {
            header("Location: ". $base_url . "Admin/Login.php");
            exit();
        }
    }

    function logout($BASE_URL) {
        $_SESSION = array();
        
        session_destroy();
    
        header("Location: ". $BASE_URL . "admin/login");
        exit();
    }

?>