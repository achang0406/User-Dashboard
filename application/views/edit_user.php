<?php
if($this->session->userdata('user'))
{
    // if($this->session->userdata('user')['admin'] == 1)
    // {
    // }
    // else
    // { 
    //     redirect('/user_info_process/dashboard');     
    // }
} 
else 
{
    redirect('/mains/signin');   
}
?>

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
                            <h4 class="navbar-text"><a href="/user_info_process/dashboard" class="navbar-link">Dashboard</a></h4>
                            <h4 class="navbar-text navbar-right"><a href="/user_info_process/logoff" class="navbar-link">Log off</a></h4>
                            <h4 class="navbar-text pull-right"><a href=<?php echo '"'.'/mains/user_info/'.$this->session->userdata('user')['id'].'"'; ?> class="navbar-link"><?php echo $this->session->userdata('user')['first_name'].' '.$this->session->userdata('user')['last_name']?></a></h4>
                        </div>
                        <div class="col-md-1"></div>    
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <?php 
                if($this->session->userdata('user')['admin'] == 1)
                {?>
                <h3>Edit user #<?php echo $id; ?></h3>
                <?php } else {?>
                <h3>Edit Profile</h3>
                <?php }?>
            </div>
            <div class="col-md-2">
                <a href="/user_info_process/dashboard"><button type="submit" class="btn btn-default pull-right">Return to Dashboard</button></a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12"><label></label></div>
        </div>
        <div class="row form">
            <div class="col-md-2"></div>
            <div class="col-md-4 box">
                <form action='/user_info_process/edit_user_info' method='post'>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" value=<?php echo '"'.$id.'"'; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="action" value="update_info">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="first name">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                    </div>
                    <?php if($this->session->userdata('user')['admin'] == 1)
                    {?>
                    <div class="form-group">
                        <label for="user level">User Level</label>
                        <select class="form-control" name="user_level">
                            <option>normal</option>
                            <option>admin</option>
                        </select>
                    </div>
                    <?php }?>
                    <button type="submit" class="btn btn-default pull-right">Save</button>
                </form>
            </div>
            <div class="col-md-4 box">
                <form action='/user_info_process/edit_user_info' method='post'>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" value=<?php echo '"'.$id.'"'; ?>>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="action" value="update_password">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password confirmation">New Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-default pull-right">Update Password</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class='row'>
        </div>
    </div>
</body>
</html>