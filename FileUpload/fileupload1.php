<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='fileupl.html';">Main Page</button>
</div>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
   <br>
    <b>Select image : </b> 
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Allow only certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
?>
</body>
</html>
