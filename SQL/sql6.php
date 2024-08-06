<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection</title>
</head>
<body>

	 <div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';">Main Page</button>
    </div>
    <div align="center">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get" >
		<p>Give me book's number and I give you...</p>
		Book's number : <input type="text" name="number">
		<input type="submit" name="submit" value="Submit">
	</form>
	</div>
	<!--Admin password is in the secret table. I hope, anyone doesn't see it.-->
<?php
	$servername = getenv('DB_HOST');
	$username = getenv('DB_USER');
	$password = getenv('DB_PASS');
	$db = getenv('DB_NAME');
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//echo "Connected successfully";
	$source = "";
	if(isset($_GET["submit"])){
		$number = $_GET['number'];
		$query = "SELECT bookname,authorname FROM books WHERE number = ?";
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "i", $number);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = @mysqli_num_rows($result);
		echo "<hr>";
		if($row > 0){
			echo "<pre>There is a book with this index.</pre>";
		}else{
			echo "Not found!";
		}
	}

?> 
</body>
</html>
