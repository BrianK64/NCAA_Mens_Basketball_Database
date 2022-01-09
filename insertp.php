<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'username';
$password = 'password';
$host = 'localhost';
$dbname = 'dbname';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>NCAAB Database</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Inserting new player stats: " . $_POST["pid"] . " " . $_POST["name"] . " " . $_POST["tid"] . " " . $_POST["position"] . " " . $_POST["height"] . " " . $_POST["weight"] . " " . $_POST["games"] . " " . $_POST["minutes"] . " " . $_POST["points"] . " " . $_POST["rebounds"] . " " . $_POST["assists"] . "..."; 
				$sql = 'INSERT INTO players(pid, name, tid, position, height, weight, games, minutes, points, rebounds, assists) ';
				$sql = $sql . 'VALUES ("'.$_POST["pid"] . '","' . $_POST["name"] . '","' . $_POST["tid"] . '","' . $_POST["position"] . '","' . $_POST["height"] . '","' . $_POST["weight"] . '","' . $_POST["games"] . '","' . $_POST["minutes"] . '","' . $_POST["points"] . '","' . $_POST["rebounds"] . '","' . $_POST["assists"] .  '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New player stats created successfully";
			?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='start.php'
					}, 3000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>
