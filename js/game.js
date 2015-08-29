var info = [];
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
/*	if (name == "" || champ % 1 !== 0) {
		// todo show error
		console.log("invalid name or champ");	
		return;
	}*/
	// ajax request and answer :)
	$.when(ajaxRequestStartGame()).done(function() {
		// hide champ select
		if (response["code"] === 200) {
			info["version"] = response["version"];
			info["numberOfTurns"] = response["numberOfTurns"];
			$("#numberOfTurns").text(info["numberOfTurns"]);
			updateStatistics(response["player"], response["opponent"]);
			$("#topScore").text(Math.round(response['topScore']));
			$("#playerName").text(name);
			requestRandomItems(); // request the items

			$("#selectItemsTable").css("display", "");
			$("#winScreen").css("display", "none");
	
			$("#startGameView").css("display", "none"); // hide champ select
			$("#matchView").css("display", "");							
		} else {
			showError(response);
		}
	});
}

var showErrorTimeout = null;
function showError(response) {
	if (showErrorTimeout != null) {
		console.log("cleared timeout");
		window.clearTimeout(showErrorTimeout);
	}
	console.log("Show error");
	console.log(response);
	$("#errormessage").text(response['message']);
	$("#errorbox").css("display", "");
	$("#errorbox").css("opacity", "");

	// remove after 3 seconds
	showErrorTimeout = window.setTimeout(function() {
	  $("#errorbox").fadeTo(500, 0).slideUp(500, function(){
		showErrorTimeout = null;
	      	$(this).css("display", "none");
	  });
	}, 3000);
}

function requestRandomItems() {
	response = [];
	function ajaxRequestRandomItems() {
		return $.ajax({
			url: "game/turn.php?action=randomItem",
			success: function(result) {
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestRandomItems()).done(function() {
		if (response["code"] === 200) {
			// set the pictures of the items
			$("#currentTurn").text(response['turn']);
			setItem(response['items'][0], "item1");
			setItem(response['items'][1], "item2");
			setItem(response['items'][2], "item3");
			// set the onClick action
			$("#item1").attr("onClick", "selectItem(" + response['items'][0]['id'] + ")");
			$("#item2").attr("onClick", "selectItem(" + response['items'][1]['id'] + ")");
			$("#item3").attr("onClick", "selectItem(" + response['items'][2]['id'] + ")");

			// set items table
			$("#pickrate511Item1").html(Math.round(response['items'][0]['pickrate511']*100)/100);
			$("#pickrate514Item1").html(Math.round(response['items'][0]['pickrate514']*100)/100 + (response['items'][0]['pickrate511'] < response['items'][0]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
			$("#winrate511Item1").html(Math.round(response['items'][0]['winrate511']*100)/100);
			$("#winrate514Item1").html(Math.round(response['items'][0]['winrate514']*100)/100 + (response['items'][0]['winrate511'] < response['items'][0]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));

			$("#pickrate511Item2").html(Math.round(response['items'][1]['pickrate511']*100)/100);
			$("#pickrate514Item2").html(Math.round(response['items'][1]['pickrate514']*100)/100 + (response['items'][1]['pickrate511'] < response['items'][1]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
			$("#winrate511Item2").html(Math.round(response['items'][1]['winrate511']*100)/100);
			$("#winrate514Item2").html(Math.round(response['items'][1]['winrate514']*100)/100 + (response['items'][1]['winrate511'] < response['items'][1]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));

			$("#pickrate511Item3").html(Math.round(response['items'][2]['pickrate511']*100)/100);
			$("#pickrate514Item3").html(Math.round(response['items'][2]['pickrate514']*100)/100 + (response['items'][2]['pickrate511'] < response['items'][2]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
			$("#winrate511Item3").html(Math.round(response['items'][2]['winrate511']*100)/100);
			$("#winrate514Item3").html(Math.round(response['items'][2]['winrate514']*100)/100 + (response['items'][2]['winrate511'] < response['items'][2]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
		} else {
			showError(response);
		}
	});
}

function selectItem(id) {
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
	selectedItem = id;
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
			showError(response);
		}
	});
}

function setItem(item, id) {
	console.log(item);
	// Set image
	$("#" + id).attr("src", "images/item/" + item['id'] + ".png");
	// Set tooltip
	$("#" + id).attr("title", "<b>" + item['name'] + "</b><br>" +item['description']);
	$("#" + id).attr("data-cached-title", "<b>" + item['name'] + "</b><br>" +item['description']);
	// TODO set table if wanted	
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
			showError(response);
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
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestAbortGame()).done(function() {
		if (response['code'] === 200) {
			$("#matchView").css("display", "none");							
			$("#continueGameView").css("display", "none");							
			$("#startGameView").css("display", "");
		} else {
			showError(response);
		}	
	});
}

function restoreGame() {
	response = [];
	function ajaxRequestGetStats() {
		return $.ajax({
			url: "game/turn.php?action=getStats",
			success: function(result) {
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestGetStats()).done(function() {
		if (response['code'] == 200) {
			// update stats
			info["version"] = response["version"];
			info["numberOfTurns"] = response["numberOfTurns"];
			$("#numberOfTurns").text(info["numberOfTurns"]);
			$("#currentTurn").text(response['currentTurn']);
			$("#topScore").text(Math.round(response['topScore']));
			updateStatistics(response['player'], response['opponent']);
			if (response['currentPhase'] == 'requestItem') {
				requestRandomItems();
			} else {
				// set selectable items
				setItem(response['selectableItems'][0], "item1");
				setItem(response['selectableItems'][1], "item2");
				setItem(response['selectableItems'][2], "item3");
				// set the onClick action
				$("#item1").attr("onClick", "selectItem(" + response['selectableItems'][0]['id'] + ")");
				$("#item2").attr("onClick", "selectItem(" + response['selectableItems'][1]['id'] + ")");
				$("#item3").attr("onClick", "selectItem(" + response['selectableItems'][2]['id'] + ")");
				// set items table
				$("#pickrate511Item1").html(Math.round(response['selectableItems'][0]['pickrate511']*100)/100);
				$("#pickrate514Item1").html(Math.round(response['selectableItems'][0]['pickrate514']*100)/100 + (response['selectableItems'][0]['pickrate511'] < response['selectableItems'][0]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
				$("#winrate511Item1").html(Math.round(response['selectableItems'][0]['winrate511']*100)/100);
				$("#winrate514Item1").html(Math.round(response['selectableItems'][0]['winrate514']*100)/100 + (response['selectableItems'][0]['winrate511'] < response['selectableItems'][0]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));

				$("#pickrate511Item2").html(Math.round(response['selectableItems'][1]['pickrate511']*100)/100);
				$("#pickrate514Item2").html(Math.round(response['selectableItems'][1]['pickrate514']*100)/100 + (response['selectableItems'][1]['pickrate511'] < response['selectableItems'][1]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
				$("#winrate511Item2").html(Math.round(response['selectableItems'][1]['winrate511']*100)/100);
				$("#winrate514Item2").html(Math.round(response['selectableItems'][1]['winrate514']*100)/100 + (response['selectableItems'][1]['winrate511'] < response['selectableItems'][1]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));

				$("#pickrate511Item3").html(Math.round(response['selectableItems'][2]['pickrate511']*100)/100);
				$("#pickrate514Item3").html(Math.round(response['selectableItems'][2]['pickrate514']*100)/100 + (response['selectableItems'][2]['pickrate511'] < response['selectableItems'][2]['pickrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));
				$("#winrate511Item3").html(Math.round(response['selectableItems'][2]['winrate511']*100)/100);
				$("#winrate514Item3").html(Math.round(response['selectableItems'][2]['winrate514']*100)/100 + (response['selectableItems'][2]['winrate511'] < response['selectableItems'][2]['winrate514'] ? "<img src='images/arrowUp.png' width='8' height='8' alt=''/>" : "<img src='images/arrowDown.png' width='8' height='8' alt=''/>"));

			}		
			// set name
			$("#playerName").text(response['name']);
			$("#startGameView").css("display", "none"); // hide champ select
			$("#continueGameView").css("display", "none");							
			$("#matchView").css("display", "");
		} else {
			showError(response);
		}
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
				console.log(result);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestCheckActiveGame()).done(function () {
		if (response['active']) {
			$("#startGameView").css("display", "none");											
			$('#highscore').css("display", "none");
			$("#continueGameView").css("display", "");											
			// get Stats
			getStats();									
		} else {
			$("#startGameView").css("display", "");											
			$('#highscore').css("display", "none");
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
				console.log(response);
				response = JSON.parse(result);
			}
		});
	}

	$.when(ajaxRequestCheckGetStats()).done(function() {
		if (response['code'] == 200) {
		setStatisticsContinue(response['player'], response['name']);
		} else {
			showError(response);
		}
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
			showError(response);
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
			setItem(player['items'][i-1], "item" + i + "PlayerContinue");
		} else {
			$("#item" + i + "PlayerContinue").attr("src", "images/item/NoItem.png");
			$("#item" + i + "PlayerContinue").attr("title", "");
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
			setItem(player['items'][i-1], "item" + i + "Player");
		} else {
			$("#item" + i + "Player").attr("src", "images/item/NoItem.png");
			$("#item" + i + "Player").attr("title", "");
		}
		if (i <= opponent["items"].length) {
			setItem(opponent['items'][i-1], "item" + i + "Opponent");
		} else {
			$("#item" + i + "Opponent").attr("src", "images/item/NoItem.png");
			$("#item" + i + "Opponent").attr("title", "");
		}
	}
}
