    <?php include $HEADER_TEMPLATE_PATH ?>
    <!-- Added JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- !Added JQuery CDN -->

    <!-- Added Summernote Plugins -->
    <link
        href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css"
        rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#summernote").summernote({
                height: 250,
            });
            $(".dropdown-toggle").dropdown();
        });
    </script>
    <!-- !Added Summernote Plugins -->
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
            <h1>Tambah Product</h1>
        </div>
        <div class="my-4">
            <form action="<?php if($isEdit) { echo $BASE_URL . 'admin/catalogue/edit/' . $data['pk_tb_catalogue']; } else { echo $BASE_URL . 'admin/catalogue/add'; } ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="product_name" class="form-label">Nama Product</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php if($isEdit)  { echo $data['product_name']; }?>">
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php if($isEdit)  { echo $data['price']; }?>">
                </div>
                <div class="mb-4">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" accept=".jpg,.png" class="form-control" id="image" name="image">
                </div>
                <div class="mb-4">
                    <label for="form-select" class="form-label">Publish / Draft</label>
                    <select class="form-select" id="form-select" name="status" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="0" <?php if($isEdit) { if($data['is_published'] == 0) echo "selected"; }?>>Draft</option>
                        <option value="1" <?php if($isEdit) { if($data['is_published'] == 1) echo "selected"; }?>>Publish</option>
                    </select>
                </div>
                <div class="mb-4 d-flex flex-column">
                    <label for="summernote" class="text-lg mb-2">Content</label>
                    <textarea id="summernote" name="description" name="description"><?php if($isEdit)  { echo $data['description']; }?></textarea>
                </div>

                    <?php
                        if($isEdit) {
                            echo "<div><input type='hidden' value='". $data['pk_tb_catalogue'] . "' name='pk_tb_catalogue' /></div>";
                        }
                    ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php include $FOOTER_TEMPLATE_PATH ?>