<?php
    function GetDescription($id, $conn) {
        $query = "SELECT setting_name, setting_value FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($setting_name, $setting_value);
    
        $description = array();
        while ($stmt->fetch()) {
            $description = array(
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        
        $stmt->close();

        return $description;
    }

    function GetIsleConceptImages($id, $conn) {
        $query = "SELECT setting_name, setting_value FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($setting_name, $setting_value);
    
        $isle_concept = array();
        while ($stmt->fetch()) {
            $isle_concept = array(
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        
        $stmt->close();
        return $isle_concept;
    }

    function GetMapsUsaha($id, $conn) {
        $query = "SELECT setting_name, setting_value FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($setting_name, $setting_value);
    
        $maps = array();
        while ($stmt->fetch()) {
            $maps = array(
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        
        $stmt->close();

        return $maps;
    }

    function GetContact($id, $conn) {
        $query = "SELECT setting_name, setting_value FROM tb_settings WHERE pk_tb_setting IN (?, ?, ?) ORDER BY pk_tb_setting ASC";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('iii', $id[0], $id[1], $id[2]);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($setting_name, $setting_value);
    
        $contact = array();
        while ($stmt->fetch()) {
            $contact[] = array(
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        
        $stmt->close();

        return $contact;
    }

    function GetFooterDescription($id, $conn) {
        $query = "SELECT setting_name, setting_value FROM tb_settings WHERE pk_tb_setting = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    
        $stmt->bind_result($setting_name, $setting_value);
    
        $footer_description = array();
        while ($stmt->fetch()) {
            $footer_description = array(
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        
        $stmt->close();

        return $footer_description;
    }