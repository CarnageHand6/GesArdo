<?php
$con = mysqli_connect("localhost", "root", "", "GesArdo");

if (isset($_GET['username'])) {
    $user_id = $_GET['username'];
    $result = mysqli_query($con, "SELECT * FROM UserAccount WHERE Username = '$user_id'");
    $row = mysqli_fetch_array($result);

    if (!$row) {
        die("User not found in database.");
    }
} else if (!isset($_POST['btnUpdate'])) {
    header("Location: main.php");
    exit();
}

if (isset($_POST['btnUpdate'])) {
    $old_user = $_POST['old_username'];
    $username = mysqli_real_escape_string($con, $_POST['txtUser']);
    $password = $_POST['txtPass'];
    $age      = $_POST['txtAge'];
    $sex      = $_POST['txtSex'];
    $subject  = $_POST['txtSubj'];
    $address  = $_POST['txtAdd'];

    $checkQuery = "SELECT * FROM UserAccount WHERE Username = '$username' AND Username != '$old_user'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Account already exists! Please choose a different username.'); window.history.back();</script>";
    } else {
        $updateQuery = "UPDATE UserAccount SET 
                        Username='$username', 
                        Password='$password', 
                        Age='$age', 
                        Sex='$sex', 
                        Subject='$subject', 
                        Address='$address' 
                        WHERE Username='$old_user'";

        if (mysqli_query($con, $updateQuery)) {
            echo "<script>alert('Account Updated Successfully!'); window.location='main.php';</script>";
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}
?>

<html>
<head>
    <title>Update Account</title>
    <style>
        body{
            background-image: url(hackupd.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            color: #00FFFF;
            text-shadow: -1px -1px 0 #000,  
                          1px -1px 0 #000,
                         -1px  1px 0 #000,
                          1px  1px 0 #000,
                          0 0 10px #000;;
            
            border-radius: 50px;
            display:flex;
            justify-content: center;
            align-items: center;
            height: 100 vh;

        }
        h2, td, label{
            color: #00FFFF;
            font-weight: bold;
            font-family:'Courier New', monospace;
            text-shadow: 2px 2px 4px #000;
        }
        textarea, input[type="text"], input[type="number"], select{
            background: #000;
            border:1px solid #00ffff;
            color:#00ffff;
            padding: 5px;
            width: 100%;
            box-sizing:border-box;
        }
        .update-container{
            background-color: rgba(0, 0, 0, 0.3);
            color: #00FFFF;
            padding: 30px;
            border: 3px solid #00FFFF;
            border-radius: 40px;
            width: 330px;
            box-shadow: 0 0 20px #00FFFF, inset 0 0 10px #00ffff;
        }
        input[type="submit"]{
            background-color: transparent;
            border:2px solid #00ffff;
            color:#00ffff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 0 10px #00FFFF;
        }
        input[type="submit"]:hover {
        background-color: #00FFFF;
        color: #000; 
}
a{
    color:darkred;
    font-family: 'Consolas', Courier, monospace;
}


    </style>
</head>
<body style="font-family: sans-serif;">
    <div class = "update-container">
    <center>
        <h2>Update User Account</h2>
        <form method="POST" action="">
            <input type="hidden" name="old_username" value="<?php echo htmlspecialchars($row['Username']); ?>">

            <table border="0" cellpadding="5">
                <tr><td>Username:</td> <td><input type="text" name="txtUser" value="<?php echo $row['Username']; ?>"></td></tr>
                <tr><td>Password:</td> <td><input type="text" name="txtPass" value="<?php echo $row['Password']; ?>"></td></tr>
                <tr><td>Age:</td>      <td><input type="number" name="txtAge" value="<?php echo $row['Age']; ?>"></td></tr>
                <tr><td>Sex:</td>      <td>
                    <select name="txtSex">
                        <option value="Male" <?php if($row['Sex']=="Male") echo "selected"; ?>>Male</option>
                        <option value="Female" <?php if($row['Sex']=="Female") echo "selected"; ?>>Female</option>
                    </select>
                    </td></tr> 
                <tr><td>Subject:</td>      <td>
                    <select name="txtSubj">
                        <option value="ADBMS" <?php if($row['Subject']=="ADBMS") echo "selected"; ?>>ADBMS</option>
                        <option value="WebDev" <?php if($row['Subject']=="WebDev") echo "selected"; ?>>WebDev</option>
                    </select>
                    </td></tr>
                <tr><td>Address:</td>    <td><input type="text" name="txtAdd" value="<?php echo $row['Address']; ?>"></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <br>
                        <input type="submit" name="btnUpdate" value="Save Changes" style="padding: 5px 15px; cursor:pointer;">
                        <a href="Userlist.php" style="margin-left:10px;text-decoration: none;">[ Cancel ]</a>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>