<?php
include 'db.php';
$itemid = strip_tags(htmlspecialchars($_GET['id']));
if (isset($_GET['id'])) {
    if (ctype_digit($_GET['id'])) {
        $id_raw = trim(htmlentities($_GET["id"]));
        $id_secure = $mysqli->real_escape_string($id_raw);
        $result = $mysqli->query("SELECT * FROM `ap_items` WHERE `id` = $id_secure ");
        $row = $result->fetch_assoc();
        $search = $mysqli->query("SELECT * FROM `ap_items`");
    } else {
        header('Location: index.php');
    }
}

if (isset($_POST['selecteditem'])) {
    if (ctype_digit($_GET['id'])) {
        $id_raw = trim(htmlentities($_GET["id"]));
        $id_secure = $mysqli->real_escape_string($id_raw);
        $result = $mysqli->query("SELECT * FROM `ap_items` WHERE `id` = $id_secure ");
        $row = $result->fetch_assoc();
        $search = $mysqli->query("SELECT * FROM `ap_items`");
    } else {
        header('Location: index.php');
    }
}


if (is_null($id_raw)) {
    header('Location: index.php');
}

// calculate winrate/pickrates
	// NumberOfGames
	$numberOfGames = $mysqli->query("select * from matches");
        echo $mysqli->error;
	$patchMatches = array();
	$patchMatches['511'] = 0;
	$patchMatches['514'] = 0;
	while ($patch = $numberOfGames->fetch_assoc()) {
		$patchMatches[$patch['patch']] = max($patch['numberOfGames'], 1);
	}
	
// rates
	$query = $mysqli->query("select * from ap_items where id = " .$id_secure)->fetch_assoc();
	//
	$rates['pickrate511Normal'] = $query['pickraten511'] / (10*$patchMatches['patch511']);
	$rates['pickrate511Ranked'] = $query['pickrate511'] / (10*$patchMatches['patch511ranked']);
	$rates['pickrate514Normal'] = $query['pickraten514'] / (10*$patchMatches['patch514']);
	$rates['pickrate514Ranked'] = $query['pickrate514'] / (10*$patchMatches['patch514ranked']);
	
	$rates['winrate511Normal'] = $query['winraten511'] / max(1, $query['pickraten511']);
	$rates['winrate511Ranked'] = $query['winrate511'] / max(1, $query['pickrate511']);
	$rates['winrate514Normal'] = $query['winraten514'] / max(1, $query['pickraten514']);
	$rates['winrate514Ranked'] = $query['winrate514'] / max(1, $query['pickrate514']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <title>Riot Project v2 - <?php echo $row['name']; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/game.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <link id="data-uikit-theme" rel="stylesheet" href="js/tip/uikit.docs.min.css">
        <script src="js/tip/jquery.js"></script>
        <script src="js/tip/uikit.min.js"></script>
        <script src="js/tip/tooltip.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="full">

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
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="game.php">Game</a>
                        </li>
                        <li>
                            <a href="game.php?showHighscore">High Score</a>
                        </li>      
                        <li>
                            <a href="export.php">Export Data</a>
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
                    <h1><?php echo $row['name']; ?></h1>
                    <p><?php
                        $getItem = json_decode($items, true);
                        foreach ($getItem['data'] as $key => $val) {
                            if ($key == $itemid) {
                                echo $val['plaintext'];
                            }
                        }
                        ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 text-center">
                    <div class="patchtitle"></div>
                    <div class="box">
                        <div class="pickrate">Pick Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal"><?php echo round($rates['pickrate511Ranked']*100, 2); ?>%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrow<?php echo ($rates['pickrate511Ranked'] < $rates['pickrate514Ranked'] ? "up" : "down"); ?>"> </div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 	5.14</div>
                                <div class="percentgeranked"><?php echo round($rates['pickrate514Ranked']*100,2); ?>%</div>
                            </div>                                    
                        </div>
                    </div> 
                    <div class="box">
                        <div class="pickrate">Win Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal"><?php echo round($rates['winrate511Ranked']*100, 2); ?>%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrow<?php echo ($rates['winrate511Ranked'] < $rates['winrate514Ranked'] ? "up" : "down"); ?>"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked"><?php echo round($rates['winrate514Ranked']*100, 2); ?>%</div>
                            </div>                                    
                        </div>
                    </div>                      
                </div>
                <div class="col-lg-6 text-center">
                    <div class="requireitems">
                       <img class="img-circle" title="<?php echo $row['name']; ?>" data-uk-tooltip src="images/item/<?php echo $itemid; ?>.png" alt=""/>
                    </div>
                    <?php
                    foreach ($getItem['data'] as $key => $val) {
                        if ($key == $itemid) {
                            echo "<div class=\"requireitems\">";
                            if (isset($val['from'])) {
                                foreach ($val['from'] as $ky) {
                                    $vall = $getItem['data'][$ky];
                                    $keyy = $ky;
                                    echo "<a class=\"mainitems\" href=\"?id={$keyy}\"><img class=\"img-circle\" title=\"{$vall['name']}\" data-uk-tooltip  src=\"images/item/$ky.png\" alt=\"\"/></a>";
                                }
                            }
                            echo "</div>";
                        }
                    }
                    ?> 
                    <div class="table-striped" style="margin-top:10px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Patch/Type</th>
                                    <th class="text-center">Ability Power</th>
                                    <th class="text-center hidden-xs">Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $patch511a = file_get_contents("patch511.json");
                                $getpatch511a = json_decode($patch511a, true);
                                foreach ($getpatch511a as $key => $val) {
                                    if ($getpatch511a[$key]['id'] == $id_secure) { 
                                        ?>
                                <tr>
                                    <td class="text-center">Patch 5.11</td>
                                    <td class="text-center"><?php echo $getpatch511a[$key]['ap']; ?></td>
                                    <td class="text-center hidden-xs"><?php echo $getpatch511a[$key]['cost']; ?></td>
                                </tr>                                      
                                <?php
                                    }
                                }
                                ?>
                                <?php
                                $patch514a = file_get_contents("patch514.json");
                                $getpatch514a = json_decode($patch514a, true);
                                foreach ($getpatch514a as $key => $val) {
                                    if ($getpatch514a[$key]['id'] == $id_secure) { 
                                        ?>
                                <tr>
                                    <td class="text-center">Patch 5.14</td>
                                    <td class="text-center"><?php echo $getpatch514a[$key]['ap']; ?></td>
                                    <td class="text-center hidden-xs"><?php echo $getpatch514a[$key]['cost']; ?></td>
                                </tr>                                      
                                <?php
                                    }
                                }
                                ?>                            
                            </tbody>
                        </table>
                    </div>  
                    Popular on
                    <table class="table table-full-width custum-table">
                        <tbody>
                            <tr>
                                <?php
                                $chmp3 = 0;
                                    $query = $mysqli->query("SELECT champs.pic, champs.name from commonItems, ap_items, champs where commonItems.item_id = ap_items.id and champs.id = commonItems.champ_id and commonItems.item_id = " .(int)$_GET['id'] ."  order by commonItems.count desc limit 5");
                                    while ($row = $query->fetch_assoc()) {
                                        if ($chmp3 == 3 || $chmp3 == 4){
                                       ?>                                
                                        <td class="text-center hidden-xs">
                                        <img id="item1Opponent"  title="<?php echo $row['name']; ?>" data-uk-tooltip class="img-responsive img-rounded" width="70" height="70" src="images/chmpions/<?php echo $row['pic']; ?>" alt="">
                                        </td>
                                    <?php
                                        }
                                    else{
                                        ?>
                                        <td class="text-center">
                                        <img id="item1Opponent"  title="<?php echo $row['name']; ?>" data-uk-tooltip class="img-responsive img-rounded" width="70" height="70" src="images/chmpions/<?php echo $row['pic']; ?>" alt="">
                                        </td> 
                                    <?php
                                    
                                    }
                                    $chmp3++;
                                    }
                                    ?>
                            </tr> 
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="patchtitle2"></div>
                    <div class="box">
                        <div class="pickrate">Pick Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal"><?php echo round($rates['pickrate511Normal']*100,2); ?>%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrow<?php echo ($rates['pickrate511Normal'] < $rates['pickrate514Normal'] ? "up" : "down"); ?>"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked"><?php echo round($rates['pickrate514Normal']*100,2); ?>%</div>
                            </div>                                    
                        </div>
                    </div> 
                    <div class="box">
                        <div class="pickrate">Win Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal"><?php echo round($rates['winrate511Normal']*100,2); ?>%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrow<?php echo ($rates['winrate511Normal'] < $rates['winrate514Normal'] ? "up" : "down"); ?>"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked"><?php echo round($rates['winrate514Normal']*100,2); ?>%</div>
                            </div>                                    
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <!-- /.footer -->
        <div class="container">
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <hr />
                        <p>Project Name isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &copy; Riot Games, Inc.</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'top'});
        </script>
        <script src="js/bootstrap-select.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('select').selectpicker();
            });
        </script>
    </body>

</html>
