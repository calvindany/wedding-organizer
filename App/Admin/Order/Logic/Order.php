<?php
    function GetOrder($conn) {
        $query = "SELECT 
            pk_tb_order,
            name,
            email,
            phone_number,
            wedding_date,
            status
        FROM tb_orders";


        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->bind_result($pk_tb_order, $name, $email, $phone_number, $wedding_date, $status);

        $data = array();
        while ($stmt->fetch()) {
            $data[] = array(
                'pk_tb_order' => $pk_tb_order,
                'name' => $name,
                'email' => $email,
                'phone_number' => $phone_number,
                'wedding_date' => $wedding_date,
                'status' => $status
            );
        }

        $stmt->close();

        return $data;
    }