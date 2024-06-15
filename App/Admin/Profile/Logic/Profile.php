<?php

    function GetProfile($conn) {
        $id = $_SESSION['pk_tb_user'];
    
        $query = "SELECT name, username, created_date FROM tb_users WHERE pk_tb_user = ?";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bind_param("i", $id);
    
        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($name, $username, $created_at);
    
        $data = array();
        while ($stmt->fetch()) {
            $data = array(
                'name' => $name,
                'username' => $username,
                'created_at' => $created_at
            );
        }
    
        $stmt->close();
    
        return $data;
    }

