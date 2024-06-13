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
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class="header-title">
            <h1>Tambah Product</h1>
        </div>
        <div class="my-4">
            <form>
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Product</label>
                    <input type="email" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" accept=".jpg,.png" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label for="summernote" class="text-lg mb-2">Content</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php include $FOOTER_TEMPLATE_PATH ?>