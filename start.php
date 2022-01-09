<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'username';
$password = 'password';
$host = 'localhost';
$dbname = 'dbname';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql1 = 'SELECT gid, home, away, date, home_points, home_rebounds, home_assists, away_points, away_rebounds, away_assists FROM game';
    $sql2 = 'SELECT pid, name, tid, position, height, weight, games, minutes, points, rebounds, assists FROM players';
    $sql3 = 'SELECT rank, tid, W, L FROM AP ORDER BY W desc, L asc';
    $sql4 = 'SELECT team, rank, conference, coach, stadium, date, PPG, RPG, APG FROM team T, AP, coach C, stadium S, game G, team_stat M WHERE T.tid = AP.tid and T.cid = C.cid and T.sid = S.sid and T.tid = M.tid and T.tid = G.home';
    $q1 = $pdo->query($sql1);
    $q2 = $pdo->query($sql2);
    $q3 = $pdo->query($sql3);
    $q4 = $pdo->query($sql4);
    $q1->setFetchMode(PDO::FETCH_ASSOC);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $q3->setFetchMode(PDO::FETCH_ASSOC);
    $q4->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NCAAB Database</title>
    </head>
    <body>
        <div id="container">
            <h2>NCAA Basketball Game Results</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Game ID</th>
                        <th>Home Team ID</th>
                        <th>Away Team ID</th>
                        <th>Date</th>
                        <th>Home Points</th>
                        <th>Home Rebounds</th>
                        <th>Home Assists</th>
                        <th>Away Points</th>
                        <th>Away Rebounds</th>
                        <th>Away Assists</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q1->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['gid']) ?></td>
                            <td><?php echo htmlspecialchars($row['home']); ?></td>
                            <td><?php echo htmlspecialchars($row['away']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['home_points']); ?></td>
                            <td><?php echo htmlspecialchars($row['home_rebounds']); ?></td>
                            <td><?php echo htmlspecialchars($row['home_assists']); ?></td>
                            <td><?php echo htmlspecialchars($row['away_points']); ?></td>
                            <td><?php echo htmlspecialchars($row['away_rebounds']); ?></td>
                            <td><?php echo htmlspecialchars($row['away_assists']); ?></td>
                            <td><?php echo '<form action="/deleteg.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="gid" value="' . htmlspecialchars($row['gid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
             </table>
		<br><h2>Insert a new game result:</h2>
		<form action="/insertg.php" method="post">
			<table>
                <tr><td>Home Team ID:</td><td><input type="text" id="home" name="home" value="?"></td></tr>
                <tr><td>Away Team ID:</td><td><input type="text" id="away" name="away" value="?"></td></tr>
                <tr><td>Date:</td><td><input type="text" id="date" name="date" value="?"></td></tr>
                <tr><td>Home Points:</td><td><input type="number" id="home_points" name="home_points" value="?"></td></tr>
                <tr><td>Home Rebounds:</td><td><input type="number" id="home_rebounds" name="home_rebounds" value="?"></td></tr>
                <tr><td>Home Assists:</td><td><input type="number" id="home_assists" name="home_assists" value="?"></td></tr>
                <tr><td>Away Points:</td><td><input type="number" id="away_points" name="away_points" value="?"></td></tr>
                <tr><td>Away Rebounds:</td><td><input type="number" id="away_rebounds" name="away_rebounds" value="?"></td></tr>
                <tr><td>Away Assists:</td><td><input type="number" id="away_assists" name="away_assists" value="?"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>
		<br>
		<br><br><br>

        <div id="container">
            <h2>List of Player's Stats</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Player ID</th>
                        <th>Name</th>
                        <th>Team ID</th>
                        <th>Position</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Games</th>
                        <th>Minutes</th>
                        <th>Points</th>
                        <th>Rebounds</th>
                        <th>Assists</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q2->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['pid']) ?></td>
                            <td><?php echo htmlspecialchars($row['name']) ?></td>
                            <td><?php echo htmlspecialchars($row['tid']); ?></td>
                            <td><?php echo htmlspecialchars($row['position']); ?></td>
                            <td><?php echo htmlspecialchars($row['height']); ?></td>
                            <td><?php echo htmlspecialchars($row['weight']); ?></td>
                            <td><?php echo htmlspecialchars($row['games']); ?></td>
                            <td><?php echo htmlspecialchars($row['minutes']); ?></td>
                            <td><?php echo htmlspecialchars($row['points']); ?></td>
                            <td><?php echo htmlspecialchars($row['rebounds']); ?></td>
                            <td><?php echo htmlspecialchars($row['assists']); ?></td>
                            <td><?php echo '<form action="/deletep.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="pid" value="' . htmlspecialchars($row['pid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><h2>Insert a new player:</h2>
		<form action="/insertp.php" method="post">
			<table>
                <tr><td>Player ID:</td><td><input type="text" id="pid" name="pid" value="?"></td></tr>
                <tr><td>Name:</td><td><input type="text" id="name" name="name" value="?"></td></tr>
                <tr><td>Team ID:</td><td><input type="text" id="tid" name="tid" value="?"></td></tr>
                <tr><td>Position:</td><td><input type="text" id="position" name="position" value="?"></td></tr>
                <tr><td>Height:</td><td><input type="text" id="height" name="height" value="?"></td></tr>
                <tr><td>Weight:</td><td><input type="number" id="weight" name="weight" value="?"></td></tr>
                <tr><td>Games:</td><td><input type="number" id="games" name="games" value="?"></td></tr>
                <tr><td>Minutes:</td><td><input type="number" id="minutes" name="minutes" value="?"></td></tr>
                <tr><td>Points:</td><td><input type="number" id="points" name="points" value="?"></td></tr>
                <tr><td>Rebounds:</td><td><input type="number" id="rebounds" name="rebounds" value="?"></td></tr>
                <tr><td>Assists:</td><td><input type="number" id="assists" name="assists" value="?"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>
        <br><h2>Update player's stats:</h2>
		<form action="/updatep.php" method="post">
			<table>
                <tr><td>Player ID:</td><td><input type="text" id="pid" name="pid" value="?"></td></tr>
                <tr><td>Games:</td><td><input type="number" id="games" name="games" value="?"></td></tr>
                <tr><td>Minutes:</td><td><input type="number" id="minutes" name="minutes" value="?"></td></tr>
                <tr><td>Points:</td><td><input type="number" id="points" name="points" value="?"></td></tr>
                <tr><td>Rebounds:</td><td><input type="number" id="rebounds" name="rebounds" value="?"></td></tr>
                <tr><td>Assists:</td><td><input type="number" id="assists" name="assists" value="?"></td></tr>
			</table>
			<input type="submit" value="UPDATE">
		</form>
		<br>
		<br><br><br>

        <div id="container">
            <h2>AP Rankings</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Team ID</th>
                        <th>Wins</th>
                        <th>Losses</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q3->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['rank']) ?></td>
                            <td><?php echo htmlspecialchars($row['tid']) ?></td>
                            <td><?php echo htmlspecialchars($row['W']); ?></td>
                            <td><?php echo htmlspecialchars($row['L']); ?></td>
                            <td><?php echo '<form action="/deletea.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="rank" value="' . htmlspecialchars($row['rank']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><h2>Insert a new team to the AP Rankings:</h2>
		<form action="/inserta.php" method="post">
			<table>
                <tr><td>Team ID:</td><td><input type="text" id="tid" name="tid" value="?"></td></tr>
                <tr><td>Wins:</td><td><input type="number" id="W" name="W" value="?"></td></tr>
                <tr><td>Losses:</td><td><input type="number" id="L" name="L" value="?"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>
        <br><h2>Update AP rankings:</h2>
		<form action="/updatea.php" method="post">
			<table>
                <tr><td>Team ID:</td><td><input type="text" id="tid" name="tid" value="?"></td></tr>
                <tr><td>Wins:</td><td><input type="number" id="W" name="W" value="?"></td></tr>
                <tr><td>Losses:</td><td><input type="number" id="L" name="L" value="?"></td></tr>
			</table>
			<input type="submit" value="UPDATE">
		</form>
		<br>
		<br><br><br>

        <div id="container">
            <h2>Team Summary</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>Rank</th>
                        <th>Conference</th>
                        <th>Head Coach</th>
                        <th>Stadium</th>
                        <th>Most Recent Home Game</th>
                        <th>PPG</th>
                        <th>RPG</th>
                        <th>APG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q4->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['team']) ?></td>
                            <td><?php echo htmlspecialchars($row['rank']) ?></td>
                            <td><?php echo htmlspecialchars($row['conference']); ?></td>
                            <td><?php echo htmlspecialchars($row['coach']); ?></td>
                            <td><?php echo htmlspecialchars($row['stadium']) ?></td>
                            <td><?php echo htmlspecialchars($row['date']) ?></td>
                            <td><?php echo htmlspecialchars($row['PPG']) ?></td>
                            <td><?php echo htmlspecialchars($row['RPG']) ?></td>
                            <td><?php echo htmlspecialchars($row['APG']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><br><br>
    </body>
</div>
</html>
