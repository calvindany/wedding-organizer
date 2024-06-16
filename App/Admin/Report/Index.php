    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Daftar Pesanan</h1>
        </div>
        <div class='table-responsive' style="background:white; padding: 20px; border-radius: 8px; box-shadow: 3px 3px 5px #888888;" >
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama product</th>
                        <th scope="col">Requested</th>
                        <th scope="col">Approved</th>
                        <th scope="col">Rejected</th>
                        <th scope="col">Cancel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $row) {
                            echo "  <tr>";
                            echo "      <td>" . $row['pk_tb_catalogue'] . "</td>";
                            echo "      <td>" . $row['product_name'] . "</td>";
                            echo "      <td>" . $row['requested_count'] . "</td>";
                            echo "      <td>". $row['approved_count'] ."</td>";
                            echo "      <td>". $row['rejected_count'] ."</td>";
                            echo "      <td>". $row['canceled_count'] ."</td>";
                            echo "  </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include $FOOTER_TEMPLATE_PATH ?>