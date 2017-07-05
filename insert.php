<?php
// Create MySQL login values and

// set them to your login information.

$username = "root";

$password = "";

$host = "localhost";

$database = "imageprocessor";


// Make the connect to MySQL or die

// and display an error.

$link = mysqli_connect($host, $username, $password);

if (!$link) {

die('Could not connect: ' . mysqli_error());

}


// Select your database

mysqli_select_db ($link,$database);



// Make sure the user actually

// selected and uploaded a file

if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

// Temporary file name stored on the server

$tmpName = $_FILES['image']['tmp_name'];


// Read the file

$fp = fopen($tmpName, 'r');

$data = fread($fp, filesize($tmpName));

$data = addslashes($data);

fclose($fp);



// Create the query and insert

// into our database.

$query = "INSERT INTO tbl_images ";

$query .= "(image) VALUES ('$data')";

$results = mysqli_query($link,$query);


// Print results

echo "Thank you, your file has been uploaded.";


}

else {

echo "No image selected/uploaded";

}


// Close our MySQL Link

mysqli_close($link);

?>
