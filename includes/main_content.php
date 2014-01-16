


 <!-- CONTENT SIDE-->
    <div class="span8">
      <!-- INNER ROW-->
        <div class="row-fluid">
          <div class="span12">
          <!-- article-->
           <ul class="breadcrumb">  
  <li>  
    <a href="#">Home</a> <span class="divider">/</span>  
  </li>  
  <li class="active">Main Posts</li>  
</ul> 

              
          <!--/ article-->
          </div>
        </div>
        
        
 <?php  
  include("includes/connect.php");

    $select_posts = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 0, 10";

    $run_posts = mysql_query($select_posts);

    while($row=mysql_fetch_array($run_posts)){
      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      $post_date = $row['post_date'];
      $post_author = $row['post_author'];
      $post_image = $row['post_image'];
      $post_content = substr($row['post_content'],0,200);

?>

      <div class="row-fluid">
        <div class="span12">
       
              
              
              <h2>
                <a class="" href="pages.php?id=<?php echo $post_id; ?>">
                <?php echo $post_title; ?></a>
              </h2>
              <p>
                <?php echo $post_content; ?><br />
                <a class="" href="pages.php?id=<?php echo $post_id; ?>" title="Read more">Read more &rarr;</a>
              </p>
              <div class="caption">
                   <small><p style="margin-top:10px;"><strong>by: <a href="#"><?php echo $post_author; ?></a>
                    | <?php echo $post_date; ?>  
                  | categories: <a href="#">php</a>, <a href="#">mysql</a> | <a href="#">comments <span class="badge badge-warning"> 8</span></a></strong>
                  </p></small>
                </div>
        </div>
        
      </div>


<?php  
    }
  ?>

    
      
      
      <!-- /INNER ROW-FLUID-->
    <hr>
         <!-- related projects -->

 <!-- related projects 
<div class="pagination">  
  <ul>  
    <li class="disabled"><a href="#">&laquo;</a></li>  
    <li class="active">  
      <a href="#">1 </a>  
    </li>  
    <li><a href="#">2</a></li>  
    <li><a href="#">3</a></li>  
    <li><a href="#">4</a></li>  
    <li><a href="#">&raquo;</a></li>  
  </ul>  
</div>  -->
