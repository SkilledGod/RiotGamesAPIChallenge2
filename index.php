<?php
include 'db.php';
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
        <title>AP Arena</title>

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
        <link href="css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    </head>     

    <body class="full">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">AP Arena</a>
                </div>
                <!-- Search -->
                <form action="item.php" method="get" class="navbar-form navbar-left hidden-sm hidden-xs">
                    <div class="form-group">
                        <select title='Search For Item From Here...' name='id' data-live-search="true" data-size="5" data-width="250px" class="selectpicker">
                            <?php
                            $search = $mysqli->query("SELECT * FROM `ap_items`");
                            $getItem = json_decode(file_get_contents("json/item.json"), true);
                            while ($row2 = $search->fetch_assoc()) {
                                foreach ($getItem['data'] as $key => $val) {
                                    if ($key == $row2['id']) {
                                    echo " <option label=\"{$row2['id']}\" value=\"{$row2['id']}\" data-content=\"<img class='img-circle' src='images/item/{$row2['id']}.png' width='20' height='20' alt='{$row2['name']}' /> {$row2['name']}\"> </option> \n";                                       
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
                    <h1>Items</h1>
                    <p>Click on item to see the Note for <code> Patch 5.11</code> and <code> Patch 5.14</code></p>
                </div>
                <div class="col-lg-12">
                    <?php
		$result = $mysqli->query("SELECT * FROM `ap_items`");
		while ($row = $result->fetch_assoc()) {
                                ?>
                                <a href="item.php?id=<?php echo $row['id']; ?>">
                                    <img class="img-circle" style="padding:9px;" data-uk-tooltip  title="<?php echo $row['name']; ?>" src="images/item/<?php echo $row['id'] ?>.png" alt="" />
                                </a>
                                <?php
                    }
                    ?> 
                </div>
            </div>


            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <hr />
                        <p>AP Arena isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &copy; Riot Games, Inc.</p>
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
        <script src="js/bootstrap-select.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('select').selectpicker();
            });
        </script>
    </body>

</html>
