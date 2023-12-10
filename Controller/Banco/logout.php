<?php
session_start();
session_destroy();
header("location: /Contas/View/index.php");
?>