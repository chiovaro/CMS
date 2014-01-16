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
    <h2><a href="insert_post.php">Insert New</a></h2>
    <h2><a href="#">View Comments</a></h2>
    


  </div>

  <?php  
    include("includes/connect.php");

    if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];

      $edit_query = "SELECT * FROM posts WHERE post_id='$edit_id'";

      $run_edit = mysql_query($edit_query);

      while($edit_row = mysql_fetch_array($run_edit)){
        $post_id = $edit_row['post_id'];
        $post_title = $edit_row['post_title'];
        $post_author = $edit_row['post_author'];
        $post_keywords = $edit_row['post_keywords'];
        $post_content = $edit_row['post_content'];
      }
    }

  ?>

  <form method="post" action="edit.php?edit_form=<?php echo $post_id; ?>" enctype="multipart/form-data">
    <table width="600" align="center" border="10" bgcolor="orange">
      <tr>
        <td align="center" bgcolor="yellow" colspan="6"><h1>Edit Post</h1></td>
      </tr>

      <tr>
        <td align="right">Post Title</td>
        <td><input type="text" name="title" size="30" value="<?php echo $post_title; ?>"></td>
      </tr>

      <tr>
        <td align="right">Post Author</td>
        <td><input type="text" name="author" size="30" value="<?php echo $post_author; ?>"></td>
      </tr>

      <tr>
        <td align="right">Post Keywords</td>
        <td><input type="text" name="keywords" size="30" value="<?php echo $post_keywords; ?>"></td>
      </tr>

      <tr>
        <td align="right">Post Image</td>
        <td><input type="file" name="image"></td>
      </tr>

      <tr>
        <td align="right">Post Content</td>
        <td><textarea name="content" id="content" cols="30" rows="15" ><?php echo $post_title; ?></textarea></td>
      </tr>

      <tr>
        <td align="center" colspan="6"><input type="submit" name="update" value="Update Post"></td>
      </tr>
      
    </table>    

  </form>

    <?php 
    if(isset($_POST['update'])){
      $update_id = $_GET['edit_form'];
      $post_title1 = $_POST['title'];
      $post_date1 = date('m-d-y');
      $post_author1 = $_POST['author'];
      $post_keywords1 = $_POST['keywords'];
      $post_content1 = $_POST['content'];
      $post_image1 = $_FILES['image']['name'];
      $image_tmp = $_FILES['image']['tmp_name'];

      if($post_title1=='' or $post_author1=='' or $post_keywords1=='' or $post_content1==''){
        echo "<script>alert('Any of the fields is empty')</script>";
        exit();
      }else{
        move_uploaded_file($imgage_tmp, "../images/$post_image");

        $update_query = "UPDATE posts SET post_title='$post_title1', post_date='$post_date1', post_author='$post_author1',
          post_image='', post_keywords='$post_keywords1', post_content='$post_content1' WHERE post_id='$update_id'";

          if(mysql_query($update_query)){
            echo "<script>alert('Post has been updated')</script>";
            echo "<script>window.open('view_posts.php','_self')</script>";
          }



      }
     } 


     ?>


  
</body>
</html>

