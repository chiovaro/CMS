<div class="container">
    <!-- Example row of columns -->
    <div class="row-fluid">
    <!-- left SIDE-->   
  <div class="span4 hidden-phone">         
    <div id="left-side-menu">  
    <div class="well" >
    <div class="tabbable">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#1" data-toggle="tab">Recent</a></li>
              <li><a href="#2" data-toggle="tab">Categories</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="1">
        <!-- ITEM-->
        <div class="row-fluid">
          <div class="span12">
            <ul class="nav nav-tabs nav-stacked">

            <?php  
              include("includes/connect.php");

              $query = "SELECT * FROM posts order by 1 DESC LIMIT 0,10";
                $run = mysql_query($query);

                while($row=mysql_fetch_array($run)){
                  $title=$row['post_title'];
                  $post_id=$row['post_id'];
                
            ?>

              <li><a href="pages.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a></li>     
  
            <?php } ?>
            </ul>
          </div>
          <div class="span2">
              <div class="thumbnail">
                <img src="img/thumb.jpg" alt="post image" />
              </div>
          </div>
        </div>
        <!-- / ITEM-->
          
        
              </div> <!--/tab recent post -->
              <div class="tab-pane" id="2">
               <!-- ITEM-->
        <div class="row-fluid">
          <div class="span12">
            <ul class="nav nav-tabs nav-stacked">  
            <li>  
              <a href="#">php <span class="badge badge-warning">9</span></a></li>     
              <li><a href="#">html <span class="badge badge-warning">4</span></a></li>  
              <li><a href="#">MySQL <span class="badge badge-warning">10</span></a></li>   
              <li><a href="#">java <span class="badge badge-warning">3</span></a></li>   
              <li><a href="#">JSON <span class="badge badge-warning">8</span></a></li> 
              <li><a href="#">JavaScript <span class="badge badge-warning">14</span></a></li>
              <li><a href="#">blog <span class="badge badge-warning">6</span></a></li>
              <li><a href="#">shop <span class="badge badge-warning">4</span></a></li>
              <li><a href="#">game <span class="badge badge-warning">4</span></a></li>
              <li><a href="#">d3js <span class="badge badge-warning">4</span></a></li>  
            </ul> 
          </div>
<div class="span2">
              <div class="thumbnail">
                <img src="img/thumb.jpg" alt="post image" />
              </div>
          </div>
          
        </div>
        <!-- / ITEM-->

        
              </div>

            </div>
          </div>
         <!-- /TABS-->
    </div><!-- /well--> 
    </div>      
    </div>
  <!-- /left SIDE--> 
  <!-- /left SIDE--> 
