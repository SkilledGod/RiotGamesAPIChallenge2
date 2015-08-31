if (typeof getAbsolutePath != 'function') {
	console.log("Please include the absolutePath.js");
}

function AjaxRequests() {}
AjaxRequests.prototype.rootDir = getAbsolutePath("AjaxRequests.js");
// RequestUrl is relative to the root of the project
AjaxRequests.prototype.sendRequest = function(requestUrl, handleFunction) {
		console.log("sending request");
		console.log(requestUrl);
		$.ajax({
				url: this.rootDir + "../../" + requestUrl + "&t=" + Math.random(),
				success: function(result) {
					console.log(result);
					response = JSON.parse(result);
					console.log(response);
					handleFunction(response);
				}
		});
}
AjaxRequests.prototype.startGame = function(playerName, champName, handleFunction) {
		this.sendRequest("game/turn.php?action=startGame&name=" + playerName + "&champId=" + champ, handleFunction);
}

AjaxRequests.prototype.getRandomItems = function(handleFunction) {
		this.sendRequest("game/turn.php?action=randomItem", handleFunction);
}

AjaxRequests.prototype.selectItem = function(selectedItem, handleFunction) {
		this.sendRequest("game/turn.php?action=selectItem&itemNumber=" + selectedItem, handleFunction);
}

AjaxRequests.prototype.endGame = function(handleFunction) {
		this.sendRequest("game/turn.php?action=endGame", handleFunction);
	
}

AjaxRequests.prototype.abortGame = function(handleFunction) {
		this.sendRequest("game/turn.php?action=abortGame", handleFunction);
}

AjaxRequests.prototype.getStats = function(handleFunction) {
		this.sendRequest("game/turn.php?action=getStats", handleFunction);
}

AjaxRequests.prototype.checkActiveGame = function(handleFunction) {
		this.sendRequest("game/turn.php?action=isGameActive", handleFunction);
}

AjaxRequests.prototype.getHighscore = function(top, page, handleFunction) {
		console.log("getting highscore");
		var modifiers = top ? "&top&page=" + page : "";
		console.log("modifiers");
		this.sendRequest("game/turn.php?action=highscore" + modifiers, handleFunction);
}
