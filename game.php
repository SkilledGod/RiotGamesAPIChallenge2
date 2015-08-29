<?php
include 'db.php';
$search = $mysqli->query("SELECT * FROM `ap_items`");
?>
<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/fonts.css" rel="stylesheet" type="text/css">
        <title>Riot Project v2 -  Start the game</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <link id="data-uikit-theme" rel="stylesheet" href="js/tip/uikit.docs.min.css">
        <script src="js/tip/jquery.js"></script>
        <script src="js/tip/uikit.min.js"></script>
        <script src="js/tip/tooltip.js"></script>
        <script src="js/game.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	</head>
<?php 
	include_once('db.php');
		
	$loadFunction = "checkActiveGame()";
	if (isset($_GET['showHighscore'])) {
		$loadFunction = "showHighscore(true, 1)";
	}
?>
    <body class="full" onload="<?php echo $loadFunction; ?>" >

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Riot Project v2</a>
                </div>
                <!-- Search -->
                <form action="item.php" method="get" class="navbar-form navbar-left hidden-sm hidden-xs" role="search">
                    <div class="form-group">
                        <select title='Search For Item From Here...' name='id' data-live-search="true" data-size="5" data-width="250px" class="selectpicker">
                            <?php
                            $items = file_get_contents("item.json");
                            while ($row2 = $search->fetch_assoc()) {
                            $getItem = json_decode($items, true);
                            foreach ($getItem['data'] as $key => $val) {
                            if ($key == $row2['id']) {
                            echo "<option value='{$row2['id']}' data-content=\"<img class='img-circle' src='images/item/{$row2['id']}.png' width='20' height='20' alt='{$row2['name']}' /> {$row2['name']}\"></option>";
                            }
                            }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Search</button>
                </form>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                  
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <?php
                        if (isset($_GET['showHighscore'])){
                        echo "<li><a href=\"game.php\">Game</a></li>";
                        echo "<li class=\"active\"><a href=\"game.php?showHighscore\">High Score</a></li>";
                        }
                        else{
                        echo "<li class=\"active\"><a href=\"game.php\">Game</a></li>";

                        echo "<li><a href=\"game.php?showHighscore\">High Score</a></li>";
                        }
                        ?>     
                        <li>
                            <a href="export.php">Export Data</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>                       
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container topmargin">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Game</h1>
			<div id="errorbox" style="display:none" class="alert alert-danger fade in">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<span id="errormessage">A problem has been occurred while submitting your data.</span>
			</div>
                </div>
            </div>
            <div style="display:none" id="startGameView" class="row" style="background-color: #202126;">
                <div id="champSelect"  class="col-lg-12 backgroundimg col-centered">
                    <form method="get" class="form-horizontal" role="search" style="padding-top:100px;">
                        <div class="form-group">
                            <p class="col-sm-2 text-center">
                                Your Name
                            </p>
                            <div class="col-sm-3">
                                <input id="name" style="width:200px;margin:0 auto;" placeholder="Enter Your Name" class="form-control" type="text" required="">
                            </div>
                            <p class="col-sm-3 text-center" style="margin-top:10px;">
                                Champion
                            </p>
                            <div class="col-sm-2" style="text-align: center;">
                                <select id="champion" data-live-search="true" data-size="5" data-width="200px" class="selectpicker form-control" required="">
                                    <?php
                                    include_once('db.php');
                                    $champs = $mysqli->query("select id, name, pic from champs order by name asc");
                                    while ($champ = $champs->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $champ['id']; ?>" data-content="<img class='img-circle' width='20' height='20' src='images/chmpions/<?php echo $champ['pic']; ?>' /> <?php echo $champ['name']; ?>"></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>   
                            <div class="col-sm-12 text-center" style="padding-top:50px;">
                                <button style="width:200px;margin:0 auto;" type="button" onClick="startGame()" class="btn btn-success">Start Game</button>
                            </div>                             
                        </div>
                    </form>
                </div>
            </div>
            <div id="continueGameView" style="display:none" class="row">
                <div class="col-lg-6">
                    <div  id="playerNameContinue" class="opponentname"> Twisted Fate </div>
                    <div class="champpic">
                        <img id="playerChampPicContinue" class="absimg" src="images/chmpions/Zed.png" alt="" height="146" width="146">
                        <div id="playerChampNameContinue" class="opponentname champname">
                            Twisted Fate
                        </div>
                    </div>
                    <hr class="hrstyle">
                    Status<span style="float:right;">Level : <span id="playerLevelContinue">8</span></span>
                    <table class="table table-full-width custum-table">
                        <tbody>
                            <tr>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/hp.png" alt=""></td>
                                <td class="text-left">
                                    <span>Health</span>
                                    <br>
                                    <span id="healthPlayerContinue">579.4</span>
                                </td>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/ad.png" alt=""></td>
                                <td class="text-left">
                                    <span>Attack Damage</span>
                                    <br>
                                    <span id="adPlayerContinue">200</span>
                                </td>
                            </tr> 
                            <tr>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/ap.png" alt=""></td>
                                <td class="text-left">
                                    <span>Ability Damage</span>
                                    <br>
                                    <span id="apPlayerContinue">???</span>
                                </td>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/mr.png" alt=""></td>
                                <td class="text-left">
                                    <span>Magic Resist</span>
                                    <br>
                                    <span  id="mresPlayerContinue">200</span>
                                </td>
                            </tr> 
                            <tr>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/ar.png" alt=""></td>
                                <td class="text-left">
                                    <span>Armor</span>
                                    <br>
                                    <span id="armorPlayerContinue">579.4</span>
                                </td>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                <td class="text-left">
                                    <span>Attack Speed</span>
                                    <br>
                                    <span id="asPlayerContinue">200</span>
                                </td>
                            </tr> 
                            <tr>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                <td class="text-left">
                                    <span>Cooldown Reduction</span>
                                    <br>
                                    <span id="cdrPlayerContinue">200</span>
                                </td>
                                <td class="text-left">
                                    <img style="border:2px solid white;" class="img-responsive" src="images/bs.png" alt=""></td>
                                <td class="text-left">
                                    <span>Movement Speed</span>
                                    <br>
                                    <span id="movespeedPlayerContinue">579.4</span>
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                    <hr class="hrstyle">
                    Items
                    <table class="table table-full-width custum-table">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img id="item1PlayerContinue" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                                <td class="text-center">
                                    <img id="item2PlayerContinue" data-uk-tooltip title=""  class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                                <td class="text-center">
                                    <img id="item3PlayerContinue" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                            </tr> 

                            <tr>
                                <td class="text-center">
                                    <img id="item4PlayerContinue" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                                <td class="text-center">
                                    <img id="item5PlayerContinue" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                                <td class="text-center">
                                    <img id="item6PlayerContinue" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="contabort hidden-sm hidden-xs hidden-md">
                        <div class="col-sm-12 text-center" style="padding:60px;">
                            <button onClick="abortGame()" style="width:200px;margin:0 auto;font-size: 50px;" type="button" class="btn btn-danger">Abort</button>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button onClick="restoreGame()" style="width:200px;margin:0 auto;font-size: 50px;" type="button" class="btn btn-success">Continue</button>                                
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hidden-lg">
                        <div class="col-sm-12 text-center" style="margin-top:10px;">
                            <button onClick="abortGame()" style="width:200px;margin:0 auto;font-size: 50px;" type="button" class="btn btn-danger">Abort</button>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button onClick="restoreGame()" style="width:200px;margin:0 auto;font-size: 50px;" type="button" class="btn btn-success">Continue</button>                                
                        </div>
                    </div>
                </div>  
            </div>

            <div class="row" style="background-color: #202126;">                
                <div id="matchView" style="display:none;" class="col-lg-12 backgroundimg2 col-centered">
                    <div class="col-lg-3">
                        <div id="playerName" class="your">Summoner Name</div>
                        <div class="champpic">
                            <img id="playerChampPic" class="absimg" src="images/chmpions/Zed.png" alt="" height="146" width="146">
                            <div id="playerChamp" class="champname">
                                Twisted Fate    
                            </div>
                        </div>
                        <hr class="hrstyle">
                        Status<span style="float:right;">Level : <span id="playerLevel">8</span></span>
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/hp.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Health</span>
                                        <br>
                                        <span id="healthPlayer">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ad.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Damage</span>
                                        <br>
                                        <span id="adPlayer">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ap.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Ability Damage</span>
                                        <br>
                                        <span id="apPlayer">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/mr.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span id="mresPlayer">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ar.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Armor</span>
                                        <br>
                                        <span id="armorPlayer">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Speed</span>
                                        <br>
                                        <span id="asPlayer">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Cooldown Reduction</span>
                                        <br>
                                        <span id="cdrPlayer">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/bs.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Movement Speed</span>
                                        <br>
                                        <span id="movespeedPlayer">200</span>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <hr class="hrstyle">
                        Items
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <img id="item1Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item2Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item3Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr> 

                                <tr>
                                    <td class="text-center">
                                        <img id="item4Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item5Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item6Player" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <div class="score">
                            <div class="yourscore"><span id="scorePlayer" class="gradeitntext">0</span></div>
                            <div class="vsicon hidden-md hidden-sm hidden-xs hidden-print"></div>
                            <div class="topscore"><span id="topScore" class="gradeitntext2">51</span></div>
                        </div>
                        <div id="winScreen" style="display:none;margin-top: 70px;" class="randomitems">
                            <span>Result</span>
                            <hr class="hrstyle">
                            <div class="row">
                                <div class="col-sm-12 text-center" style="padding-top:20px;">
                                    <div class="col-sm-6"><div class="boxbt"><span id="playerEndscore" class="leftbox" style="padding-top:7px;">15000</span><span class="rightbox" style="padding-top:7px;">Your Score</span></div></div>
                                    <div class="col-sm-6"><div class="boxbt"><span id="opponentEndscore"  class="leftbox1" style="padding-top:7px;">15000</span><span class="rightbox1" style="padding-top:7px;">Opponent Score</span></div></div>
                                </div>
                                <div class="col-sm-12 text-center" style="padding-top:20px;">
                                    <img id="winImage" style="margin:0 auto;" class="img-responsive" src="images/win.png" alt=""/>
                                    <img id="loseImage" style="margin:0 auto;" class="img-responsive" src="images/lose.png" alt=""/>
                                </div>  
                                <div class="col-sm-12 text-center" style="padding-top:20px;">
                                    <div class="col-sm-6"><button onClick="showHighscore(false, 0)" style="width:150px;margin: 0px auto; font-size: 15px; padding: 5px;" type="button" class="btn btn-success">High Score</button></div>
                                    <div class="col-sm-6"><button style="width:150px;margin:0 auto;font-size: 15px;" onClick="tryAgain()" type="button" class="btn btn-danger">Try Again ?</button></div>
                                </div>                                
                            </div>
                        </div>                        
                        <div id="selectItemsTable" class="randomitems" style="margin-top: 100px;">
                            Click On One Item To Move It To Your Inventory <span style="float:right;"><span id="currentTurn">1</span>/<span id="numberOfTurns">6</span></span>
                            <table class="table table-full-width custum-table">
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <img id="item1" onClick="selectItem(0)" data-uk-tooltip title="" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                        <td class="text-center">
                                            <img id="item2"  onClick="selectItem(1)" data-uk-tooltip title="<table class='table table-full-width custum-table2'><tr><td>Type</td><td>Patch 5.11</td><td>Patch 5.14</td><td>Change</td></tr><tr><td>Pickrate</td><td>50%</td><td>60%</td><td style='color:green;'><img src='images/arrowUp.png' width='8' height='8' alt=''/> 10%</td></tr><tr><td>Winrate</td><td>60%</td><td>50%</td><td style='color:red;'><img style='margin-top:-2px;' src='images/arrowDown.png' width='8' height='8' alt=''/> 10%</td></tr></table>  <span style='color:red;'> NOTE </span><span style='font-size:9px;'> : This Analysis From Ranked Matches</span>" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                        <td class="text-center">
                                            <img id="item3"  onClick="selectItem(2)" data-uk-tooltip title="" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                    </tr> 
                                </tbody>
                            </table> 
                            <div class="col-sm-4 text-center">
                                <table class='table table-full-width custum-table2 '>
                                    <tr>
                                        <th>Patch</th>
                                        <th>5.11</th>
                                        <th>5.14</th>
                                    </tr>
                                    <tr>
                                        <td>Pickrate</td>
                                        <td id="pickrate511Item1" >50%</td>
                                        <td id="pickrate514Item1" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></td>
                                    </tr>
                                    <tr>
                                        <td>Winrate</td>
                                        <td id="winrate511Item1" >50%</td>
                                        <td id="winrate514Item1" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></span></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="col-sm-4 text-center">
                                <table class='table table-full-width custum-table2 '>
                                    <tr>
                                        <th>Patch</th>
                                        <th>5.11</th>
                                        <th>5.14</th>
                                    </tr>
                                    <tr>
                                        <td>Pickrate</td>
                                        <td id="pickrate511Item2" >50%</td>
                                        <td id="pickrate514Item2" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></td>
                                    </tr>
                                    <tr>
                                        <td>Winrate</td>
                                        <td id="winrate511Item2" >50%</td>
                                        <td id="winrate514Item2" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></span></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="col-sm-4 text-center">
                                <table class='table table-full-width custum-table2 '>
                                    <tr>
                                        <th>Patch</th>
                                        <th>5.11</th>
                                        <th>5.14</th>
                                    </tr>
                                    <tr>
                                        <td>Pickrate</td>
                                        <td id="pickrate511Item3" >50%</td>
                                        <td id="pickrate514Item3" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></td>
                                    </tr>
                                    <tr>
                                        <td>Winrate</td>
                                        <td id="winrate511Item3" >50%</td>
                                        <td id="winrate514Item3" style="white-space: nowrap">60%<span style="color:green"> <img src='images/arrowUp.png' width='8' height='8' alt=''/></span></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="col-sm-12 text-center" style="margin-bottom:20px;">
                                <button onClick="abortGame()" style="width:200px;margin:0 auto;font-size: 25px;" type="button" class="btn btn-danger">Abort</button>
                            </div>    

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div  id="opponentName" class="opponentname"> Twisted Fate </div>
                        <div class="champpic">
                            <img id="opponentChampPic" class="absimg" src="images/chmpions/Zed.png" alt="" height="146" width="146">
                            <div id="opponentChampName" class="opponentname champname">
                                Twisted Fate
                            </div>
                        </div>
                        <hr class="hrstyle">
                        Status<span style="float:right;">Level : <span id="opponentLevel">8</span></span>
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/hp.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Health</span>
                                        <br>
                                        <span id="healthOpponent">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ad.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Damage</span>
                                        <br>
                                        <span id="adOpponent">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ap.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Ability Damage</span>
                                        <br>
                                        <span id="apOpponent">???</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/mr.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span  id="mresOpponent">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ar.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Armor</span>
                                        <br>
                                        <span id="armorOpponent">579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Speed</span>
                                        <br>
                                        <span id="asOpponent">200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Cooldown Reduction</span>
                                        <br>
                                        <span id="cdrOpponent">200</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/bs.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Movement Speed</span>
                                        <br>
                                        <span id="movespeedOpponent">579.4</span>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <hr class="hrstyle">
                        Items
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <img id="item1Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item2Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item3Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr> 

                                <tr>
                                    <td class="text-center">
                                        <img id="item4Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item5Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img id="item6Opponent" data-uk-tooltip title="" class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>            
            </div>
            <div id="highscore" style="display:none" class="row" style="background-color: #202126;">
                <center><button type="button" style="width:200px;margin:0 auto;font-size: 30px;" onClick="checkActiveGame()" class="btn btn-success">Play</button></center>
                <div class="col-sm-12 text-center" style="margin-top:50px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:10%">Rank</th>
                                <th class="text-center hidden-xs" style="width:10%">Champion</th>
                                <th class="text-center" style="width:50%">Name</th>
                                <th class="text-center" style="width:30%">Score</th>
                            </tr>
                        </thead>
                        <tbody id="highscoreBody">
                            <tr>
                                <td class="text-center firstrank">1</td>
                                <td class="text-center firstrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center firstrank">1st Name</td>
                                <td class="text-center firstrank">25</td>
                            </tr> 
                            <tr>
                                <td class="text-center secrank">2</td>
                                <td class="text-center secrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center secrank">2nd Name</td>
                                <td class="text-center secrank">20</td>
                            </tr> 
                            <tr>
                                <td class="text-center thirank">3</td>
                                <td class="text-center thirank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center thirank">3rd Name</td>
                                <td class="text-center thirank">10</td>
                            </tr>   
                            <tr>
                                <td class="text-center otherrank">4</td>
                                <td class="text-center otherrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center otherrank">4th etc ..</td>
                                <td class="text-center otherrank">1</td>
                            </tr>  
                            <tr>
                                <td class="text-center otherrank">5</td>
                                <td class="text-center otherrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center otherrank">5th etc ..</td>
                                <td class="text-center otherrank">1</td>
                            </tr>                                 
                            <tr class="yourrank">
                                <td class="text-center">6</td>
                                <td class="text-center hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center">Current Player</td>
                                <td class="text-center">1</td>
                            </tr> 

                            <tr>
                                <td class="text-center otherrank">7</td>
                                <td class="text-center otherrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center otherrank">7th etc ..</td>
                                <td class="text-center otherrank">1</td>
                            </tr> 
                            <tr>
                                <td class="text-center otherrank">8</td>
                                <td class="text-center otherrank hidden-xs"><img class="img-circle" width="50" height="50" src="images/chmpions/Zed.png" alt=""/></td>
                                <td class="text-center otherrank">8th etc ..</td>
                                <td class="text-center otherrank">1</td>
                            </tr>                                 
                        </tbody>

                    </table>
                </div>
                <nav style="text-align: center">
                    <ul id="paginationBody" class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>   
            <!-- Footer -->
            <footer id="footer" style="display:none">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <hr>

                        <p>Copyright © Riot Project v2</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
                                    $('[data-toggle="popover"]').popover(
                                            {trigger: 'hover', 'placement': 'top'}
                                    );

                                    $(document).ready(function () {
                                        $("#infor").delay(3000).fadeOut("slow");
                                        $("#infor2").delay(3000).fadeOut("slow");
                                    });
        </script>

        <script src="js/bootstrap-select.min.js" type="text/javascript"></script>
        <script>
                                    $(document).ready(function () {
                                        $('select').selectpicker();
                                    });
        </script>

    </body>
</html>
