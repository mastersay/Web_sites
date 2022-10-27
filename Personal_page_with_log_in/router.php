<?php
// router.php
if (preg_match('/\.(?:php|html|js|css|png|jpg)$|\/$|Personal_page/(assets|forms)/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
//    header("Location: Log_in/");
    echo '<meta http-equiv="refresh" content="2;url=/Personal_page/" />';
    exit();
}
