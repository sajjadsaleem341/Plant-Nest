<?php
require "config.php";
require "functions.php";
// User must login first to access this page.//
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
}
else {
    echo "<script>window.location.href='index.php'</script>";
   die();
}
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$subject=get_safe_value($con,$_POST['subject']);
$feedback=get_safe_value($con,$_POST['feedback']);
$date=date('y-m-d h:i:s');
mysqli_query($con,"insert into feedback(name,email,subject,feedback,date)values('$name','$email','$subject','$feedback','$date')");
echo "ThankYou";