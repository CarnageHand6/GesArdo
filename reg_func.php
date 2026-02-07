<?php
$con = mysqli_connect("localhost", "root", "", "GesArdo");

if (isset($_POST['register'])) {
    $Username = mysqli_real_escape_string($con, $_POST['Username']);
    $Password = $_POST['Password'];
    $Age      = $_POST['Age'];
    $Sex      = $_POST['Sex'];
    $Subject  = $_POST['Subject'];
    $Address  = $_POST['Address'];

    $checkQuery = "SELECT * FROM UserAccount WHERE Username = '$Username'";
    $result = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Account has already been exist!');
        window.location='register.php';
        </script>";
    } else {
        $query = "INSERT INTO UserAccount (Username, Password, Age, Sex, Subject, Address) 
        VALUES ('$Username', '$Password', '$Age', '$Sex', '$Subject', '$Address')";
        
        if(mysqli_query($con, $query)) {
            echo "<script>alert('New Account Successfully Added!'); window.location='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>