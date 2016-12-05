<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title;?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo site_url('admin/admin');?>" class="logo">
                    <img src="<?php echo $baseurl?>assets/images/logo.png" width="160px">
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav"></ul>
                    </div>
                </nav>
            </header>