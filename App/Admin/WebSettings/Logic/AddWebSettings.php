<?php

    $setting_name = $_POST['setting-name'];
    $setting_value = $_POST['setting-value'];
    $setting_description = $_POST['setting-description'];

    $query = "INSERT INTO tb_settings
        (`setting_name`, `setting_value`, `description`)
        VALUES (?, ?, ?)";

    $stmt = $conn->prepare($query);

    $stmt->bind_param('sss', $setting_name, $setting_value, $setting_description);

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    $stmt->close();

    header("Location: " . $BASE_URL . "admin/pengaturan");
    exit();