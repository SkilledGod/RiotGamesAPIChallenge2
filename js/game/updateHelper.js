function Helper() {}

Helper.prototype.initGame = function(data) {
		$("#numberOfTurns").text(data["numberOfTurns"]);
		$("#topScore").text(Math.round(data['topScore']));
		$("#currentTurn").text(data['currentTurn']);		
		this.updateStatistics(data['player'], data['name'], data['opponent'], false);

		// set selectable items
		if (data['currentPhase'] == "selectItem") {
			for (i = 0; i < data['selectableItems'].length; i++) {
					this.setItem(data['selectableItems'][i], "item" + (i+1), true);
			}
		}
}

Helper.prototype.updateStatistics = function(player, playerName, opponent, cont) {
	var modifier = "";
	if (cont) {
		// update playerName
		modifier = "Continue";
	}
	if (playerName !== "") {
		$("#playerName" + modifier).text(playerName);
	}
	$("#opponentLevel").text(opponent['level']);
	$("#playerLevel" + modifier).text(player['level']);

	$("#playerChamp" + modifier).text(player["name"]);
	$("#opponentChampName" + modifier).text(opponent["name"]);
	$("#opponentName").text(opponent["name"]);

	$("#opponentChampPic").attr("src", "images/chmpions/" + opponent["name"].replace("'", "").replace(" ", "") + ".png");
	$("#playerChampPic" + modifier).attr("src", "images/chmpions/" + player["name"].replace("'", "").replace(" ", "") + ".png");

	$("#scorePlayer").text(Math.round(player["score"]));
	
	$("#healthPlayer" + modifier).text(Math.round(player["stats"]["HealthPool"]));
	$("#healthOpponent").text(Math.round(opponent["stats"]["HealthPool"]));

	$("#adPlayer" + modifier).text(Math.round(player["stats"]["AttackDamage"]));
	$("#adOpponent").text(Math.round(opponent["stats"]["AttackDamage"]));

	$("#apPlayer" + modifier).text(Math.round(player["stats"]["MagicDamage"]));
	$("#apOpponent").text(Math.round(opponent["stats"]["MagicDamage"]));

	$("#mresPlayer" + modifier).text(Math.round(player["stats"]["Spellblock"]));
	$("#mresOpponent").text(Math.round(opponent["stats"]["Spellblock"]));

	$("#armorPlayer" + modifier).text(Math.round(player["stats"]["Armor"]));
	$("#armorOpponent").text(Math.round(opponent["stats"]["Armor"]));

	$("#asPlayer" + modifier).text((Math.round(player["stats"]["AttackSpeed"]*100) / 100).toFixed(2));
	$("#asOpponent").text((Math.round(opponent["stats"]["AttackSpeed"]*100) / 100).toFixed(2));

	$("#cdrPlayer" + modifier).text(Math.round(player["stats"]["CooldownReduction"]) + "%");
	$("#cdrOpponent").text(Math.round(opponent["stats"]["CooldownReduction"]) + "%");

	$("#movespeedPlayer" + modifier).text(Math.round(player["stats"]["MovementSpeed"]));
	$("#movespeedOpponent").text(Math.round(opponent["stats"]["MovementSpeed"]));
	
	// update items
	for (i = 1; i <= 6; i++) {
		if (i <= player["items"].length)  {	
			this.setItem(player['items'][i-1], "item" + i + "Player" + modifier);
		} else {
			$("#item" + i + "Player" + modifier).attr("src", "images/item/NoItem.png");
			$("#item" + i + "Player" + modifier).attr("title", "");
		}
		if (i <= opponent["items"].length) {
			this.setItem(opponent['items'][i-1], "item" + i + "Opponent");
		} else {
			$("#item" + i + "Opponent").attr("src", "images/item/NoItem.png");
			$("#item" + i + "Opponent").attr("title", "");
		}
	}
}

Helper.prototype.generateHighscoreTable = function(games) {
	html = '<tr {mark}><td class="text-center {rankColor}">{rank}</td><td class="text-center {rankColor} hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/{champName}.png" alt=""/></td><td class="text-center {rankColor}">{player_name}</td><td class="text-center {rankColor}">{currentScore}</td></tr>';

	response = "";
	for (i = 0; i < games.length; i++) {
		currentRow = html;
		for (var key in games[i]) {
			if (games[i].hasOwnProperty(key)) {
				if (key == "currentScore") {
					games[i][key] = Math.round(games[i][key]);
				}	
				if (key == "mark") {
					currentRow = currentRow.replace("{" + key + "}", games[i][key] ? "class=\"yourrank\"" : "");
				} else if (key == "champName") {
					currentRow = currentRow.replace("{" + key + "}", games[i][key].replace("'", "").replace(" ", ""));					
				} else {
					currentRow = currentRow.replace("{" + key + "}", games[i][key]);
				}
			}
		}
		if (games[i]["rank"] == 1) {
			currentRow = currentRow.replace("{rankColor}", "firstrank");
		}
		if (games[i]["rank"] == 2) {
			currentRow = currentRow.replace("{rankColor}", "secrank");
		}
		if (games[i]["rank"] == 3) {
			currentRow = currentRow.replace("{rankColor}", "thirank");
		}
		if (games[i]["rank"] > 3) {
			currentRow = currentRow.replace("{rankColor}", "otherrank");
		}


		response += currentRow;
	}
	// set table instead
	$('#highscoreBody').html(response);
}

Helper.prototype.generateHighscorePagination = function(currentPage, maxPage) {
	previous = '<li><a onClick="game.showHighscore(true, {page})" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
	previousDisabled = '<li class="disabled"><a aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
	next = '<li {disabled}><a onClick="game.showHighscore(true, {page})" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	nextDisabled = '<li class="disabled"><a aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	page = '<li {active}><a onClick="game.showHighscore(true, {page})">{page}</a></li>';
	curPageHTML = '<li><a onClick="game.showHighscore(true, {page})">{page}</a></li>';


	if (currentPage -1 == 0) {
		previous = previousDisabled;
	} else {
		previous = previous.replace("{page}", currentPage-1);
	}	

	if (currentPage == maxPage) {
		next = nextDisabled;
	} else {
		next = next.replace("{page}", currentPage+1);
	}

	response = previous;
	for (i = Math.max(1, currentPage-5); i <= Math.min(maxPage, currentPage+5);i++) {
		className =  "";
		if (i == currentPage) {
			className = 'class="active"';
		}
		response += page.replace(/{page}/g, "" + i).replace("{active}", className);			
	}
	response += next;

	$('#paginationBody').html(response);	
}

Helper.prototype.setItem = function(item, id, select) {
	// Set image
	$("#" + id).attr("src", "images/item/" + item['id'] + ".png");
	// Set tooltip
	$("#" + id).attr("title", "<b>" + item['name'] + "</b><br>" +item['description']);
	$("#" + id).attr("data-cached-title", "<b>" + item['name'] + "</b><br>" +item['description']);
	// TODO set table if wanted	
	if (select) {
		$("#" + id).attr("onClick", "game.selectItem(" + item['id'] + ")");
		// set items table
		$("#pickrate511" + id.capitalizeFirstLetter()).html(Math.round(item['pickrate511']*10000)/100 + "%"	);
		$("#pickrate514" + id.capitalizeFirstLetter()).html(Math.round(item['pickrate514']*10000)/100  + "%"+ (item['pickrate511'] < item['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
		$("#winrate511" + id.capitalizeFirstLetter()).html(Math.round(item['winrate511']*10000)/100 + "%");
		$("#winrate514" + id.capitalizeFirstLetter()).html(Math.round(item['winrate514']*10000)/100  + "%"+ (item['winrate511'] < item['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
	}
}

Helper.prototype.setErrorMessage = function (message) {
		$("#errormessage").text(response['message']);
}

