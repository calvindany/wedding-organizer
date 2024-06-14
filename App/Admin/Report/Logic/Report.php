<?php
    function GetReport($conn) {
        $query = "SELECT 
                TBC.pk_tb_catalogue, 
                TBC.product_name,
                SUM(CASE WHEN status = 'Requested' THEN 1 ELSE 0 END) AS requested_count, 
                SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approved_count, 
                SUM(CASE WHEN status = 'Rejected' THEN 1 ELSE 0 END) AS rejected_count, 
                SUM(CASE WHEN status = 'Canceled' THEN 1 ELSE 0 END) AS canceled_count 
                FROM tb_orders AS TBO
                LEFT JOIN tb_catalogues AS TBC ON TBO.fk_tb_catalogue = TBC.pk_tb_catalogue 
            GROUP BY fk_tb_catalogue;";

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->bind_result($pk_tb_catalogue, $product_name, $requested_count, $approved_count, $rejected_count, $canceled_count);

        $data = array();
        while ($stmt->fetch()) {
            $data[] = array(
                'pk_tb_catalogue' => $pk_tb_catalogue,
                'product_name' => $product_name,
                'requested_count' => $requested_count,
                'approved_count' => $approved_count,
                'rejected_count' => $rejected_count,
                'canceled_count' => $canceled_count
            );
        }

        $stmt->close();

        return $data;
    }