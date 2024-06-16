    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Daftar Pesanan</h1>
        </div>
        <div class='table-responsive' style="background:white; padding: 20px; border-radius: 8px; box-shadow: 3px 3px 5px #888888;" >
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Wedding Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $index => $row) {
                            echo "  <tr>";
                            echo "      <td>" . $index + 1 . "</td>";
                            echo "      <td>" . $row['name'] . "</td>";
                            echo "      <td>" . $row['email'] . "</td>";
                            echo "      <td>". $row['wedding_date'] ."</td>";
                            echo "      <td>";
                            echo "          <select class='form-select' data-order-id='" . htmlspecialchars($row['pk_tb_order']) . "' name='status' aria-label='Default select example'>";
                            echo "              <option value='0'" . ($row['status'] == 'Requested' ? 'selected' : '') . ">Requested</option>";
                            echo "              <option value='1'" . ($row['status'] == 'Approved' ? 'selected' : '') . ">Approved</option>";
                            echo "              <option value='2'" . ($row['status'] == 'Rejected' ? 'selected' : '') . ">Rejected</option>";
                            echo "              <option value='3'" . ($row['status'] == 'Cancel' ? 'selected' : '') . ">Cancel</option>";
                            echo "          </select>";
                            echo "      </td>";
                            echo "      <td>";
                            echo "          <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detail-modal' ";
                            echo "              onClick=\"insertDataToModal('" . htmlspecialchars($row["pk_tb_order"]) . "', '" . htmlspecialchars($row["name"]) . "', '" . htmlspecialchars($row["email"]) . "', '" . htmlspecialchars($row["phone_number"]) . "', '" . htmlspecialchars($row["wedding_date"]) . "')\">";
                            echo "              <i class='bi bi-search'></i>&nbsp;&nbsp;Detail";
                            echo "          </button>";
                            echo "      </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detail-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Order ID: <span id="order-id"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nama: <span id="name"></span></p>
                    <p>Email: <span id="email"></span></p>
                    <p>Nomor Telepon: <span id="phone-number"></span></p>
                    <p>Wedding Date: <span id="wedding-date"></span></p>
                    <div class="d-flex">
                        <p>Url: <span id="url"></span></p> 
                        <div>
                            <a class="btn-copy btn" style="color:blue; cursor:pointer" data-clipboard-target="#url"><i class="bi bi-copy"></i></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">OK</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.form-select').change(function() {
                var orderId = $(this).data('order-id');
                var newStatus = $(this).val();

                $.ajax({
                    url: "<?php echo $BASE_URL . 'admin/pesanan' ?>",
                    type: 'POST',
                    data: {
                        order_id: orderId,
                        status: newStatus
                    },
                    success: function(response) {
                        console.log('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating status');
                    }
                });
            });
        });
    </script>

    <script>
        const insertDataToModal = (id, name, email, phone_number, wedding_date) => {
            $('#url').text('<?php echo $BASE_URL . 'order/' ?>' + id);
            $('#name').text(name);
            $('#email').text(email);
            $('#phone-number').text(phone_number);
            $('#wedding-date').text(wedding_date);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clipboard = new ClipboardJS('.btn-copy');

            clipboard.on('success', function(e) {
                console.log(e);
                alert('Url copied to clipboard.');
            });

            clipboard.on('error', function(e) {
                console.error(e);
                alert('Failed to copy url.');
            });
        });
    </script>


    <?php include $FOOTER_TEMPLATE_PATH ?>