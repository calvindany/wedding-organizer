    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeUser.css'; ?>" />
</head>
<body>
    <?php include $USER_NAVBAR_TEMPLATE_PATH ?>
    <div class="hero-image">
        <div class="content">
            <h1>Create Unforgettable Moments With Us</h1>
            <p>Experience Commitment, Perfection, and Happiness</p>
        </div>
    </div>

    <div class="container my-5">
        <?php
            if(!empty($data)) {
                echo "<div class='list-card-container'>";
                
                foreach($data as $row) {
                    echo "<div class='card list-card-content'>";

                    if ($row['image']) {
                        echo "  <img src='" . $BASE_URL . $row["image"] ."' class='card-img-top' alt=''>";
                    } else {
                        echo "  <img src='" . $BASE_URL . "Public/Image/no-image.png" ."' class='card-img-top' alt=''>";
                    }

                    echo "  <div class='card-body'>";
                    echo "      <h5 class='card-title'>". $row["product_name"] . "</h5>";
                    echo "      <p class='card-text'>IDR " . $row["price"] . "</p>";
                    echo "      <div class='card-text truncate-multiline'>" . $row["description"] . "</div>";
                    echo "      <a href='". $BASE_URL . "catalogue/detail/" . $row["pk_tb_catalogue"] ."' class='btn px-3 btn-primary'>Detail</a>";
                    echo "  </div>";
                    echo "</div>";
                }

                echo "</div>";
            } else {
                echo "<div class='alert alert-success' role='alert'>";
                echo "  Saat ini tidak ada katalog yang tersedia, silahkan tambah katalog terlebih dahulu!";
                echo "</div>";
            }
        ?>
    </div>

    <?php include $FOOTER_TEMPLATE_PATH ?>