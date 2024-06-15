<?php
    try {
        $id = $_POST['pk_tb_setting'];

        $query = "DELETE FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();

        header("Location: " . $BASE_URL . "admin/pengaturan");
        exit();
    } catch (Exception $ex) {
        echo $ex;
    }