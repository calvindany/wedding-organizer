<?php
    function GetWebSettings($conn) {
        $query = "SELECT pk_tb_setting, setting_name, setting_value, description FROM tb_settings";

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->bind_result($pk_tb_setting, $setting_name, $setting_value, $description);

        $data = array();
        while ($stmt->fetch()) {
            $data[] = array(
                'pk_tb_setting' => $pk_tb_setting,
                'setting_name' => $setting_name,
                'setting_value' => $setting_value,
                'description' => $description
            );
        }

        $stmt->close();

        return $data;
    }


    function GetWebSettingsById($id, $conn) {
        $query = "SELECT 
            pk_tb_setting, setting_name, setting_value, description 
        FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->bind_result($pk_tb_setting, $setting_name, $setting_value, $description);

        $data = array();
        while ($stmt->fetch()) {
            $data = array(
                'pk_tb_setting' => $pk_tb_setting,
                'setting_name' => $setting_name,
                'setting_value' => $setting_value,
                'description' => $description
            );
        }

        $stmt->close();

        return $data;
    }