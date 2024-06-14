<?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Daftar Katalog</h1>
            <a href="<?php echo $BASE_URL . 'admin/catalogue/add'?>" class="btn btn-outline-primary" >Tambah</a>
        </div>
        <div class="list-card-container">
            <?php
                foreach($data as $row) {
                    echo "<div class='card list-card-content'>";
                    echo "  <img src='" . $BASE_URL . $row["image"] ."' class='card-img-top' alt=''>";
                    echo "  <div class='card-body'>";
                    echo "      <h5 class='card-title'>". $row["product_name"] . "</h5>";
                    echo "      <p class='card-text'>IDR " . $row["price"] . "</p>";
                    echo "      <p class='card-text truncate-multiline'>" . $row["description"] . "</p>";
                    echo "      <a href='#' class='btn px-3 btn-primary'>Detail</a>";
                    echo "  </div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    
<?php include $FOOTER_TEMPLATE_PATH ?>