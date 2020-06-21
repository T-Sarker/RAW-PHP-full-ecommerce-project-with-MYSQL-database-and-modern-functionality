<?php   
    include "../lib/session.php";
    Session::checkLogin();

    date_default_timezone_set('Asia/Dhaka');
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>
<?php include '../classes/logoClass.php'; ?>

<?php
    $bc= new LogoClasses();
    $af= new Format();
?>
    <?php
    if (Session::get('Alogin') != 'true' && empty($_COOKIE["email"])) {
        echo "<script>window.location.href = 'login.php';</script>";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action']=='logout') {
        // Session::destroy();
        Session::set('Alogin','false');
        echo "<script>window.location.href = 'login.php';</script>";
        }
    }


?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Techdyno Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.html">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kulim+Park:200,300,400,600,700|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/tapos.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://www.tiny.cloud/css/codepen.min.css">
</head>
<style>

</style>

<body style="padding:0px;">