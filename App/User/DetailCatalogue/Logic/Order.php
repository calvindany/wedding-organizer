<?php
    // header('Content-Type: application/json');

    $idCatalogue = $_POST['pk_tb_catalogue'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $weddingDate = $_POST['wedding_date'];
    $orderId = bin2hex(random_bytes('8'));

    $queryGetCatalogue = "SELECT COUNT(*) FROM tb_catalogues WHERE pk_tb_catalogue = ?";

    $stmt = $conn->prepare($queryGetCatalogue);

    $stmt->bind_param('i', $idCatalogue);

    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if($count <= 0) {
        echo "Catalogue does not exist.";
    }

    $query = "INSERT INTO tb_orders (pk_tb_order, name, email, phone_number, fk_tb_catalogue, wedding_date)
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('ssssis', $orderId, $name, $email, $phoneNumber, $idCatalogue, $weddingDate);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['flash-data-success'] = true;
        $_SESSION['flash-data-order_id'] = $orderId;
        $_SESSION['flash-data-order_url'] = $BASE_URL . 'order/' . $orderId;
        header("Location: " . $BASE_URL . "catalogue/detail/" . $idCatalogue);
    } else {
        $_SESSION['flash-data-success'] = false;
    }
    
    $stmt->close();

    exit();