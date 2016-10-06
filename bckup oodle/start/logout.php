<?php
session_start();
    setcookie("uname",NULL,time()-86400);
session_destroy();
header("Location: index.php");
exit;
?>