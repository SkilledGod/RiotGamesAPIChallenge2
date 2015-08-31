# Game Documentation
The API is located at [turn.php](game/turn.php) supports multiple different calls.
## API
All parameters are forwarded as HTTP GET variables.
Every Return-Object contains a code field. 200 denotes a successful request, every other value a failure. If the code is not 200 the Return-Object additionally contains a message field with a description of the error.
### action-Parameter
| Value  | Description  |
|---|---|
| [startGame](#startGame)  |  Starts a new game.  |
| randomItem  | Returns 3 random items.  |
| selectItem  | Selects an item and returns the updated stats. |
| endGame  |   Ends the game and returns the winner & some data about them|
| abortGame  |  Aborts a game in progress |
| getStats  |  Returns the current stats for an active game. |
| highscore  |  Returns the highscore. |
| isGameActive  |  Checks if a game is active. |

### startGame
#### Parameters
| Name  | Typ  | Description | example  |
|---|---|---| --- |
| name  | string  | Player Name | ninjaaa1337  |
| champId  | int  | Champion ID from the API | 1 (for Annie)  |

#### Return Value
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
| version  | string  | Patch-Version  |
|  name | string  | Player Name  |
|  opponent | [opponent](#opponent)  | Opponent-Object |
|  player | [player](#player)  | Player-Object  |

##### Code: 101
**Message:** A game was already started but not yet finished.
**Cause:** Check [isGameActive](#isGameActive) if there's a game in progress (maybe checkout [abortGame](#abortGame) aswell).
##### Code: 122
**Message:** Please select a valid name.
**Cause:** Try to submit a name which is not the empty string.
##### Code: 102
**Message:** Please choose a valid champion.
**Cause:** The champion id is not valid. Check the Riot Games API for the correct id.
##### Code: 103
**Message:** No champion could be choosen as an opponent.
**Cause:** Try to put more matches into the matches folder.
##### Code: 104
**Message:** Database failure.
