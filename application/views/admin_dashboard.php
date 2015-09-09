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
    <!-- Custom style -->
    <style type="text/css">
        .pop-message{
            color: <?php echo $message_color;?>;
        }
        a.warning{
            margin-left: 10px;
        }
    </style>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- bootstrap javascript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Custom javascript -->
    <script type="text/javascript">
        $(document).ready(function(){

            $(".warning").removeClass('hover');
            $(".remove").click(function(){
                var value1 = $(this).attr("value");
                console.log(value1);
                $("a.firm_yes").attr("href", "/mains/remove/"+value1);
                var value2 = $("a.firm_yes").attr("href");
                console.log(value2);
                $('.alert').show().delay(2000).fadeOut(1500, "swing");
            });
            $('.close, .firm_no').click(function(){
                $('.alert').hide();
            });
 

        });
    </script>
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
                            <?php if($this->session->userdata('user')['admin'] == 0)
                            {?>
                            <h4 class="navbar-text navbar-right"><a href=<?php echo '"'.'/mains/edit_user/'.$this->session->userdata('user')['id'].'"'; ?> class="navbar-link">Edit Profile</a></h4>
                            <?php }?>
                        </div>
                        <div class="col-md-1"></div>    
                    </div>
                </nav>
            </div>
        </div>
        <div class="row titles">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <?php if($this->session->userdata('user')['admin'] == 1)
                {?>
                <h3>Manage Users</h3>
                <?php } else {?>
                <h3>All users</h3>
                <?php }?>
            </div>
            <div class="col-md-3">
                <p class='pop-message'><?php if($message){echo $message; $this->session->unset_userdata('message');}?></p>
            </div>
            <div class="col-md-2">
                <?php if($this->session->userdata('user')['admin'] == 1) {?>
                <a href="/mains/new_user"><button type="submit" class="btn btn-default pull-right">Add New</button></a>
                <?php }?>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row admin_dashboard">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr class="info">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created</td>
                        <td>User Level</td>
                        <?php 
                        if($this->session->userdata('user')['admin'] == 1) {?>
                        <td>Actions</td>
                        <?php }?>
                    </tr>
                    <?php
                    foreach($all_users as $user)
                    {
                    ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><a href=<?php echo '"/mains/user_info/'.$user["id"].'"'?>><?php echo $user['first_name'].' '.$user['last_name']; ?></a></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['created_on']; ?></td>
                        <td><?php if($user['admin'] == 1) {echo 'admin';} else {echo 'normal';} ?></td>
                        
                        <?php 
                        if($this->session->userdata('user')['admin'] == 1)
                        {?>
                        <td>
                            <a href=<?php echo '"'.'/mains/edit_user/'.$user['id'].'"'; ?>>edit</a>
                            <a class="remove" value=<?php echo '"'.$user['id'].'"'?>>remove</a>
                            <!-- <a class='remove' href=<?php echo '"'.'/mains/remove/'.$user['id'].'"'; ?>>remove</a> -->
                        </td>
                        <?php }?>
                    </tr>  
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-warning alert-dismissible fade in" role="alert" style="display:none;"role="alert">
                    <button type="button" class="close" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <span>Are you sure?</span>
                    <a class="warning firm_yes" href="">Yes</a>
                    <a class="warning firm_no">No</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>