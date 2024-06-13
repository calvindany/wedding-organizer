<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $isLoggedIn = isset($_SESSION['username']);
?>
<nav class="navbar navbar-expand-lg shadow-sm p-4" style="background-color: #162719;">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand text-white" href="<?php echo $BASE_URL ?>">Wedding Organizer</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            if ($isLoggedIn) {
                echo '<div class="collapse navbar-collapse " id="navbarNav">';
                echo '<ul class="navbar-nav ms-auto navigation">';
                echo '<li class="nav-item">';
                echo '<a class="nav-link active" style="color: #f2E8CF" aria-current="page" href="'. $BASE_URL . '/admin">Katalog</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link active text-white" aria-current="page" href="'. $BASE_URL . '#">Pesanan</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link active text-white" aria-current="page" href="'. $BASE_URL . '#">Profil</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<form method="POST" action="' . $BASE_URL . 'admin/logout' .'"><button class="btn btn-danger" type="submit">Log Out</button></form>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
            } else {
                echo '<div class="collapse navbar-collapse " id="navbarNav">';
                echo '<ul class="navbar-nav ms-auto navigation">';
                echo '<li class="nav-item">';
                echo '<a class="btn btn-primary" href="'. $BASE_URL . 'admin/login' .'">Log In</a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
            }      
        ?>
    </div>
</nav>
