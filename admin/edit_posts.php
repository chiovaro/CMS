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

    <h2><a href="#">Logout</a></h2>
    <h2><a href="view_posts.php">View Post</a></h2>
    <h2><a href="#">Insert New</a></h2>
    <h2><a href="#">View Comments</a></h2>
    


  </div>

  <form method="post" action="insert_post.php" enctype="multipart/form-data">
    <table width="600" align="center" border="10" bgcolor="orange">
      <tr>
        <td align="center" bgcolor="yellow" colspan="6"><h1>Insert New Post</h1></td>
      </tr>

      <tr>
        <td align="right">Post Title</td>
        <td><input type="text" name="title" size="30"></td>
      </tr>

      <tr>
        <td align="right">Post Author</td>
        <td><input type="text" name="author" size="30"></td>
      </tr>

      <tr>
        <td align="right">Post Keywords</td>
        <td><input type="text" name="keywords" size="30"></td>
      </tr>

      <tr>
        <td align="right">Post Image</td>
        <td><input type="file" name="image"></td>
      </tr>

      <tr>
        <td align="right">Post Content</td>
        <td><textarea name="content" id="content" cols="30" rows="15"></textarea></td>
      </tr>

      <tr>
        <td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
      </tr>
      
    </table>    

  </form>


  
</body>
</html>

<?php  
  include("includes/connect.php");

  if(isset($_POST['submit'])){
    $post_title = $_POST['title'];
    $post_date = date('m-d-y');
    $post_author = $_POST['author'];
    $post_keywords = $_POST['keywords'];
    $post_content = $_POST['content'];
    $post_image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($post_title=='' or $post_keywords=='' or $post_content=='' or 
      $post_author==''){
      echo "<script>alert('any of the fiels is empty')</script>";
      exit();
    }else{

      move_uploaded_file($image_tmp, "../img/$post_image");
;


      $insert_query = "INSERT into posts (post_title, post_date, post_author, post_image,
        post_keywords, post_content) values ('$post_title','$post_date','$post_author',
        '$post_image', '$post_keywords','$post_content')";

      if(mysql_query($insert_query)){
        echo "<center><h1>Post Published successfully!</h1></center>";
      }
    }
  }//post if

?>

