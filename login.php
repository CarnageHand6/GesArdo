<html>
<head>
    <title>Login Account</title>
    <style>
        body {
            background-image: url('hackbg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 97vh;
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
            margin-left: 80px;

        }
        .login-container {
            color: #39FF14;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            padding: 30px;
            width: 380px;
            margin-bottom: 60px;
            background-color: rgba(0, 0, 0, 0.9);
            border: 2px solid #ff0000;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(255,0,0,0.6);	
        }
        input[type="text"], input[type="password"] {
            background: #111;
            border: 1px solid #ff0000;
            color: #39FF14;
        }
        .terminal-title{
            text-align: center;
            color:#ff0000;
            font-family: 'Courier New' Courier, monospace;
            font-size: 1.4em;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="terminal-title">USER AUTHENTICATION<span class="cursor"></h2>           
    <form action="login_func.php" method="POST" style="line-height: 2em; text-align: center;">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        
        <input type="submit" name="login_btn" style="background-color: darkred;
         color: whitesmoke;
         " value="LOGIN"><br>
         <a href="register.php" style="color: darkred;
         text-decoration: none;">[ Create new account ]</a>
    </form>
	</div>
</body>
</html>