    <?php include $HEADER_TEMPLATE_PATH ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL . 'Public/CSS/TentangKami.css' ?>"/>
</head>

<body>
    <?php include $USER_NAVBAR_TEMPLATE_PATH ?>
    <div class="container my-5">
        <div class=" space">
            <div class="text-center mb-3">
                <h1>Wedding Organizer</h1>
            </div>
            <div>
                <p><?php echo $description['setting_value'] ?></p>
            </div>
        </div>
        <div class="space">
            <div class="text-center mb-3">
                <h4>Isle Concept</h4>
            </div>
            <div class="isle-list">
                <?php $image_paths = explode("#", $isle_concept['setting_value']); ?>
                <?php foreach($image_paths as $path) { ?>
                    <img src="<?php echo $BASE_URL . $path ?>" alt="">
                <?php } ?>
            </div>
        </div>
        <div class=" space">
            <div class="text-center mb-3">
                <h4>Maps Location</h4>
            </div>
            <div>
                <?php echo $maps['setting_value'] ?>
            </div>
        </div>
        <div class=" space d-flex flex-column align-items-center">
            <div class="text-center mb-3">
                <h4>Contact Us</h4>
            </div>
            <div class="social-list">
                <div>
                    <i class="bi bi-envelope-fill"></i>
                    <?php echo $contact[0]['setting_value'] ?>
                </div>
                <div>
                    <i class="bi bi-envelope-fill"></i>
                    <?php echo $contact[1]['setting_value'] ?>
                </div>
                <div>
                    <i class="bi bi-telephone-fill"></i>
                    <?php echo $contact[2]['setting_value'] ?>
                </div>
            </div>
        </div>
    </div>



    <?php include $USER_FOOTER_TEMPLATE_PATH ?>

    <?php include $FOOTER_TEMPLATE_PATH ?>