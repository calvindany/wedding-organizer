<?php

include "Config/Constant.php";
include "Config/FileUploadStatus.php";
include "Helper/Auth.php";

$REQUEST_URI = $_SERVER['REQUEST_URI'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

$VIEWDIRADMIN = '/app/admin/';
$BASEROUTE='/wedding-organizer';


if (strpos($REQUEST_URI, $BASEROUTE) === 0) {
    $REQUEST_URI = substr($REQUEST_URI, strlen($BASEROUTE));
}

// echo $REQUEST_URI;

switch (true) {
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

            require __DIR__ . $VIEWDIRADMIN . 'Logic/Catalogue.php';
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
            
            require __DIR__ . $VIEWDIRADMIN . 'Logic/PostCatalogue.php';
        }

        break;

    case preg_match('#^/admin/catalogue/detail/(\d+)$#', $REQUEST_URI, $matches):
        $id = $matches[1];
        
        isUserLoggedIn();

        if($REQUEST_METHOD === 'GET') {
            include "Helper/Connection.php";

            require __DIR__ . $VIEWDIRADMIN . 'Logic/Catalogue.php';

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

            require __DIR__ . $VIEWDIRADMIN . 'Logic/Catalogue.php';

            $data = GetCatalogueById($id, $conn);

            require __DIR__ . $VIEWDIRADMIN . 'Catalogue/Add.php';
            
            $conn->close();

        } else if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            include "Helper/FileHelper.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Logic/PutCatalogue.php';

            $conn->close();
        }

        break;

    case $REQUEST_URI == '/admin/catalogue/delete':

        isUserLoggedIn();

        if ($REQUEST_METHOD === 'POST') {
            include "Helper/Connection.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Logic/DeleteCatalogue.php';

            $conn->close();
        }

        break;

    case $REQUEST_URI == '/admin/login':
        if ($REQUEST_METHOD == "GET") {            
            require __DIR__ . $VIEWDIRADMIN . 'Login.php';
        } else if ($REQUEST_METHOD == "POST") {
            include "Helper/Connection.php";
            
            require __DIR__ . $VIEWDIRADMIN . 'Logic/PostLogin.php';

            $conn->close();
        }
        break;

    case $REQUEST_URI == '/admin/logout':
        if($REQUEST_METHOD == "POST") {
            require __DIR__ . $VIEWDIRADMIN . 'Logic/Logout.php';
        }
        break;

    default:
        echo "NotFound";
        break;
    // case '/views/users':
    //     require __DIR__ . $viewDir . 'users.php';
    //     break;

    // case '/contact':
    //     require __DIR__ . $viewDir . 'contact.php';
    //     break;

    // default:
    //     http_response_code(404);
    //     require __DIR__ . $viewDir . '404.php';
}