<?php

include "Config/Constant.php";
include "Config/FileUploadStatus.php";
include "Config/OrderStatus.php";
include "Helper/Auth.php";

$REQUEST_URI = $_SERVER['REQUEST_URI'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

$VIEWDIRADMIN = '/app/admin/';
$VIEWDIRUSER = '/app/user/';
$BASEROUTE='/wedding-organizer';


if (strpos($REQUEST_URI, $BASEROUTE) === 0) {
    $REQUEST_URI = substr($REQUEST_URI, strlen($BASEROUTE));
}

// echo $REQUEST_URI;

switch (true) {
    case $REQUEST_URI == '/':
        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRUSER . 'LandingPage/Logic/Catalogue.php';

            $data = GetCatalogue($conn);

            require __DIR__ . $VIEWDIRUSER . 'LandingPage/Index.php';

            $conn->close();
        }

        break;

    case preg_match('#^/catalogue/detail/(\d+)$#', $REQUEST_URI, $matches):
        $id = $matches[1];

        if($REQUEST_METHOD === 'GET') {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRUSER . 'DetailCatalogue/Logic/Catalogue.php';

            $data = GetCatalogueById($id, $conn);

            require __DIR__ . $VIEWDIRUSER . 'DetailCatalogue/Index.php';

            $conn->close();
        }

        break;

    case $REQUEST_URI == '/order':

        if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            include "Helper/FileHelper.php";
            
            require __DIR__ . $VIEWDIRUSER . 'DetailCatalogue/Logic/Order.php';
        }

        break;

    case $REQUEST_URI == '/test':

        include "Helper/Connection.php";

        if($REQUEST_METHOD == "GET") {
            require __DIR__ . '/app/Test.php';
        }

        $conn->close();

        break;

    case $REQUEST_URI == '/admin':
        isUserLoggedIn();
        if($REQUEST_METHOD === 'GET') {

            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/Catalogue.php';
            $data = GetCatalogue($conn);

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Index.php';

            $conn->close();
        }
        break;
    
    case $REQUEST_URI == '/admin/catalogue/add':
        isUserLoggedIn();

        if($REQUEST_METHOD === 'GET') {
            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Add.php';
        } else if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            include "Helper/FileHelper.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/PostCatalogue.php';
        }

        break;

    case preg_match('#^/admin/catalogue/detail/(\d+)$#', $REQUEST_URI, $matches):
        $id = $matches[1];
        
        isUserLoggedIn();

        if($REQUEST_METHOD === 'GET') {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/Catalogue.php';

            $data = GetCatalogueById($id, $conn);

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Detail.php';

            $conn->close();
        }

        break;

    case preg_match('#^/admin/catalogue/edit/(\d+)$#', $REQUEST_URI, $matches):
        $id = $matches[1];

        isUserLoggedIn();

        if($REQUEST_METHOD === 'GET') {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/Catalogue.php';

            $data = GetCatalogueById($id, $conn);

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Add.php';
            
            $conn->close();

        } else if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            include "Helper/FileHelper.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/PutCatalogue.php';

            $conn->close();
        }

        break;

    case $REQUEST_URI == '/admin/catalogue/delete':

        isUserLoggedIn();

        if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Logic/DeleteCatalogue.php';

            $conn->close();
        }

        break;
    
    case $REQUEST_URI == '/admin/pesanan':
        isUserLoggedIn();

        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Order/Logic/Order.php';

            $data = GetOrder($conn);

            require __DIR__ . $VIEWDIRADMIN . 'Order/Index.php';

            $conn->close();
            
        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Order/Logic/UpdateStatus.php';

            $conn->close();
        }

        break;
    
    case $REQUEST_URI == '/admin/laporan':
        isUserLoggedIn();

        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Report/Logic/Report.php';

            $data = GetReport($conn);

            require __DIR__ . $VIEWDIRADMIN . 'Report/Index.php';

            $conn->close();
        }

        break;
    
    case $REQUEST_URI == '/admin/profil':
        isUserLoggedIn();

        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Profile/Logic/Profile.php';

            $data = GetProfile($conn);

            require __DIR__ . $VIEWDIRADMIN . 'Profile/Index.php';

            $conn->close();
        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Profile/Logic/PostProfile.php';

            $conn->close();
        }

        break;

    case $REQUEST_URI == "/admin/pengaturan":

        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Logic/WebSettings.php';
            
            $data = GetWebSettings($conn);
            
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Index.php';

            $conn->close();

            break;
        }
    
    case $REQUEST_URI == "/admin/pengaturan/add":

        if($REQUEST_METHOD == "GET") {
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Add.php';

        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Logic/AddWebSettings.php';

            $conn->close();
        }

        break;

    case preg_match('#^/admin/pengaturan/edit/(\d+)$#', $REQUEST_URI, $matches):
        $id = $matches[1];

        if($REQUEST_METHOD == "GET") {
            include "Helper/Connection.php";
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Logic/WebSettings.php';

            $data = GetWebSettingsById($id, $conn);

            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Add.php';

            $conn->close();
        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Logic/PutWebSettings.php';

            $conn->close();
        }

        break;
    
    case $REQUEST_URI == "/admin/pengaturan/delete":

        if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";
            require __DIR__ . $VIEWDIRADMIN . 'WebSettings/Logic/DeleteWebSettings.php';

            $conn->close();
        }

        break;


    case $REQUEST_URI == '/admin/login':
        if ($REQUEST_METHOD == "GET") {            
            require __DIR__ . $VIEWDIRADMIN . 'Auth/Login.php';
            break;
        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Auth/Logic/PostLogin.php';

            $conn->close();
        }
        break;

    case $REQUEST_URI == '/admin/logout':
        if($REQUEST_METHOD == "POST") {
            require __DIR__ . $VIEWDIRADMIN . 'Auth/Logic/Logout.php';
        }
        break;

    default:
        echo "NotFound";
        break;
}