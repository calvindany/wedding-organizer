<?php
    $pk_tb_catalogue = $_POST['pk_tb_catalogue'];
    $product_name = $_POST["product_name"];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $isPublish = $_POST['status'];
    $file = $_FILES['image'];
    $fk_tb_user = $_SESSION['pk_tb_user'];

    $uploadFileStatus = 0;

    if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $uploadFileStatus = InputFile($file);
    } else {
        $uploadFileStatus = $FORM_NOT_INCLUDED_BY_FILE;
    }

    if($uploadFileStatus == $FORM_NOT_INCLUDED_BY_FILE) {
        $query = "UPDATE tb_catalogues 
              SET
                  product_name = ?,
                  description = ?,
                  price = ?,
                  is_published = ?
              WHERE pk_tb_catalogue = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssiii', $product_name, $description, $price, $isPublish, $pk_tb_catalogue);
        $stmt->execute();

        header("Location: " . $BASE_URL . 'admin');
        exit();
    }

    if(is_string($uploadFileStatus)) {
        var_dump($uploadFileStatus);
        $query = "UPDATE tb_catalogues 
              SET
                  product_name = ?,
                  description = ?,
                  image = ?,
                  price = ?,
                  is_published = ?
              WHERE pk_tb_catalogue = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssiii', $product_name, $description, $uploadFileStatus, $price, $isPublish, $pk_tb_catalogue);
        $stmt->execute();

        header("Location: " . $BASE_URL . 'admin');
        exit();
    } 

    echo $uploadFileStatus;