<?php
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
 $conn = new mysqli('localhost','root', '', 'portfolio');
if($conn->connect_error) {
      die('connection Failed: ' .$conn->connect_error);            
}
else {
   if($stmt=$conn->prepare("insert into contact(name,email,message) VALUES(?,?,?,?,?,?)")){
   $stmt->bind_param("sss",$name,$email,$message);
    $stmt->execute();
    echo "Thank you!!!Your details has been taken Successfully";
   $stmt->close();
   $conn->close();
  } 
  else {
      printf("Errormessage: %s\n",$conn->error);
  }
}
?>