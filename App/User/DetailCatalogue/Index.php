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
                <h5 class="bg-warning"><i class="bi bi-tags"></i>&nbsp;&nbsp;IDR <?php echo $data['price'] ?></h5>
            </div>
            <div class="button-group">
                <button class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#order-modal">
                    <i class="bi bi-bag"></i>&nbsp;&nbsp;&nbsp;Pesan
                </button>
            </div>
        </div>
        <div>
            <?php echo $data['description'] ?>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="order-modal" tabindex="-1" aria-labelledby="order-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan: <?php echo $data['product_name'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo $BASE_URL . 'order' ?>" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone-number" name="phone_number">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Wedding Date</label>
                            <input type="date" class="form-control" id="wedding-date" name="wedding_date">
                        </div>
                        <input type="hidden" name="pk_tb_catalogue" value="<?php echo $data['pk_tb_catalogue'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim Pesanan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php if($_SESSION['flash-data-success'] == true) { ?>
        <!-- Modal -->
        <div class="modal fade" id="succcess-order-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Order ID: <?php echo $_SESSION['flash-data-order_id']; unset($_SESSION['flash-data-order_id']) ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Pesanan Anda akan diproses dalam 1 hari kerja. Kami akan menghubungi Anda melalui nomor telepon atau email anda untuk tahap berikutnya. 
                        Untuk pengecekan status dapat di lihat pada halaman berikut.
                        <br><br>
                        Tolong simpan url halaman berikut ini.<br>
                        <?php echo $_SESSION['flash-data-order_url']; unset($_SESSION['flash-data-order_url']); ?>
                        <br><br>
                        Jika mengalami kehilangan url dapat menghubungi admin
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['flash-data-success']); ?>
    <?php  } ?>

    <script>
        // Get today's date
        var minDate = new Date();

        // Set the minimum date to today
        minDate.setDate(minDate.getDate() + 7);
        minDate = minDate.toISOString().split('T')[0];

        // Calculate the maximum date (today + 7 days)
        // var maxDate = new Date(today);
        // maxDate.setDate(today.getDate() + 7);
        // maxDate = maxDate.toISOString().split('T')[0];

        // Select the input element and set the min and max attributes
        var weddingDateInput = document.getElementById('wedding-date');
        weddingDateInput.setAttribute('min', minDate);
        // weddingDateInput.setAttribute('max', maxDate);

    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalIsExist = document.getElementById('succcess-order-modal');

            if(modalIsExist) {
                var orderModal = new bootstrap.Modal(modalIsExist);
                orderModal.show();
            }
        });
    </script>

    <?php include $FOOTER_TEMPLATE_PATH ?>