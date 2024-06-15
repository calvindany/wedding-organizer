    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/HomeAdmin.css'; ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>

    <div class="container my-5">
        <div class="home-header mb-5">
            <h1>Profile</h1>
        </div>
        <div>
            <form action="<?php echo $BASE_URL . 'admin/profil' ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>">
                </div>
                <div class="mb-3">
                    <div class="d-flex gap-5 align-items-center form-label">
                        <label for="username" class="">Password Lama</label>
                        <div>
                            <input type="checkbox" class="form-check-input" id="change-password-checkbox"> Ubah Password
                        </div>
                    </div>
                    <input type="password" class="form-control" disabled id="old-password" name="old-password" value="">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" disabled id="new-password" name="new-password" value="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#change-password-checkbox').change(function(){
                if($(this).is(':checked')) {
                    $('#old-password').removeAttr('disabled');
                    
                    $('#new-password').removeAttr('disabled');
                } else {
                    $('#old-password').attr('disabled', 'disabled');
                    $('#old-password').val('')
                    $('#new-password').attr('disabled', 'disabled');
                    $('#new-password').val('');
                }
            });
        });
    </script>

    <?php include $FOOTER_TEMPLATE_PATH ?>