<?php
session_start();
session_destroy();
header('location: http://localhost/inz/index.php');

?>