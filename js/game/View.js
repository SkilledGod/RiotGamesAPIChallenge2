function View() {}

View.prototype.showView = function(name) {
	console.log(name);
	for (i = 0; i < this.views.length; i++) {
			if (name.indexOf(this.views[i]) !== -1) {
				$("#" + this.views[i]).css("display", "");
			} else {
				$("#" + this.views[i]).css("display", "none");
			}
	}
};
View.prototype.views = [ "startGameView", "matchView", "continueView", "winGameView", "highscoreView", "selectableItems", "winImage", "loseImage"];
View.prototype.errorTimeout = null;
View.prototype.displayError = function () {
	if (this.errorTimeout != null) {
		window.clearTimeout(this.erroTimeout);
	}
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
