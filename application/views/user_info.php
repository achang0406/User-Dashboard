<?php
if($this->session->userdata('user'))
{
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
    <!-- Custom Styling -->
    <style type="text/css">
        .left_message a, .comments a{
            text-decoration: underline;
        }
        .user_info{
            display: inline-block;
            width: 100px;
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
            <div class="col-md-8">
                <h2><?php echo $first_name.' '.$last_name;?></h2>
                <br>
                <p><span class="user_info">Registered:</span><?php echo $created_on;?></p>
                <p><span class="user_info">User ID:</span>#<?php echo $id;?></p>
                <p><span class="user_info">Email adress:</span><?php echo $email;?></p>
                <p><span class="user_info">Description:</span>I am happy to be here!</p>
            </div>
            <div class="col-md-2"></div>
        </div>

        <!-- THE WALL -->
        <div class="row post_message">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Leave a message for <?php echo $first_name;?></h3>
                <form action='/the_wall/post_message' method='post'>
                    <div class="form-group">
                        <!-- <input type="hidden" name="user_id" value=<?php echo '"'.$id.'"'?>> -->
                        <label for="message_area"></label>
                        <textarea class="form-control" name="message_area"></textarea>
                        <br>
                        <button type="submit" class="btn btn-default pull-right">Post</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>

        <?php 
        foreach ($profile_messages as $message)
        {
        ?> 
        <br>
        <div class="row left_message">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-heading panel-title"><a href=""><?php echo $message['first_name']?></a> wrote<span class="pull-right"><?php echo $message['created_at'];?></span></div>
                  <div class="panel-body"><?php echo $message['content']?></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row comments">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <!-- each comment -->
                <?php 
                foreach($profile_comments as $comment)
                {
                    if($message['id'] == $comment['message_id'])
                    {
                ?>
                <div class="row comment">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title"><a href=""><?php echo $comment['first_name'];?></a> wrote<span class="pull-right"><?php echo $comment['created_at'];?></span></div>
                            <div class="panel-body"><?php echo $comment['content'];?></div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>

                <!-- post comment -->
                <div class="row post_comment">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <form action='/the_wall/post_comment' method='post'>
                            <input type="hidden" name="message_id" value=<?php echo '"'.$message['id'].'"';?>>
                            <textarea class="form-control" name="comment_area"></textarea>
                            <br>
                            <button type="submit" class="btn btn-default pull-right">Post</button>     
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <?php
        }
        ?>

        <br>
    </div>
</body>
</html>