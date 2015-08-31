# Game Documentation
The API located at [game/turn.php](game/turn.php) supports multiple different calls.
## API
All parameters are forwarded as HTTP GET variables.
Every Return-Object contains a code field. 200 denotes a successful request, every other value a failure. If the code is not 200 the Return-Object additionally contains a message field with a description of the error.
### action-Parameter
| Value  | Description  |
|---|---|
| [startGame](#startgame)  |  Starts a new game.  |
| [randomItem](#randomitem)  | Returns 3 random items.  |
| [selectItem](#selectitem)  | Selects an item and returns the updated stats. |
| [endGame](#endgame)  |   Ends the game and returns the winner & some data about them|
| [abortGame](#abortgame)  |  Aborts a game in progress |
| [getStats](#getstats)  |  Returns the current stats for an active game. |
| [highscore](#highscore)  |  Returns the highscore. |
| [isGameActive](#isgameactive)  |  Checks if a game is active. |

### startGame
#### Parameters
| Name  | Typ  | Description | example  |
|---|---|---| --- |
| name  | string  | Player Name | ninjaaa1337  |
| champId  | int  | Champion ID from the API | 1 (for Annie)  |

#### Return Value
##### Code: 200
See: [getStats](#getstats)

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

### randomItem
#### Parameters
No additional parameters.
#### Return Value
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
| turn  | int  | current turn |
| items  | array([item](#item))  | Array with selectable items |
##### Code: 105
**Message:** Game is not active.
**Cause:** No actave game found. Please start a game.
##### Code: 106
**Message:** Your last turn isn't over yet.
**Cause:** Select an item before requesting new items.
##### Code: 107
**Message:** Maximum number of turns already made
**Cause:** You already made all your turns. Please call [endGame](#endgame).
##### Code: 108
**Message:** Database failure.
**Cause:** Check your database.

### selectItem
#### Parameters
| Name  | Typ  | Description | example  |
|---|---|---| --- |
| itemNumber  | id  | number of one of the selectable items | 3058  |

#### Return Value
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
| lastSelectionMade  | boolean  | true if the last selection was made  |
|  opponent | [opponent](#opponent)  | Opponent-Object |
|  player | [player](#player)  | Player-Object  |
##### Code: 109
**Message:** No active game found.
**Cause:** No game was started yet. Please start one.

##### Code: 110
**Message:** You need to request new items first.
**Cause:** No items were requested for this turn.

##### Code: 135
**Message:** Game has already ended.
**Cause:** Game is finished already.

##### Code: 111
**Message:** You need to choose one of the proposed items.
**Cause:** The selected item was not proposed from [randomItem](#randomitem).
##### Code: 112
**Message:** Database failure.
**Cause:** Check your database.

### endGame
#### Parameters
No additional parameters.

#### Return Values
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
|  opponent | [opponent](#opponent)  | Opponent-Object |
|  player | [player](#player)  | Player-Object  |
| opponentScore  | int  | score achieved by the opponent |
| playerScore  | int  | score achieved by the opponent |
| playerWon  | boolean  | Did the human player win? |
| rank  | int  | highscore rank |
| numberOfPlayers  | int  | number of highscore entries |

##### Code: 114
**Message:** Game is not active
**Cause:** You can't end an inactive game.

##### Code: 115
**Message:** Last turn not yet made.
**Cause:** The required number of item selections was not done. Request (random Items)[#randomitem] or (select)[#selectitem] an item.

##### Code: 116
**Message:** Database failure.
**Cause:** Check your database.

### abortGame
#### Parameters
No additional parameters needed.

#### Return Value
##### Code: 200
No additional return values.
##### Code: 119
**Message:** Game already finished or no game found.
**Cause:** No game found. 
##### Code: 120
**Message:** Database failure
**Cause:** Check your database.

### getStats
#### Parameters
No additional parameters needed.
#### Return values
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
| version  | string  | Patch-Version  |
|  name | string  | Player Name  |
|  opponent | [opponent](#opponent)  | Opponent-Object |
|  player | [player](#player)  | Player-Object  |
|  selectableItems | array([item](#item))  | array of selectable items (**only** contained if the current game phase is selectItem)  |


##### Code: 121
**Message:** Game is not active.
**Cause:** The current game (if there's any) is not active. Try to start a new game.

### highscore
#### Parameters
| Name  | Typ  | Description | example  |
|---|---|---| --- |
| top  | boolean  | true if page should be used. false if the page of the last ended game should be opened | true  |
| page  | int  | page of the highscore (25 results per page) **(ignored if top == true)** | 2 for the second page.  |
#### Return Values
##### Code 200
If 0 games have been finished message is contained else the following keys.
| Name  | Type | Description  |
|---|---|---|
| message  | string  | "No highscores to show. Play one game or come back later." (**only** if 0 games have been finished)|
| page | int | current page |
| numberOfPages | int | number of pages |
| games | array([game](#game)) | Array containing the game info |

##### Code: 117
**Message:** Page has to be greater than 0.
**Cause:** Page lower than 0.

##### Code: 118
**Message:** Page number has to be lower than or equal to %d.
**Cause:** Page was higher than %d.

### isGameActive
#### Parameters
No additional parameters.
#### Return Values
##### Code: 200
| Name  | Type | Description  |
|---|---|---|
| active | boolean | true if a game is active |
| gameId | int | game id if active is true else **not** present |

