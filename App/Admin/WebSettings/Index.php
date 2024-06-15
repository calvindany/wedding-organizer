<?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Pengaturan Website</h1>
            <a href="<?php echo $BASE_URL . 'admin/pengaturan/add'?>" class="btn btn-outline-primary" >Tambah</a>
        </div>
        <div style="background:white; padding: 20px; border-radius: 8px; box-shadow: 3px 3px 5px #888888;" >
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Pengaturan</th>
                        <th scope="col">Value Pengaturan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php 
                    if(!empty($data)) {
                        echo "<tbody>";
                        foreach($data as $row) {
                            echo "  <tr>";
                            echo "      <td>" . $row['pk_tb_setting'] . "</td>";
                            echo "      <td>" . $row['setting_name'] . "</td>";
                            echo "      <td>" . $row['setting_value'] . "</td>";
                            echo "      <td>" . $row['description'] . "</td>";
                            echo "      <td class='d-flex align-items-center gap-4'>";
                            echo "          <a class='btn btn-primary' href='" . $BASE_URL . "admin/pengaturan/edit/" . $row["pk_tb_setting"] . "'>";
                            echo "              <i class='bi bi-pencil-square'></i>&nbsp;&nbsp;&nbsp;Edit";
                            echo "          </a>";
                            echo "          <form class='d-flex align-items-center m-0' action='" . $BASE_URL . "admin/pengaturan/delete" . "' method='POST'>";
                            echo "              <input name='pk_tb_setting' type='hidden' value='" . $row['pk_tb_setting'] . "'>";
                            echo "              <button type='submit' class='btn btn-danger'><i class='bi bi-trash'></i>&nbsp;&nbsp;&nbsp;Hapus</button>";
                            echo "          </form>";
                            echo "      </td>";
                            echo "  </tr>";
                        }
                        echo "</tbody>";
                    } else {
                        echo "<tr><td colspan='5' class='text-center fst-italic'>Data Tidak Ada</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>

    <?php include $FOOTER_TEMPLATE_PATH ?>