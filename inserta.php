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
				echo "Inserting a new team to the AP: " . $_POST["tid"] . " " . $_POST["W"] . " " . $_POST["L"] . "..."; 
				$sql = 'INSERT INTO AP(tid, W, L) ';
				$sql = $sql . 'VALUES ("' . $_POST["tid"] . '","' . $_POST["W"] . '","' . $_POST["L"] .  '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New team added to the AP successfully";
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
