<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <title>Riot Project v2 - Export Items Data</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/about.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--load font awesome-->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
                <div class="col-lg-12" style="margin-top:50px;">
                    <h1 class="text-center">Data Export</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:50px;">
                    <h3 class="text-left" style="color:#D9534F;">Challenge Topic</h3>
                    <p><a href="https://developer.riotgames.com/discussion/announcements/show/2lxEyIcE">The Riot Games API Challenge 2.0 (8/10 - 8/31)</a></p>
                </div>
            </div>   
            <div class="row">
                <div class="col-lg-12" style="margin-top:50px;">
                    <h3 class="text-left" style="color:#D9534F;">Data analyst</h3>
                    <p>This analyst was take from more than 300,000 match given from Riot Developer , You can download this matches by <code><a style="color:red;" href="https://s3-us-west-1.amazonaws.com/riot-api/api_challenge/AP_ITEM_DATASET.zip">Clicking Here</a></code> below information about the analyst matches</p>
                    <h4 style="margin-top:20px;color:#D9534F;" class="text-center">Patch 5.11</h4>
                    <div class="table-responsive" style="margin-top:10px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Server</th>
                                    <th class="text-center">Normal Matches</th>
                                    <th class="text-center">Ranked Matches</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Europe West</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>    
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Brazil</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Europe Nordic</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>      
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">Korea</td>
                                    <td class="text-center">6,207</td>
                                    <td class="text-center">7,475</td>
                                </tr>  
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">Latin American North</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="text-center">Latin American South</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="text-center">North America</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">9,994</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="text-center">Turkey</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">9,958</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="text-center">Oceania</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>  
                                 <tr>
                                    <td class="text-center">10</td>
                                    <td class="text-center">Russia</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td class="text-center" colspan="2">Total</td>
                                    <td class="text-center">96,207</td>
                                    <td class="text-center">97,427</td>
                                </tr>                                 
                            </tfoot>
                        </table>
                    </div>  
                    <h4 style="margin-top:20px;color:#D9534F;" class="text-center">Patch 5.14</h4>
                    <div class="table-responsive" style="margin-top:10px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Server</th>
                                    <th class="text-center">Normal Matches</th>
                                    <th class="text-center">Ranked Matches</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Europe West</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>    
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Brazil</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Europe Nordic</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>      
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">Korea</td>
                                    <td class="text-center">6,207</td>
                                    <td class="text-center">7,475</td>
                                </tr>  
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">Latin American North</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="text-center">Latin American South</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="text-center">North America</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="text-center">Turkey</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr> 
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="text-center">Oceania</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>  
                                 <tr>
                                    <td class="text-center">10</td>
                                    <td class="text-center">Russia</td>
                                    <td class="text-center">10,000</td>
                                    <td class="text-center">10,000</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td class="text-center" colspan="2">Total</td>
                                    <td class="text-center">96,207</td>
                                    <td class="text-center">97,427</td>
                                </tr>                                 
                            </tfoot>
                        </table>
                    </div>                     
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-left" style="color:#D9534F;">Download Data</h3>
                    <p><a href="#">Download Winrate/Picrate For Patch 5.11 (Normal)</a></p>
                    <p><a href="#">Download Winrate/Picrate For Patch 5.11 (Ranked)</a></p>
                    <p><a href="#">Download Winrate/Picrate For Patch 5.14 (Normal)</a></p>
                    <p><a href="#">Download Winrate/Picrate For Patch 5.14 (Ranked)</a></p>  
                </div>
            </div>            
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <hr />
                        <p>Copyright &copy; Riot Project v2</p>
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
