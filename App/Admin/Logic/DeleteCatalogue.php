<?php 
    try {
        $id = $_POST['pk_tb_catalogue'];

        $query = "DELETE FROM tb_catalogues WHERE pk_tb_catalogue = ?";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();

        header("Location: " . $BASE_URL . "admin");
        exit();
    } catch (Exception $ex) {
        echo $ex;
    }