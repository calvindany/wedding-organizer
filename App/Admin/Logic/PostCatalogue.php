<?php
    $product_name = $_POST["product_name"];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $isPublish = $_POST['status'];
    $file = $_FILES['image'];
    $fk_tb_user = $_SESSION['pk_tb_user'];

    $uploadFileStatus = InputFile($file);

    // var_dump($isPublish);
    if(is_string($uploadFileStatus)) {
        $query = "INSERT INTO tb_catalogues (
                product_name, description, image, price, is_published, fk_tb_user
            ) VALUES (
                '$product_name',
                '$description',
                '$uploadFileStatus',
                '$price',
                '$isPublish',
                '$fk_tb_user'
            )";
    
        $conn->query($query);
    } else {
        echo $uploadFileStatus;
    }