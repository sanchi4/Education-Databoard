<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "upload/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {

      header("Location: lecture_details.html"); 
echo "<script type='javascript'>alert('File Uploaded')</script>";
      

    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>