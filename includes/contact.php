


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
  <li class="active">Contact</li>  
</ul> 

              
          <!--/ article-->
          </div>
        </div>

      <div class="row-fluid">
        <div class="span12">
       
                  <form class="form-horizontal" name="contactform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" id="contact">
                      <div class="control-group">
                        <label class="control-label" for="inputName">Name</label>
                        <div class="controls">
                          <input type="text" id="inputName" name="inputName" placeholder="Your Name">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                          <input type="text" id="inputEmail" name="inputEmail" placeholder="Your Email">
                       </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputSubject">Subject</label>
                        <div class="controls">
                          <input type="text" id="inputSubject" name="inputSubject" placeholder="Subject Message">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputMessage">Message</label>
                        <div class="controls">
                          <textarea  rows="4" id="inputMessage" name="inputMessage" placeholder="Your message..."></textarea>
                        </div>
                      </div>


                      <div class="control-group">
                      <div class="controls">
                  
                      <button type="submit" class="btn">Submit</button>
                      </div>
                      </div>
                  </form>


              
         <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                 
                // CHANGE THE TWO LINES BELOW
                $email_to = "chiovaro@gmail.com";
                 
                $email_subject = "Zachio.com Contact Form";
                 
                 
                function died($error) {

                  echo "<div class='alert alert-danger'><span class ='glyphicon glyphicon-warning-sign'></span> Sorry, but there were error(s) found with the form you submitted.<br>
                    Error(s): $error<br>
                    Please fix these and try again.</div>";
                    // your error code can go here
                    die();
                }
                 
                 
                $name = $_POST['inputName']; // required
                $email = $_POST['inputEmail']; // required
                $subject = $_POST['inputSubject']; // required
                $message = $_POST['inputMessage']; // not required
                 
                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                if(!preg_match($email_exp,$email)) {
                $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
                }
                $string_exp = "/^[A-Za-z .'-]+$/";
                if(strlen($message) < 2) {
                $error_message .= 'The message you entered do not appear to be valid.<br />';
                }
                if(strlen($error_message) > 0) {
                  died($error_message);
                }
                $email_message = "Form details below.\n\n";
                 
                function clean_string($string) {
                  $bad = array("content-type","bcc:","to:","cc:","href");
                  return str_replace($bad,"",$string);
                }
                 
                $email_message .= "Name: ".clean_string($name)."\n";
                $email_message .= "Email: ".clean_string($email)."\n";
                $email_message .= "Subject: ".clean_string($subject)."\n";
                $email_message .= "Message: ".clean_string($message)."\n";
                 
                 
                // create email headers
                $headers = 'From: '.$email."\r\n".
                'Reply-To: '.$email."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                @mail($email_to, $email_subject, $email_message, $headers);  
                
                 echo "<div class='alert alert-info'><span class ='glyphicon gglyphicon glyphicon-ok'></span> Message sent, thanks!  I'll respond as fast as I can.</div>";

                 
            
                }
            ?>
        
      </div>



    
      
      
