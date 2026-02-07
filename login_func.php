<?php
$con = mysqli_connect("localhost", "root", "", "GesArdo");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login_btn'])) {
    $Username = mysqli_real_escape_string($con, $_POST['username']); 
    $Password = $_POST['password'];

    $query = "SELECT * FROM UserAccount WHERE Username = '$Username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['Password'] == $Password) {
            echo "<script>
            alert('Access Granted!');
            window.location='home.html'; 
            </script>";
        } else {
            echo "<script>
            alert('Password mismatch. Sequence terminated!');
            window.location='login.php'; 
            </script>";
        }
    } else {
        echo "<script>
        alert('Username unrecognized!');
        window.location='login.php'; 
        </script>";
    }
}
?>