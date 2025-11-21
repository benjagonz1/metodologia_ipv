<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /ipvsistema_php_puro/public/login.php");
    exit;
}
