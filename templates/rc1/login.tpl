<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RadioCloud - Cloud Radio Automation System</title>
        <link rel="shortcut icon" href="img/favicon.ico">

        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,400,700" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
        <link rel="stylesheet" href="css/font-awesome-animation.min.css">

    </head>
    <body>
        <div id="container" class="cls-container">
            
            <div class="lock-wrapper">
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="img/login.png" class=" faa-float faa-slow animated"/>                           
                        

 </div>
                    <h4 class="login_title">RadioCloud {{RC_VERSION}}</h4>
                    <p class="text-center">Identifika zaitez sisteman</p>
                    <div class="row">
                        <form action="index.php" class="form-inline" method="post">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label class="text-muted">Erabiltzailea</label>
                                    <input id="signupInputEmail1" type="text" placeholder="Sartu zure erabiltzailea" class="form-control" name="user" required />
                                </div>
                                <div class="text-left">
                                    <label for="signupInputPassword" class="text-muted">Pasahitza</label>
                                    <input id="signupInputPassword" name="password" type="password" placeholder="Eta hemen pasahitza" class="form-control lock-input" required />
                                </div>
                            
                                <button type="submit" class="btn btn-block btn-info">
                                Sartu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!--===================================================-->
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    </body>
</html>