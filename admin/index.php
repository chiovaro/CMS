<?php 
  session_start();

  if(!isset($_SESSION['user_name'])){
    header("location: login.php");
  }else{



 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A place to show my work and tinker around with new web and development technologies.  This is my playground.">
    <meta name="author" content="Zach Chiovaro">
    <link rel="shortcut icon" href="../ico/favicon.ico">

    <link rel="stylesheet" href="admin_style.css">

    <title>Admin</title>



</head>
<body>
  <div id="header">
    <a href="index.php">
      <h1>Welcome to the Admin Panel</h1></div>
    </a>

  <div id="sidebar">
    <h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>
    <h2><a href="logout.php">Logout</a></h2>
    <h2><a href="view_posts.php">View Post</a></h2>
    <h2><a href="index.php?insert=insert">Insert New</a></h2>
    <h2><a href="#">View Comments</a></h2>
    


  </div>

  <div id="welcome">
    <h1>Welcome to your Admin Panel</h1>
    <p>
      This is your admin panel, where you can manage your website files and posts.
    </p>

  </div>

  <?php 

    if(isset($_GET['insert'])){
      include("insert_post.php");
    }

   ?>

</body>
</html>

<?php } ?>
