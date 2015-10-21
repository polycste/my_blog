<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/css/bootstrap.css">
    <link rel="stylesheet" href="../style/css/admin.css">
    <script>
        function check_delete(){
            return confirm('Are you sure you want to delete this entry');
        }
    </script>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="home.php" class="navbar-brand">Admin Dashboard</a>
        </div>
        <!-- end navbar-header -->

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $username = isset($_SESSION['username']) ?  $_SESSION['username'] : $_COOKIE['username'] ; echo $username; ?> <strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li> <a target="_blank" href="../frontend/home.php">View Blog</a> </li>
                        <li class="divider"></li>
                        <li> <a href="logout.php">Logout</a> </li>
                    </ul>
                    <!-- end dropdown-menu -->
                </li>
            </ul>
        </div>
        <!-- end collapse -->
    </div>
    <!-- end container -->
</nav>
