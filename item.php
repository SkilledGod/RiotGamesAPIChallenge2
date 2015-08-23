<?php
include 'db.php';
$itemid = strip_tags(htmlspecialchars($_GET['id']));
$result = $mysqli->query("SELECT * FROM `ap_items` WHERE `id` = $itemid ");
$row = $result->fetch_assoc();
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

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
                <form action="result.php" method="get" class="navbar-form navbar-left hidden-sm hidden-xs" role="search">
                    <div class="form-group">
                        <input class="form-control" style="width:250px;" placeholder="Item Name ..." type="text">
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
                            <a href="score.php">High Score</a>
                        </li>      
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
                    <h1><?php echo $row['name']; ?></h1>
                    <p><?php
                    $items = file_get_contents("item.json");
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
                                <div class="percentgenormal">99.22%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">2.22%</div>
                            </div>                                    
                        </div>
                    </div> 
                    <div class="box">
                        <div class="pickrate">Win Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal">99.22%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">2.22%</div>
                            </div>                                    
                        </div>
                    </div>   
                    <div class="box">
                        <div class="pickrate">Cost</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal">3500</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">3400</div>
                            </div>                                    
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-6 text-center">
                    <div class="requireitems">
                        <a href="#"><img class="img-circle" src="images/item/<?php echo $itemid; ?>.png" alt=""/></a>
                    </div>
                    <?php
                    foreach ($getItem['data'] as $key => $val) {
                        if ($key == $itemid) {
                            echo "<div class=\"requireitems\">";
                            if (isset($val['from'])) {
                                foreach ($val['from'] as $ky) {
                                    foreach ($getItem['data'] as $keyy => $vall) {
                                        if ($keyy == $ky) {
                                            echo "<a class=\"mainitems\" href=\"#\" title=\"{$vall['name']}\" data-toggle=\"popover\" data-placement=\"top\" data-content=\"{$vall['plaintext']}\"><img class=\"img-circle\" src=\"images/item/$ky.png\" alt=\"\"/></a>";
                                        }
                                    }
                                }
                            }
                            echo "</div>";
                        }
                    }
                    ?> 
                    <div class="table-responsive" style="margin-top:10px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Patch/Type</th>
                                    <th class="text-center">Ability Power</th>
                                    <th class="text-center">Picrate Normal/Ranked</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Patch 5.11</td>
                                    <td class="text-center">100%/100%</td>
                                    <td class="text-center">100%/100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Patch 5.14</td>
                                    <td class="text-center">100%/100%</td>
                                    <td class="text-center">100%/100%</td>
                                </tr>                            
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <div class="col-lg-3 text-center">
                    <div class="patchtitle2"></div>
                                        <div class="box">
                        <div class="pickrate">Pick Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal">99.22%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">2.22%</div>
                            </div>                                    
                        </div>
                    </div> 
                    <div class="box">
                        <div class="pickrate">Win Rate</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal">99.22%</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">2.22%</div>
                            </div>                                    
                        </div>
                    </div>   
                    <div class="box">
                        <div class="pickrate">Cost</div>
                        <div class="threerate">
                            <div class="normalpick">
                                <div class="normaltitle">Patch 5.11</div>
                                <div class="percentgenormal">3500</div>
                            </div>
                            <div class="arrowpick">
                                <div class="arrowdown"></div>
                            </div>
                            <div class="rankedpick">
                                <div class="rankedtitle">Patch 5.14</div>
                                <div class="percentgeranked">3400</div>
                            </div>                                    
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <!-- /.footer -->
        <div class="container">
            <hr>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; Riot Project v2</p>
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
    </body>

</html>
