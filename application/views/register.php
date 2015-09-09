<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall - Code Igniter Version + Bootstrap</title>
    <!-- Custom Styling -->
    <style type="text/css">
        .error{
            display: inline-block;
            color: red;
        }
        input.box{
            width: 40%;
        }
        input button{
            margin-left: 10%;
        }
        label{
            height: 25px;
        }
    </style>
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
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Register</h3>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row form">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action='/user_info_process/new_user' method='post'>
                    <input type="hidden" class="form-control" name="action" value="register">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <?php if($this->session->flashdata('email')) {echo '<span class="error">'.$this->session->flashdata('email').'</span>';} 
                        ?>
                        <input type="text" class="form-control box" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="first name">First Name</label>
                        <?php if($this->session->flashdata('first_name')) {echo '<span class="error">'.$this->session->flashdata('first_name').'</span>';} 
                        ?>
                        <input type="text" class="form-control box" name="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last name">Last Name</label>
                        <?php if($this->session->flashdata('last_name')) {echo '<span class="error">'.$this->session->flashdata('last_name').'</span>';} 
                        ?>
                        <input type="text" class="form-control box" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?php if($this->session->flashdata('password')) {echo '<span class="error">'.$this->session->flashdata('password').'</span>';} 
                        ?>
                        <input type="password" class="form-control box" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password confirmation">Password Confirmation</label>
                        <?php if($this->session->flashdata('password_confirmation')) {echo '<span class="error">'.$this->session->flashdata('password_confirmation').'</span>';} 
                        ?>
                        <input type="password" class="form-control box" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-default">Create</button>
                </form>
            </div>

            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12"><label></label></div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="/mains/signin">Already have an account? Login.</a>
            </div>
            <div class="col-md-7"></div>
        </div>
    </div>
</body>
</html>