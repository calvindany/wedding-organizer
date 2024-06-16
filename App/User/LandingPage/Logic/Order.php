<?php
    $query = "SELECT pk_tb_order, name, email, phone_number, status FROM tb_orders WHERE pk_tb_order = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

    $stmt->bind_result($pk_tb_order, $name, $email, $phone_number, $status);

    $order = array();
    while ($stmt->fetch()) {
        $order = array(
            'pk_tb_order' => $pk_tb_order,
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'status' => $status
        );
    }
    
    $stmt->close();