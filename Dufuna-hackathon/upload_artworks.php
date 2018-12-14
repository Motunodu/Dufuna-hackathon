<?php
$artname = $_POST['artname'];
$picture = $_POST['picture'];
$description = $_POST['description'];
$sellerpicture = $_POST['sellerpicture'];

saveToDatabase($artname, $picture, $description, $sellerpicture);
header('Location:upload_artworks.html');


function saveToDatabase($artname, $picture, $description, $sellerpicture){
$serverName = "localhost";
$database = "hackathon";
$username = "root";
$pass_word = "";
//Open database connection
$conn = mysqli_connect($serverName, $username, $pass_word, $database);
// Check that connection exists
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO seller_login (artname, picture, description, sellerpicture, created_at)
VALUES ('$artname', '$picture', $description, $sellerpicture, now())";
$result = mysqli_query($conn, $sql);
//Check for errors
if (!$result) {
die("Error: " . $sql . "<br>" . mysqli_error($conn));
}
//Close the connection
mysqli_close($conn);
}


?>