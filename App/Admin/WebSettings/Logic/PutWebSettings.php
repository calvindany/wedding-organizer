<?php
    $id = $_POST['pk_tb_setting'];
    $setting_name = $_POST['setting-name'];
    $setting_value = $_POST['setting-value'];
    $setting_description = $_POST['setting-description'];

    $query = "UPDATE tb_settings 
        SET
            setting_name = ?,
            setting_value = ?,
            description = ?
        WHERE
            pk_tb_setting = ?";

    $stmt = $conn->prepare($query);

    $stmt->bind_param('sssi', $setting_name, $setting_value, $setting_description, $id);

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    $stmt->close();

    header("Location: " . $BASE_URL . "admin/pengaturan");
    exit();