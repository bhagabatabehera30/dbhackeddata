<?php

session_start();



$servername = "localhost";

$username = "defenceb_author";

$password = "T2zF?x?Z}qgl";

$dbname = "defenceb_yte_store";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}



if(is_array($_FILES)) {
	
	if($_SESSION['cid']>0){

  if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {



    $sourcePath = $_FILES['userImage']['tmp_name'];

    $targetPath = "uploaded_files/User_Image/".time().'_'.$_FILES['userImage']['name'];



    

    //$image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension']



    if(move_uploaded_file($sourcePath,$targetPath)) {

      $sql = "UPDATE byte_customer SET image='".$targetPath."' WHERE customer_id='".$_SESSION['cid']."'";

      if ($conn->query($sql) === TRUE) { ?>

        <img src="<?php echo $targetPath; ?>" class="img-responsive" alt="User Image">

        <?php 

      }

    }

  } 
}else{ echo 'unwanted request.';}
} 

?>