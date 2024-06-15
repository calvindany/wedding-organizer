<?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href=<?php echo $BASE_URL . "Public/CSS/Login.css" ?>>
</head>

<body>
    <?php include $NAVBAR_TEMPLATE_PATH ?>
    <div class="login-container">
        <div class="content">
            <p class="display-5">Selamat Datang!</p>
            <p class>Silahkan login terlebih dahulu</p>
            <form action="<?php echo $BASE_URL . 'admin/login' ?>" method="POST" class="form">
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="admin">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <?php include $FOOTER_TEMPLATE_PATH ?>