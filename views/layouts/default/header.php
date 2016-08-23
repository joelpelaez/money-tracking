<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Tracking</title>
    <link rel="stylesheet" href="<?php echo APP_URL_CSS; ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL_CSS; ?>bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL_CSS; ?>style.css">
    <script src="<?php echo APP_URL_JS; ?>jquery-3.1.0.min.js"></script>
    <script src="<?php echo APP_URL_JS; ?>bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo APP_URL; ?>">Money Tracking</a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-main-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="<?php echo APP_URL; ?>users">Users</a></li>
                                <li><a href="<?php echo APP_URL; ?>accounts">Accounts</a></li>
                                <li><a href="<?php echo APP_URL; ?>categories">Categories</a></li>
                                <li><a href="<?php echo APP_URL; ?>transactions">Transactions</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Hi <?php echo $_SESSION['username']; ?>!</a></li>
                                <li><a href="<?php echo APP_URL; ?>users/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

                
            
    