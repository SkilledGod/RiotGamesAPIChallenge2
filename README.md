# AP Arena
## General Information
This project is an entry for the [Riot Games API Challenge 2](https://developer.riotgames.com/discussion/announcements/show/2lxEyIcE).

You can find a demo at http://leagueoflegendssarabic.com/aparena/

The project provides statistics (pickrate and winrate in ranked and normal games) from patch 5.11 and 5.14. Additionally it contains a small mini-game where you play against a champion - either from patch 5.11 or 5.14.

The game is played with items on patch 5.14.The game chooses one match and one champ which was playing mid lane in that match. This is your opponent. The opponent has a hidden score (shown at the end) depending on his stats. Your goal is to reach a higher score than your opponent by choosing the optimal items each turn. In each turn you will select 1 of 3 proposed items which goes in your inventory. Every item will be proposed at maximum 1 time - so be careful which items you select and which you don't. You'll choose as many items as your opponent has (so if he has 5 items --> you choose 5 times out of 3 "fresh" proposed items). Your score (and your opponents score) is calculated by multiplying each of your stats with a certain factor (for the exact factors look into the statToPointMap-Table in [sql-file](sql/riotchallenger2.sql)).

## Requirements
Webserver with
- PHP 5.6.12
- MySQL 5.6.12

## Setup
- Configure [db.php](db.php) with the username, password, database for your installation
 - Create the database with the [sql-file](sql/riotchallenger2.sql)
 - [OPTIONAL] Put matches from the match data endpoint into the [matches-folder](matches/) (100 sample matches are included)
 - Open the [index.php](index.php) in your browser

## System notes
- The game itself is a RESTful webservice. For a documentation of the available calls click [here](documentation/game.md).
- The UI of the game is updated by JavaScript AJAX-Requests to the service.
