<?php 
	include("includes/connect.php");

	if(isset($_GET['del'])){
		$delete_id = $_GET['del'];

		$delete_query = "DELETE FROM posts WHERE post_id='$delete_id'";

		if(mysql_query($delete_query)){
			echo "<script>alert('Post has been DELETED')</script>";
			echo "<script>window.open('view_posts.php','_self')</script>";
		}
	}

 ?>
