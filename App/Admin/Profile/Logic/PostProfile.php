<?php 
    $id = $_SESSION['pk_tb_user'];
    $username = $_SESSION['username'];

    $name = $_POST['name'];
    $username = $_POST['username'];
    $oldpassword = isset($_POST['old-password']) ? $_POST['old-password'] : '';
    $newpassword = isset($_POST['new-password']) ? $_POST['new-password'] : '';
    
    $query = "UPDATE tb_users 
        SET
            name = ?, 
            username = ?
        WHERE pk_tb_user = ?";

    $queryWithPassword = "UPDATE tb_users 
        SET
            name = ?, 
            username = ?, 
            password = ?
        WHERE pk_tb_user = ?";

    $stmt = null;

    if(empty($newpassword)) {
        $stmt = $conn->prepare($query);
    
        $stmt->bind_param("ssi", $name, $username, $id);

    } else {
        if(authenticate($username, $oldpassword, $conn) <= 0) {
            echo "Username dan Password Salah";
            header("Location: " . $BASE_URL . "admin/profiasl");
            exit();
        } 

        $stmt = $conn->prepare($queryWithPassword);
    
        $stmt->bind_param("sssi", $name, $username, password_hash($newpassword, PASSWORD_DEFAULT), $id);
    }

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    $stmt->close();

    header("Location: " . $BASE_URL . "admin/profil");
    exit();