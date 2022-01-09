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
				echo "Updating a payer's stats: " . $_POST["pid"] . " " . $_POST["games"] . " " . $_POST["minutes"] . " " . $_POST["points"] . " " . $_POST["rebounds"] . " " . $_POST["assists"] . "..."; 
				$sql = 'UPDATE players ';
				$sql = $sql . 'SET games = "' . $_POST["games"] . '", minutes = "' . $_POST["minutes"] . '", points = "' . $_POST["points"] . '", rebounds = "' . $_POST["rebounds"] . '", assists = "' . $_POST["assists"] . '" WHERE pid = "' . $_POST["pid"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$conn->beginTransaction();

					$conn->exec($sql);

					echo "Player's stats updated succesffuly";
					$conn->commit();
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
				$conn->rollback();
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>
