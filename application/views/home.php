<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall - Code Igniter Version + Bootstrap</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- bootstrap javascript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- put your content here -->
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="row">
                         <div class="col-md-1"></div>
                         <div class="col-md-10">
                            <h3 class="navbar-text"><a href="/" class="navbar-link">Test App</a></h3>
                            <h4 class="navbar-text"><a href="/" class="navbar-link">Home</a></h4>
                            <h4 class="navbar-text navbar-right"><a href="/mains/signin" class="navbar-link">Sign in</a></h4>
                        </div>
                        <div class="col-md-1"></div>    
                    </div>
                </nav>
            </div>
        </div>
        <div class="row body">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1>Welcome to the Test</h1>
                    <p>We're going to build a cool application using a MVC framework! This application was built with the Village88 folks!</p>
                    <p><a class="btn btn-primary btn-lg" href="/mains/signin" role="button">Start</a></p>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row boxes">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Manage Users</h3>
                        <p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Leave messages</h3>
                        <p>Users will be able to leave a message to another user using this application.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Edit User Information</h3>
                        <p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>