<?php
$con = mysqli_connect("localhost", "root", "", "GesArdo");

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "DELETE FROM UserAccount WHERE Username = '$username'";
    
    if(mysqli_query($con, $query)) {
        header("Location: main.php"); 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No record specified.";
}
?>