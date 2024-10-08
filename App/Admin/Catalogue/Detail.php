    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href=<?php echo $BASE_URL . "Public/CSS/DetailAdmin.css" ?>>
</head>
<boby>
    <?php include $NAVBAR_TEMPLATE_PATH ?>

    <div class="container my-5">
        <div class="image-header w-100 mb-5">
            <img class="w-100" src="<?php echo $BASE_URL . $data['image'] ?>" alt="">
        </div>
        <div class="detail-header mb-5">
            <div>
                <h1>Detail: <?php echo $data['product_name'] ?></h1>
                <h5 class="bg-warning">IDR <?php echo $data['price'] ?></h5>
            </div>
            <div class="button-group">
                <div>
                    <a href="<?php echo $BASE_URL . 'admin/catalogue/edit/' . $data['pk_tb_catalogue'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;&nbsp;Edit</a>
                </div>
                <form action="<?php echo $BASE_URL . 'admin/catalogue/delete' ?>" method="POST">
                    <input type="hidden" value="<?php echo $data['pk_tb_catalogue'] ?>" name="pk_tb_catalogue" />
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;&nbsp;Hapus</a>
                </form>
            </div>
        </div>
        <div>
            <?php echo $data['description'] ?>
        </div>
    </div>
    
    <?php include $FOOTER_TEMPLATE_PATH ?>