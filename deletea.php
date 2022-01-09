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
				echo "Deleting record: " . $_POST["rank"] . "..."; 
				$sql = 'DELETE FROM AP WHERE rank = "' . $_POST["rank"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "team deleted successfully";
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
