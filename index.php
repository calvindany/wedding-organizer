<?php

include "Config/Constant.php";

$REQUEST_URI = $_SERVER['REQUEST_URI'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

$VIEWDIRADMIN = '/app/admin/';
$BASEROUTE='/wedding-organizer';


if (strpos($REQUEST_URI, $BASEROUTE) === 0) {
    $REQUEST_URI = substr($REQUEST_URI, strlen($BASEROUTE));
}

// echo $REQUEST_URI;

switch ($REQUEST_URI) {
    case '/test':
        
        include "Helper/Connection.php";

        if($REQUEST_METHOD == "GET") {
            require __DIR__ . '/app/Test.php';
        }

        $conn->close();

        break;
    case '/admin/':
        if($REQUEST_METHOD === 'GET') {
            require __DIR__ . $VIEWDIRADMIN . 'Login.php';
        }
        break;
    case '/admin/login':
        if ($REQUEST_METHOD == "GET") {
            include $HEADER_TEMPLATE_PATH;
            require __DIR__ . $VIEWDIRADMIN . 'Login.php';
            include $FOOTER_TEMPLATE_PATH;   
        } else if ($REQUEST_METHOD == "POST") {
            require __DIR__ . $VIEWDIRADMIN . 'Logic/PostLogin.php';
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