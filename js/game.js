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
			$("#playerName").text(name);
			requestRandomItems(); // request the items

			$("#selectItemsTable").css("display", "");
			$("#winScreen").css("display", "none");
	
			$("#champSelect").css("display", "none"); // hide champ select
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
			$("#champSelect").css("display", ""); // hide champ select	
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
		updateStatistics(response['player'], response['opponent']);

		$("#champSelect").css("display", "none"); // hide champ select
		$("#matchView").css("display", "");									
	});
}

function showX(viewToShow) {
	// TODO
	// change everything to display:none!!
}

function tryAgain() {
		$("#champSelect").css("display", ""); // hide champ select
		$("#matchView").css("display", "none");										
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
			$("#item" + i + "Player").attr("src", "images/item/NoItem.png");
		}
	}
}
