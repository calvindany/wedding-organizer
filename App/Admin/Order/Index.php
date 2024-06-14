    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Daftar Pesanan</h1>
        </div>
        <div style="background:white; padding: 20px; border-radius: 8px; box-shadow: 3px 3px 5px #888888;" >
            <table class="table" >
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
                            echo "          <button class='btn btn-primary'><i class='bi bi-search'></i>&nbsp;&nbsp;Detail</button>";
                            echo "      </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
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

    <?php include $FOOTER_TEMPLATE_PATH ?>