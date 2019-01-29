<?php

if (isset($_POST['submit'])){
session_start();
session_unset();
session_destroy();
setcookie ("isLoggedIn", 'false', time()+3600, '/', NULL, 0 );
header("Location: ../index.html");
exit();
}else {
    header("Location: ../index.html");
    exit();
}
?>