<nav class="navbar navbar-expand-lg shadow-sm p-4">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand text-white" href="<?php echo $BASE_URL ?>">Wedding Organizer</a>
        <!-- <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto navigation">
                <!-- <li class="nav-item">
                    <a class="btn btn-primary" href="'. $BASE_URL . 'admin/login' .'">Log In</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $REQUEST_URI == '/' ? 'active' : 'text-white' ?>" href="<?php echo $BASE_URL . '' ?>">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $REQUEST_URI == '/tentang-kami' ? 'active' : 'text-white' ?>" href="<?php echo $BASE_URL . 'tentang-kami' ?>">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
