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
				echo "Inserting a new game result: " . $_POST["home"] . " " . $_POST["away"] . " " . $_POST["date"] . " " . $_POST["home_points"] . " " . $_POST["home_rebounds"] . " " . $_POST["home_assists"] . " " . $_POST["away_points"] . " " . $_POST["away_rebounds"] . " " . $_POST["away_assists"] . "..."; 
				$sql = 'INSERT INTO game(home, away, date, home_points, home_rebounds, home_assists, away_points, away_rebounds, away_assists) ';
				$sql = $sql . 'VALUES ("'.$_POST["home"] . '","' . $_POST["away"] . '","' . $_POST["date"] . '","' . $_POST["home_points"] . '","' . $_POST["home_rebounds"] . '","' . $_POST["home_assists"] . '","' . $_POST["away_points"] . '","' . $_POST["away_rebounds"] . '","' . $_POST["away_assists"] . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New game record created successfully";
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
