<head>
	<title>Main</title>
</head>
<style>
	body {
		background-image: url('https://media0.giphy.com/media/	v1.Y2lkPTc5MGI3NjExb3JhYzc1YWhrbmtwZjRhbGVyOGM1aDdlMHlyMHEwbGFmZHk0eXdteiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/f74WQIhbzBKAusL2v1/giphy.gif');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		color: #39FF14;
		font-family: 'Courier New', Courier, monospace;
		margin: 0;
		padding: 20px;
		height: 97vh;
		margin: 0;
	}
	a {
		text-decoration: none;
	}
	.container {
		display: flex;
		justify-content: space-between;
		color: #39FF14;
		font-family: 'Consolas',Courier, monospace;
		font-weight: bold;
		padding: 5px;
		width: 1170px;
		padding: 10px;
		margin-bottom: 60px;
	}
	.hacker-btn{
		color:#ff0000;

	}
	table {
		background-color: rgba(0, 0, 0, 0.85);
		border: 2px solid #ff0000;
		box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
		width: 90%;
		margin-top: 20px;
		color: #39FF14;
	}
	th {
		color: #ff0000;
		border-bottom: 2px solid #ff0000;
		padding: 12px;
		text-transform: uppercase;
		letter-spacing: 2px;
	}
	td {
		border: 1px solid rgba(255, 0, 0, 0.3);
		padding: 10px;
		text-align: center;
	}
	.return-link{
		color: #ff0000;
		text-decoration: none;
		font-weight: bold;
		font-size: 1.2em;
	}
	.return-link:hover {
		text-shadow: 0 0 10px #ff0000;
	}
	tr:hover {
		background-color: rgba(255, 0, 0, 0.1);
	}
</style>
<body>
	<center>
		<table border="1" width="80%" style="border-collapse:collapse; overflow: auto;">
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th >Age</th>
				<th>Sex</th>
				<th>Subject</th>
				<th>Address</th>
				<th colspan="2" title="Update and Delete"></th>
			</tr>
			<?php
			$con = mysqli_connect("localhost", "root", "", "GesArdo");
			$result = mysqli_query($con, "SELECT * FROM UserAccount ORDER BY Username ASC");
			while($row = mysqli_fetch_array($result)) {
				$user_id = urlencode($row['Username']);
				echo "
				<tr>
				<td>{$row['Username']}</td>
				<td>{$row['Password']}</td>
				<td>{$row['Age']}</td>
				<td>{$row['Sex']}</td>
				<td>{$row['Subject']}</td>
				<td>{$row['Address']}</td>
				<td style='text-align:center;'>
				<a href='update.php?username={$row['Username']}' style='text-decoration:none;'>✏️</a>
				</td>
				<td style='text-align:center;'>
				<a href='delete.php?username={$row['Username']}' style='text-decoration:none;' onclick='return confirm(\"Are you sure?\")'>🗑️</a>
				</td>
				</tr>";
			}
			?>
		</table>
	</center>
</body>