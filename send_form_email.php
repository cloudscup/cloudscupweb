<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to ="cloudscup@gmail.com";// "sharanu.amg123@gmail.com";
 
    $email_subject = "CloudsCup: Notify Me";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
       
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['email'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    
 
    $email_from =$_POST['email'];//"cloudscup@gmail.com";// $_POST['email']; // required
 
   
      $comments = ''; // required
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  
 
  
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Following user showed interest in cloudscup products:.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 

 
    $email_message .= "".clean_string($comments)."";
 $email_message .= "".clean_string($email_from)."\n";
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_to."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
echo "<script>alert('We'll let you know');</script>";
echo '<META http-equiv="refresh" content="0;http://www.cloudscup.com">';
}
?>












