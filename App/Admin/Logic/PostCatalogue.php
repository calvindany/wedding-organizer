<?php

    $product_name = $POST["product_name"];
    $description = $POST['description'];
    $price = $POST['price'];
    $fk_tb_user = $_SESSION['pk_tb_user'];

    $query = "INSERT INTO tb_catalogues (
            product_name, description, image, price, fk_tb_user
        ) VALUES (
            '$product_name',
            '$description',
            '$image',
            '$price',
            '$fk_tb_user',
        )";