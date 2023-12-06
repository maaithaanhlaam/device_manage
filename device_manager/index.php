<?php
session_start();
ob_start();
if(!isset($_SESSION['account'])) {
    header('Location: view/dangnhap.php');
    exit;
}
