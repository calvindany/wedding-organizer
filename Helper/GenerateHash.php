<?php
    $password = password_hash("password", PASSWORD_DEFAULT);

    echo "<script>console.log('". $password  ."')</script>"

?>