ajax = new AjaxRequests();
helper = new Helper();
view = new View();

function Game() {}

Game.prototype.displayError = function(data) {
		if (data['code'] != 200) {
			helper.setErrorMessage(data['message']);
			view.displayError();
		}
		return data['code'] != 200;
}

Game.prototype.startGame = function() {
	var that = this;
	name = $("#name").val();
	champ = $("#champion").val();
	ajax.startGame(name, champ, function(data) {
			if (!that.displayError(data)) {
			helper.initGame(data);
			that.requestRandomItems();
			view.showView(["matchView", "selectableItems"]);
			}
	});
}

Game.prototype.requestRandomItems = function() {
	var that = this;
	ajax.getRandomItems(function(data) {
			if (!that.displayError(data)) {
				helper.setTurn(data['turn']);
				for (var i = 0; i < 3; i++){
					helper.setItem(response['items'][i], "item" + (i+1), true);
				}
			}
	});
}

Game.prototype.selectItem = function(id) {
	var that = this;
		ajax.selectItem(id, function(data) {
				if (!that.displayError(data)) {
					helper.updateStatistics(data['player'], "", data['opponent'], false);
					if (data['lastSelectionMade']) {
						that.endGame();
					} else {
						that.requestRandomItems();
					}
				}
		});
}

Game.prototype.endGame = function() {
	var that = this;
		ajax.endGame(function(data) {
				if(!that.displayError(data)) {
					$("#playerEndscore").text(Math.round(response['playerScore']));
					$("#opponentEndscore").text(Math.round(response['opponentScore']));	
					var image = data['playerWon'] ? "winImage" : "loseImage";
					view.showView(["matchView", "winGameView", image]);
				}
		});
}

Game.prototype.abortGame = function() {
	var that = this;
		ajax.abortGame(function(data) {
				if (!that.displayError(data)) {
						view.showView(["startGameView"]);
				}
		});
}

Game.prototype.continueGame = function() {
		var that = this;
		ajax.getStats(function(data) {
			if (!that.displayError(data)) {
					helper.initGame(data);
					if (data['currentPhase'] == "requestItem") {
						that.requestRandomItems();		
					} else if (data['currentPhase'] == "ended") {
						that.endGame();
					}
					view.showView(["matchView", "selectableItems"]); 
			}
		});
}

Game.prototype.checkActiveGame = function() {
		var that = this;
		ajax.checkActiveGame(function(data) {
				if(!that.displayError(data)) {
						if (data['active']) {
							// get Stats and update them and then show the view
							ajax.getStats(function(data) {
								console.log(data);
								helper.updateStatistics(data['player'], data['name'], data['opponent'], true);	
								view.showView(["continueView"]);
							});
						} else {
							view.showView(["startGameView"]);
						}
				}
		});
}

Game.prototype.showHighscore = function(top, page) {
	var that = this;
	ajax.getHighscore(top, page, function(data) {
			if ("message" in data) { // No highscores yet
				data['code'] = 118;
			}
			if (!that.displayError(data)) {
				helper.generateHighscoreTable(data['games']);
				helper.generateHighscorePagination(data['page'], data['numberOfPages']);
				view.showView(["highscoreView"]);
			}
	});
}

// Convenience method
Game.prototype.tryAgain = function() {
	this.checkActiveGame();
}

game = new Game();
