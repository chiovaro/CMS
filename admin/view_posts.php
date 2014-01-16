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

    <h2><a href="logout.php">Logout</a></h2>
    <h2><a href="view_posts.php">View Post</a></h2>
    <h2><a href="index.php?insert=insert">Insert New</a></h2>
    <h2><a href="#">View Comments</a></h2>
    


  </div>

  <table width="1000" border="5" align="center" bgcolor="pink">
    <tr>
      <td colspan="10" align="center" bgcolor="yellow"><h1>View All Posts</h1></td>
    </tr>
    <tr bgcolor="orange">
      <th>Posts #:</th>
      <th>Post Date:</th>
      <th>Post Author:</th>
      <th>Post Title:</th>
      <th>Post Content</th>
      <th>Delete Post:</th>
      <th>Edit Post:</th>
    </tr>

    <?php 
      include("includes/connect.php");

      $query = "SELECT * FROM posts ORDER BY 1 DESC";
      $run = mysql_query($query);

      while($row=mysql_fetch_array($run)){
        $post_id = $row['post_id'];
        $post_date = $row['post_date'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_content = substr($row['post_content'],0,200);
      

     ?>

    <tr>
      <td><?php echo $post_id; ?></td>
      <td><?php echo $post_date; ?></td>
      <td><?php echo $post_author; ?></td>
      <td><?php echo $post_title; ?></td>
      <td><?php echo $post_content; ?></td>
      <td><a href="delete.php?del=<?php echo $post_id; ?>">Delete</a></td>
      <td><a href="edit.php?edit=<?php echo $post_id; ?>">Edit</a></td>
    </tr>
    <?php } ?>
  </table>



</body>
</html>

<?php } ?>
