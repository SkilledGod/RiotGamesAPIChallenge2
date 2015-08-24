var info = [];
var currentSelectableItems = [0, 0, 0];
var turnCounter = 0;

function startGame() {
	console.log("starting game");
	response = [];
	// Function closure
	function ajaxRequestStartGame() {
		return $.ajax({
			url: "game/turn.php?action=startGame&name=" + name + "&champId=" + champ +"&t=" + Math.random(),
			success: function(result) {
				// do stuff	
				console.log(result);// responseText
				response = JSON.parse(result);
			}
		});
	}

	name = $("#name").val();
	champ = $("#champion").val();
	if (name == "" || champ % 1 !== 0) {
		// todo show error
		console.log("invalid name or champ");	
		return;
	}
	// ajax request and answer :)
	$.when(ajaxRequestStartGame()).done(function() {
		// hide champ select
		if (response["code"] === 200) {
			info["version"] = response["version"];
			info["numberOfTurns"] = response["numberOfTurns"];
			$("#numberOfTurns").text(info["numberOfTurns"]);
			updateStatistics(response["player"], response["opponent"]);
			$("#topScore").text(response['topScore']);
			$("#playerName").text(name);
			requestRandomItems(); // request the items

			$("#selectItemsTable").css("display", "");
			$("#winScreen").css("display", "none");
	
			$("#startGameView").css("display", "none"); // hide champ select
			$("#matchView").css("display", "");							
		} else {
			console.log("sGmeMes" + response["message"]);
			// show error message
		}
	});
}

function requestRandomItems() {
	response = [];
	function ajaxRequestRandomItems() {
		return $.ajax({
			url: "game/turn.php?action=randomItem",
			success: function(result) {
				response = JSON.parse(result);
				console.log("rditemres" + result);
			}
		});
	}

	$.when(ajaxRequestRandomItems()).done(function() {
		if (response["code"] === 200) {
			// set the pictures of the items
			currentSelectableItems[0] = response['items'][0]['id'];
			currentSelectableItems[1] = response['items'][1]['id'];
			currentSelectableItems[2] = response['items'][2]['id'];
			$("#currentTurn").text(response['turn']);
			$("#item1").attr("src", "images/item/" + response['items'][0]['id'] + ".png");
			$("#item2").attr("src", "images/item/" + response['items'][1]['id'] + ".png");
			$("#item3").attr("src", "images/item/" + response['items'][2]['id'] + ".png");
		} else {
			console.log("rditem: " + response['message']);
		}
	});
}

function selectItem(index) {
	response = [];
	function ajaxRequestSelectItem() {
		return $.ajax({
			url: "game/turn.php?action=selectItem&itemNumber=" + selectedItem +"&t=" + Math.random(),
			success: function(result) {
				// do stuff	
				console.log(result);// responseText
				response = JSON.parse(result);
			}
		});
	}
	selectedItem = currentSelectableItems[index];
	$.when(ajaxRequestSelectItem()).done(function() {
		// do stuff
		if (response["code"] === 200) {
			updateStatistics(response['player'], response['opponent']);
			if (response['lastSelectionMade']) {
				endGame();
			} else {
				requestRandomItems();
			}
		} else {
			// show error
		}
	});
}

function endGame() {
	response = [];	
	function ajaxRequestEndGame() {
		return $.ajax({
			url: "game/turn.php?action=endGame",
			success: function(result) {
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestEndGame()).done(function() {
		if (response['code'] === 200) {
			$("#winScreen").css("display", "");
			$("#selectItemsTable").css("display", "none");
			if (response['won']) {
				$("#winImage").css("display", "");
				$("#looseImage").css("display", "none");		
			} else {
				$("#winImage").css("display", "none");
				$("#looseImage").css("display", "");		
			}

			$("#playerEndscore").text(Math.round(response['playerScore']));
			$("#opponentEndscore").text(Math.round(response['opponentScore']));
			console.log("game ended");
		} else {
			console.log(response['message']);
		}
		// TODO win screen!		
		// uhm dunno? --> who won!!! --> buttons for everything else
	});
}

function abortGame() {
	response = [];
	function ajaxRequestAbortGame() {
		return $.ajax({
			url: "game/turn.php?action=abortGame",
			success: function(result) {
				response = JSON.parse(result);
				console.log(result);
			}
		});
	}

	$.when(ajaxRequestAbortGame()).done(function() {
		if (response['code'] === 200) {
			$("#matchView").css("display", "none");							
			$("#continueGameView").css("display", "none");							
			$("#startGameView").css("display", "");
		} else {
			// show error
		}	
	});
}

function restoreGame() {
	response = [];
	function ajaxRequestGetStats() {
		return $.ajax({
			url: "game/turn.php?action=getStats",
			success: function(result) {
				response = JSON.parse(result);
				console.log(result);
			}
		});
	}

	$.when(ajaxRequestGetStats()).done(function() {
		// update stats
		info["version"] = response["version"];
		info["numberOfTurns"] = response["numberOfTurns"];
		$("#numberOfTurns").text(info["numberOfTurns"]);
		$("#currentTurn").text(response['currentTurn']);
		$("#topScore").text(response['topScore']);
		updateStatistics(response['player'], response['opponent']);
		// set selectable items
		currentSelectableItems = response['selectableItems'];
		$("#item1").attr("src", "images/item/" + response['selectableItems'][0]+ ".png");
		$("#item2").attr("src", "images/item/" + response['selectableItems'][1] + ".png");
		$("#item3").attr("src", "images/item/" + response['selectableItems'][2] + ".png");
		
		// set name
		$("#playerName").text(response['name']);
		$("#startGameView").css("display", "none"); // hide champ select
		$("#continueGameView").css("display", "none");							
		$("#matchView").css("display", "");
	});
}

function showX(viewToShow) {
	// TODO
	// change everything to display:none!!
}

function tryAgain() {
		$("#startGameView").css("display", ""); // hide champ select
		$("#matchView").css("display", "none");										
}

function checkActiveGame() {
	response = [];	
	function ajaxRequestCheckActiveGame() {
		return $.ajax({
			url: "game/turn.php?action=isGameActive",
			success: function(result) {
				response = JSON.parse(result);
				console.log(result);
			}
		});
	}

	$.when(ajaxRequestCheckActiveGame()).done(function () {
		if (response['active']) {
			$("#startGameView").css("display", "none");											
			$("#continueGameView").css("display", "");											
			// get Stats
			getStats();									
		} else {
			$("#startGameView").css("display", "");											
			$("#continueGameView").css("display", "none");		
		}
		$("#footer").css("display", "");
	});
}

function getStats() {
	response = [];	
	function ajaxRequestCheckGetStats() {
		return $.ajax({
			url: "game/turn.php?action=getStats",
			success: function(result) {
				response = JSON.parse(result);
				console.log(result);
			}
		});
	}

	$.when(ajaxRequestCheckGetStats()).done(function() {
		setStatisticsContinue(response['player'], response['name']);
	});
}

function showHighscore(top, page) {
	var response = [];
	function ajaxrequestHighscore(modifiers) {
		return $.ajax({
			url: "game/turn.php?action=highscore" + modifiers,
			success: function(result) {
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}
	
	modifiers = "";
	if (top) {
		modifiers = "&top&page=" + page;
	}
	$.when(ajaxrequestHighscore(modifiers)).done(function() {
		if (response['code'] === 200) {
			// fill highscore table
			table = generateHighscoreTable(response['games']);
			$('#highscoreBody').html(table);
			generateHighscorePagination(response['page'], response['numberOfPages']);		
			$('#matchView').css("display", "none");
			$('#highscore').css("display", "");
		} else {
			// show error
		}

	});
}

function generateHighscorePagination(currentPage, maxPage) {
	previous = '<li {disabled}><a onClick="showHighscore(true, {page})" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
	next = '<li {disabled}><a onClick="showHighscore(true, {page})" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	page = '<li {active}><a onClick="showHighscore(true, {page})">{page}</a></li>';
	curPageHTML = '<li><a onClick="showHighscore(true, {page})">{page}</a></li>';

	// TODO page == 1 oder page == maxPage
	disabled = "";
	if (currentPage -1 == 0) {
		disabled = 'class="disabled"';
	}
	previous = previous.replace("{page}", currentPage-1).replace("{disabled}", disabled);
	
	disabled = "";
	if (currentPage == maxPage) {
		disabled = 'class="disabled"';
	}
	next = next.replace("{page}", currentPage+1).replace("{disabled}", disabled);


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

function generateHighscoreTable(games) {
	html = '<tr {mark}><td class="text-center {rankColor}">{rank}</td><td class="text-center {rankColor} hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/{champName}.png" alt=""/></td><td class="text-center {rankColor}">{player_name}</td><td class="text-center {rankColor}">{currentScore}</td></tr>';

	response = "";
	for (i = 0; i < games.length; i++) {
		currentRow = html;
		for (var key in games[i]) {
			if (games[i].hasOwnProperty(key)) {
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
	return response;
}
function setStatisticsContinue(player, playerName) {
	$("#playerNameContinue").text(playerName);
	$("#playerLevelContinue").text(player['level']);
	$("#playerChampNameContinue").text(player["name"]);
	$("#playerChampPicContinue").attr("src", "images/chmpions/" + player["name"].replace("'", "").replace(" ", "") + ".png");
	$("#healthPlayerContinue").text(Math.round(player["stats"]["HealthPool"]));
	$("#adPlayerContinue").text(Math.round(player["stats"]["AttackDamage"]));
	$("#apPlayerContinue").text(Math.round(player["stats"]["MagicDamage"]));
	$("#mresPlayerContinue").text(Math.round(player["stats"]["Spellblock"]));
	$("#armorPlayerContinue").text(Math.round(player["stats"]["Armor"]));
	$("#asPlayerContinue").text(Math.round(player["stats"]["AttackSpeed"]*100) / 100);
	$("#cdrPlayerContinue").text(Math.round(player["stats"]["CooldownReduction"]) + "%");
	$("#movespeedPlayerContinue").text(Math.round(player["stats"]["MovementSpeed"]));
	// update items
	for (i = 1; i <= 6; i++) {
		if (i <= player["items"].length)  {
			$("#item" + i + "PlayerContinue").attr("src", "images/item/" + player['items'][i-1] + ".png");
		} else {
			$("#item" + i + "PlayerContinue").attr("src", "images/item/NoItem.png");
		}
	}

}
function updateStatistics(player, opponent) {
	$("#opponentLevel").text(opponent['level']);
	$("#playerLevel").text(player['level']);

	$("#playerChamp").text(player["name"]);
	$("#opponentChampName").text(opponent["name"]);
	$("#opponentName").text(opponent["name"]);

	$("#opponentChampPic").attr("src", "images/chmpions/" + opponent["name"].replace("'", "").replace(" ", "") + ".png");
	$("#playerChampPic").attr("src", "images/chmpions/" + player["name"].replace("'", "").replace(" ", "") + ".png");

	$("#scorePlayer").text(Math.round(player["score"]));
	

	//$("#scoreOpponent").text(Math.round(opponent["score"])); don't update --> show at the end
	$("#healthPlayer").text(Math.round(player["stats"]["HealthPool"]));
	$("#healthOpponent").text(Math.round(opponent["stats"]["HealthPool"]));

	$("#adPlayer").text(Math.round(player["stats"]["AttackDamage"]));
	$("#adOpponent").text(Math.round(opponent["stats"]["AttackDamage"]));

	$("#apPlayer").text(Math.round(player["stats"]["MagicDamage"]));
	$("#apOpponent").text(Math.round(opponent["stats"]["MagicDamage"]));

	$("#mresPlayer").text(Math.round(player["stats"]["Spellblock"]));
	$("#mresOpponent").text(Math.round(opponent["stats"]["Spellblock"]));

	$("#armorPlayer").text(Math.round(player["stats"]["Armor"]));
	$("#armorOpponent").text(Math.round(opponent["stats"]["Armor"]));

	$("#asPlayer").text(Math.round(player["stats"]["AttackSpeed"]*100) / 100);
	$("#asOpponent").text(Math.round(opponent["stats"]["AttackSpeed"]*100) / 100);

	$("#cdrPlayer").text(Math.round(player["stats"]["CooldownReduction"]) + "%");
	$("#cdrOpponent").text(Math.round(opponent["stats"]["CooldownReduction"]) + "%");

	$("#movespeedPlayer").text(Math.round(player["stats"]["MovementSpeed"]));
	$("#movespeedOpponent").text(Math.round(opponent["stats"]["MovementSpeed"]));
	
	// update items
	for (i = 1; i <= 6; i++) {
		if (i <= player["items"].length)  {
			$("#item" + i + "Player").attr("src", "images/item/" + player['items'][i-1] + ".png");
		} else {
			$("#item" + i + "Player").attr("src", "images/item/NoItem.png");
		}
		if (i <= opponent["items"].length) {
			$("#item" + i + "Opponent").attr("src", "images/item/" + opponent['items'][i-1] + ".png");
		} else {
			$("#item" + i + "Opponent").attr("src", "images/item/NoItem.png");
		}
	}
}
