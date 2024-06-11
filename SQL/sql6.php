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
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";
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
		// Sanitize and validate input
		$number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
		if (!filter_var($number, FILTER_VALIDATE_INT) === false) {
			// Prepare statement
			$stmt = $conn->prepare("SELECT bookname,authorname FROM books WHERE number = ?");
			$stmt->bind_param("i", $number);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<hr>";
				    echo $row['bookname']." ----> ".$row['authorname'];    
				}
			} else {
				echo "0 result";
			}
			$stmt->close();
		} else {
			echo "Invalid input";
		}
	}

?> 
</body>
</html>
