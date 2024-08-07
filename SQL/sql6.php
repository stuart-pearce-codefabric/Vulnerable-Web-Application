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
	$servername = getenv('DB_SERVERNAME');
	$username = getenv('DB_USERNAME');
	$password = getenv('DB_PASSWORD');
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
		$stmt = $conn->prepare("SELECT bookname,authorname FROM books WHERE number=?");
		$stmt->bind_param("i", $number);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->num_rows;
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
