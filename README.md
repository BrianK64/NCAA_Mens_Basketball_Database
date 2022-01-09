# NCAA_Mens_Basketball_Database

The purpose of our project is to record and obtain relevant statistics and 
information regarding all of NCAA Men’s Basketball. Any affiliated NCAA worker who is
documenting information and statistics for NCAA Men’s Basketball. Any fan or curious
individual will also be able to check the database for relevant information regarding
NCAA Men’s Basketball. The project will mainly be used from the perspective of an NCAA
worker to record information for the NCAA website. From here they will be able to update
the relevant statistics from every men’s basketball team and game in the NCAA. They will
be providing this service to any and all users of their website to help the user learn more
about college men’s basketball.

The tables we are using in our project describe the relevant information about each
team, player, and game within NCAA men’s basketball. Although we will not be recording
every possible statistic like the NCAA currently does, we have provided the necessary
information that a casual fan would enjoy. We also include information that the NCAA
website does not include, like extra details about the players’ academics and more
information on the various stadiums within the NCAA. This project will be able to support
the tens of thousands of NCAA basketball games that occur every year and the assorted
number of athletes who go through these collegiate programs. Since there are so many
different players who are constantly changing in and out of these teams, it makes sense
for our program to support the addition and removal of individual players whenever it is
necessary. For some of our tables, it will not be necessary to remove the data after it is
entered. For example, once a basketball game ends, the information and statistics from
that game will never need to be edited once it has been imputed into the system. Other
tables like the AP Poll table will have to use sorting techniques to establish which teams
are ranked higher than others based on their records.

csv files:
	team.csv	: team data
	players.csv	: player data
	academics.csv	: players' academic data
	team_stat.csv	: team statistics
	coach.csv	: coach data
	stadium.csv	: stadium data

start.php: php main page
inserta.php: php interface for inserting data into AP table
deletea.php: php for deleting data from AP table
updatea.php: php for updating data in AP table
insertp.php: php for inseting players data into players table
deletep.php: deleting players data from players table
updatep.php: updating players statistics in players table
insertg.php: insert game results into game table
deleteg.php: delete game results from game table

project.log: SQL scripts for creating table and inserting data from csv files, 
	and outputs of describe functions on each table.

NCAAB.xlsx: database

source of data: ESPN NCAA basketball page
	mostly from https://www.espn.com/mens-college-basketball/


