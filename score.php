<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <title>Riot Project v2 - High Score</title>

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
                    <h1 class="text-center">High Score</h1>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-12 text-center" style="margin-top:50px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Rank</th>
                                    <th class="text-center hidden-xs">Champion</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Score</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td class="text-center">Ahmed Safadi THe KING</td>
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
