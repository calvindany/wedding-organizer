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

    <?php if(isset($order)) { ?>
        <!-- Modal -->
        <div class="modal fade" id="order-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="order-detail-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>Nama Pemesan</td>
                                <td>:</td>
                                <td><?php echo $order['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $order['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td><?php echo $order['phone_number'] ?></td>
                            </tr>

                            <tr>
                                <td>Status Pesanan</td>
                                <td>:</td>
                                <td><?php echo $order['status'] ?></td>
                            </tr>
                        </table>
                        <br>
                        <p>Anda akan dihubungi tim kami dalam waktu dekat</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary px-4 py-2" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php include $USER_FOOTER_TEMPLATE_PATH ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalIsExist = document.getElementById('order-detail');

            if(modalIsExist) {
                var orderModal = new bootstrap.Modal(modalIsExist);
                orderModal.show();
            }
        });
    </script>

    <?php include $FOOTER_TEMPLATE_PATH ?>