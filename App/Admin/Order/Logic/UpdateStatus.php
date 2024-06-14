<?php
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    switch ($newStatus) {
        case $REQUESTED:
            $newStatus = "Requested";
            break;
        case $APPROVED:
            $newStatus = "Approved";
            break;
        case $REJECTED:
            $newStatus = "Rejected";
            break;
        case $CANCEL:
            $newStatus = "Cancel";
            break;
        default:
            $newStatus = "";
    }

    var_dump($newStatus);
    $query = "UPDATE tb_orders SET status = ? WHERE pk_tb_order = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $newStatus, $orderId);
    $stmt->execute();

    $stmt->close();