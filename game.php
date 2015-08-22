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
                        <li>
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
                    <h1>Game</h1>
                </div>
            </div>
            <div class="row" style="background-color: #202126;">
                <div class="col-lg-12 backgroundimg col-centered">
                    <form action="" method="get" class="form-horizontal" role="search" style="padding-top:100px;">
                        <div class="form-group">
                            <p class="col-sm-2 text-center">
                                Your Name
                            </p>
                            <div class="col-sm-3">
                                <input style="width:200px;margin:0 auto;" placeholder="Enter Your Name" class="form-control" required="" type="text">
                            </div>
                            <p class="col-sm-3 text-center" style="padding-top:10px;">
                                Champion
                            </p>
                            <div class="col-sm-2">
                                <select style="width:200px;margin:0 auto;" class="form-control" required="">
                                    <option style="background: url('images/chmpions/Zed.png') no-repeat;background-size: 25px 25px;" class="selectoptioon">Zed</option>
                                </select>
                            </div>   
                            <div class="col-sm-12 text-center" style="padding-top:50px;">
                                <button style="width:200px;margin:0 auto;font-size: 30px;" type="submit" class="btn btn-success">Start Game</button>
                            </div>                             
                        </div>
                    </form>
                </div>
                <hr>
                <p class="text-center">if he click start game this would show </p>
                <div class="col-lg-12 backgroundimg2 col-centered">
                    <div class="col-lg-3">
                        <div class="your">Summoner Name</div>
                        <div class="champpic">
                            <img class="absimg" src="images/chmpions/Zed.png" alt="" height="146" width="146">
                            <div class="champname">
                                Twisted Fate
                            </div>
                        </div>
                        <hr class="hrstyle">
                        Status
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/hp.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Health</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ad.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Damage</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ap.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Ability Damage</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/mr.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ar.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Armor</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Speed</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Movement Speed</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/bs.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span>200</span>
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
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr> 

                                <tr>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <div class="score">
                            <div class="yourscore"><span class="gradeitntext">0</span></div>
                            <div class="vsicon hidden-md hidden-sm hidden-xs hidden-print"></div>
                            <div class="topscore"><span class="gradeitntext2">51</span></div>
                        </div>
                        <div class="randomitems">
                            <hr class="hrstyle">
                            Click On One Item To Move It To Your Inventory <span style="float:right;">1/6</span>
                            <table class="table table-full-width custum-table">
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <img data-uk-tooltip title="<table class='table table-full-width custum-table2'><tr><td>Type</td><td>Patch 5.11</td><td>Patch 5.14</td><td>Change</td></tr><tr><td>Pickrate</td><td>50%</td><td>60%</td><td style='color:green;'><img src='images/arrowUp.png' width='8' height='8' alt=''/> 10%</td></tr><tr><td>Winrate</td><td>50%</td><td>60%</td><td style='color:green;'><img src='images/arrowUp.png' width='8' height='8' alt=''/> 10%</td></tr></table> <span style='color:red;'> NOTE </span><span style='font-size:9px;'> : This Analysis From Ranked Matches</span>" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                        <td class="text-center">
                                            <img data-uk-tooltip title="<table class='table table-full-width custum-table2'><tr><td>Type</td><td>Patch 5.11</td><td>Patch 5.14</td><td>Change</td></tr><tr><td>Pickrate</td><td>50%</td><td>60%</td><td style='color:green;'><img src='images/arrowUp.png' width='8' height='8' alt=''/> 10%</td></tr><tr><td>Winrate</td><td>60%</td><td>50%</td><td style='color:red;'><img style='margin-top:-2px;' src='images/arrowDown.png' width='8' height='8' alt=''/> 10%</td></tr></table>  <span style='color:red;'> NOTE </span><span style='font-size:9px;'> : This Analysis From Ranked Matches</span>" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                        <td class="text-center">
                                                <img data-uk-tooltip title="<table class='table table-full-width custum-table2'><tr><td>Type</td><td>Patch 5.11</td><td>Patch 5.14</td><td>Change</td></tr><tr><td>Pickrate</td><td>50%</td><td>60%</td><td style='color:green;'><img src='images/arrowUp.png' width='8' height='8' alt=''/> 10%</td></tr><tr><td>Winrate</td><td>60%</td><td>60%</td><td style='color:gray;'>0%</td></tr></table> <span style='color:red;'> NOTE </span><span style='font-size:9px;'> : This Analysis From Ranked Matches</span>" class="img-responsive img-rounded col-centered" src="images/item/NoItem.png" alt="">
                                        </td>
                                    </tr> 
                                </tbody>
                            </table> 
                            <div class="row">
                                <div class="col-sm-12 text-center" style="padding-top:50px;">
                                    <p class="text-center">if he finish pick all items</p>
                                    <button style="width:200px;margin:0 auto;font-size: 30px;" type="button" class="btn btn-success">Final Answer</button>
                                </div>
                                <div class="col-sm-12 text-center" style="padding-top:50px;">
                                    <p class="text-center">if he win</p>
                                    <div class="col-sm-3"><button style="margin: 0px auto; font-size: 15px; padding: 5px;" type="button" class="btn btn-success">Your AP : 520</button></div>
                                    <div class="col-sm-3"><button style="margin:0 auto;font-size: 15px;" type="button" class="btn btn-danger">Opponent AP : 420</button></div>
                                    <div class="col-sm-6"><button style="width: 150px;margin:0 auto;font-size: 15px;" type="button" class="btn btn-warning">Next Round</button></div>
                                </div>
                                <div class="col-sm-12 text-center" style="padding-top:50px;">
                                    <p class="text-center">if he lose</p>
                                    <div class="col-sm-3"><button style="margin:0 auto;font-size: 15px; " type="button" class="btn btn-danger">Your AP : 410</button></div>
                                    <div class="col-sm-3"><button style="margin:0 auto;font-size: 15px;" type="button" class="btn btn-success">Opponent AP : 600</button></div>
                                    <div class="col-sm-6"><button style="width: 150px;margin:0 auto;font-size: 15px;" type="button" class="btn btn-warning">Try Again ?</button></div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="opponentname"> Twisted Fate </div>
                        <div class="champpic">
                            <img class="absimg" src="images/chmpions/Zed.png" alt="" height="146" width="146">
                            <div class="champname">
                                Twisted Fate
                            </div>
                        </div>
                        <hr class="hrstyle">
                        Status
                        <table class="table table-full-width custum-table">
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/hp.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Health</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ad.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Damage</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ap.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Ability Damage</span>
                                        <br>
                                        <span>???</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/mr.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/ar.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Armor</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Attack Speed</span>
                                        <br>
                                        <span>200</span>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/as.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Movement Speed</span>
                                        <br>
                                        <span>579.4</span>
                                    </td>
                                    <td class="text-left">
                                        <img style="border:2px solid white;" class="img-responsive" src="images/bs.png" alt=""></td>
                                    <td class="text-left">
                                        <span>Magic Resist</span>
                                        <br>
                                        <span>200</span>
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
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr> 

                                <tr>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                    <td class="text-center">
                                        <img class="img-responsive img-rounded" src="images/item/NoItem.png" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>   

            </div>
            <!-- Footer -->
            <footer>
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
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'top'});
        </script>



    </body>
</html>
