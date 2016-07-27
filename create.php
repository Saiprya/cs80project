<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// Create database
	$sql = "CREATE DATABASE testdb";
	if ($conn->query($sql) === TRUE) {
		echo "Database created successfully <br>";
	} else {
		echo "Error creating database: " . $conn->error;
	}

	$conn->close();

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// sql to create table
	$sql = "CREATE TABLE employee (
	id INT(11) AUTO_INCREMENT PRIMARY KEY, 
	FirstName VARCHAR(11) NOT NULL,
	LastName VARCHAR(11) NOT NULL,
	Hours INT(11) NOT NULL,
	HourlyPay INT(11) NOT NULL
	)";

	if ($conn->query($sql) === TRUE) {
		echo "Table employeee created successfully <br>";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('John', 'Doe', '13', '20')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Jane', 'Doe', '15', '22')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Tom', 'Riddle', '12', '17')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Tom', 'Cruise', '13', '19')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Harry', 'Potter', '19', '27')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Prince', 'Harry', '23', '11')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Evelyn', 'Pepper', '32', '21')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "INSERT INTO employee (FirstName, Lastname, Hours, HourlyPay)
	VALUES ('Harry', 'Jr.', '19', '14')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully <br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo "Complete!";

	$conn->close();
?>