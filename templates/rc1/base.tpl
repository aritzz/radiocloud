<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{RADIONAME}} :: {{RADIODESCRIPTION}}</title>
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

 
        <link href="css/jquery-steps.min.css" rel="stylesheet">
        <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome-animation.min.css">
        <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
        <link href="plugins/summernote/summernote.min.css" rel="stylesheet">
        <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
        <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        
    </head>
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!-- NABIGAZIO BARRA -->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--LOGOA -->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">
                        <!--   <i class="fa fa-cloud faa-float animated brand-icon"></i>-->
                            <i class="fa fa-cloud brand-icon"></i>
                            <div class="brand-title">
                                <span class="brand-text">{{RADIONAME}}</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--GOIKO KONTUK-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"><i class="fa fa-navicon fa-lg"></i></a>
                            </li>
                            {{CONFIG_WHEEL}}
                            {{MESSAGES}}    
                            {{PLAYING}}
                            {{NOTIFICATIONS}}
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            {{USER_PROFILE}}
                        </ul>
                    </div>
                    <!--================================-->
                    <!-- GOIKUK BUKAERA -->
                </div>
            </header>
            <!--===================================================-->
            <!-- NABIGAZIO BARRA BUKAERA -->
            <div class="boxed">
                <!-- EDUKIAREN HASIERA -->
                <!--===================================================-->
                <div id="content-container">
                    {{CURRENT_LOCATION}}
                    <div id="page-content">
                       {{CONTENT}}
                    </div>
                </div>
                <!--===================================================-->
                <!-- EDUKIAREN BUKAERA -->
                <!-- NABIGAZIOA-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <div id="mainnav">

                        {{MAIN_MENU}}

                    </div>
                </nav>

                {{ASIDE}}

                {{CHAT}}

            </div>
            <!-- BEHEKALDEA -->
            <!--===================================================-->
            <footer id="footer">
              {{FOOTER}}
            </footer>
            <!--===================================================-->
            <!-- BEHEKALDE BUKAERA -->
            
            <!-- GORA JOAN -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- EDUKIAREN BUKAERA  -->

        <!--JAVASCRIPTAK-->
        <!--=================================================-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>

        <script src="js/bootstrap.min3.js"></script>
                <script src="js/scripts.js"></script>

        <script src="plugins/fast-click/fastclick.min.js"></script>
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
        <script src="plugins/parsley/parsley.min.js"></script>
        <script src="plugins/parsley/i18n/eu.js"></script>
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="plugins/screenfull/screenfull.js"></script>
        <script src="js/radiocloud/wizard.js"></script>
        <script src="js/radiocloud/form-wizard.js"></script>
        <script src="plugins/fooTable/dist/footable.all.min.js"></script>
        <script src="js/radiocloud/tables-footable.js"></script>
        <script src="plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script src="plugins/fullcalendar/lib/moment.min.js"></script> 
        <script src="plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script> 
        <script src="plugins/fullcalendar/fullcalendar.min.js"></script> 
        <script src="plugins/fullcalendar/lang-all.js"></script> 
        <script src="plugins/dropzone/dropzone.min.js"></script>
        <script src="plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
        <script src="js/radiocloud/fullcalendar.js"></script> 
        <script src="js/radiocloud/live.js"></script>
        <script src="plugins/summernote/summernote.min.js"></script>
        <script src="js/radiocloud/dropak.js"></script>
        <script src="plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="js/radiocloud/tables-datatables.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/radiocloud/console.js"></script>
        <script src="js/radiocloud/init.js"></script>
    </body>
</html>