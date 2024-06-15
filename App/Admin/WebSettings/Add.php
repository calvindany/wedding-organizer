    <?php include $HEADER_TEMPLATE_PATH ?>
</head>
<body>
    <?php 
        $isEdit = false;
        if(strpos($REQUEST_URI, 'edit'))  { 
            $isEdit = true;
        }
    ?>

    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="header-title">
            <h1>Tambah Pengaturan</h1>
        </div>
        <div class="my-4">
        
            <form action="<?php if($isEdit) { echo $BASE_URL . 'admin/pengaturan/edit/' . $data['pk_tb_setting']; } else { echo $BASE_URL . 'admin/pengaturan/add'; } ?>"  method="POST">
                <div class="mb-3">
                    <label for="setting-name" class="form-label">Nama Pengaturan</label>
                    <input type="text" class="form-control" id="setting-name" aria-describedby="setting-name-help" name="setting-name"  value="<?php if($isEdit)  { echo $data['setting_name']; }?>">
                    <div id="setting-name-help" class="form-text">Contoh: alamat kantor, Nomor Telepon, Email, dan lainnya</div>
                </div>
                <div class="mb-3">
                    <label for="setting-value" class="form-label">Nilai Pengaturan</label>
                    <input type="text" class="form-control" id="setting-value" name="setting-value"  value="<?php if($isEdit)  { echo $data['setting_value']; }?>">
                    <div id="setting-name-help" class="form-text">Contoh: Jalan Raya Margonda No.8, 0809182919, calvindany@mail.com, dan lainnya</div>
                </div>
                <div class="mb-3">
                    <label for="setting-description" class="form-label">Deskripsi Pengaturan</label>
                    <textarea class="form-control" id="setting-description" name="setting-description"><?php if($isEdit)  { echo $data['description']; }?></textarea>
                    <div id="setting-name-help" class="form-text">Contoh: "Nilai ini digunakan pada footer user"</div>
                </div>
                <?php
                    if($isEdit) {
                        echo "<div><input type='hidden' value='". $data['pk_tb_setting'] . "' name='pk_tb_setting' /></div>";
                    }
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php include $FOOTER_TEMPLATE_PATH ?>
