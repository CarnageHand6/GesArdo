<head>
    <title>Register Account</title>
    <style>

    	body{
    		background-image:url('regibg.jpg');
    		background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 97vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 80px;
        }
        .register-container {
            color: #39FF14;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            padding: 5px;
            width: 380px;
            margin-bottom: 60px;
            background-color: rgba(0, 0, 0, 0.9);
            border: 2px solid #ff0000;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(255,0,0,0.6);
        }
        input[type="text"], input[type="password"],input[type="number"],select,textarea {
            background: #111;
            border: 1px solid #ff0000;
            color: #39FF14;
            margin-bottom: 15px;
        }
        a{	
        	color: darkred;
        	text-decoration: none;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1em;
            padding: 9px;
        }
    </style>

</head>
<body>
	<div class = "register-container">
        <form action="reg_func.php" method="POST" style="line-height: 2em; text-align: center;">
            Username: <input type="text" name="Username" required><br>
            Password: <input type="password" name="Password" required><br>
            Age: <input type="number" name="Age" required><br>
            
            Sex:  <input type="radio" name="Sex" value="Male" id="Male" required><label for="Male">Male</label>
            <input type="radio" name="Sex" value="Female" id="Female" required><label for="Female">Female</label><br>

            Subject:<select name="Subject">
                <option value="ADBMS">ADBMS</option>
                <option value="WebDev">WebDev</option>
            </select><br>

            Address:<br>
            <textarea rows="3" name="Address" placeholder="(optional)"></textarea><br>
            
            <input type="checkbox" required> I confirm the information is accurate.<br>
            <input type="submit" name="register" style = "background-color:darkred; color:whitesmoke;" value="CREATE ACCOUNT" <br><br>

            <a href="login.php">[ Return to Login ]</a>
        </form>
    </body>