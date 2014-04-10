<!DOCTYPE html>
<html lang="de">
<?php ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <title>Letteraner Bowling Trupp (LBT) </title>

<!-- CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
    <link href="assets/css/custom.css" rel="stylesheet">

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
        <!-- START SIDEBAR -->
            <?php include 'assets/pages/navigation/sidebar.php' ?>
        <!-- /SIDEBAR -->

        <!-- START CONTENT COL RIGHT -->
        <div class="column col-sm-10 col-xs-11" id="main">

        <!-- START TOP NAV -->
            <?php include 'assets/pages/navigation/topbar.php' ?>
        <!-- /TOP NAV -->

    <!-- START PADDING BOX -->
        <div class="padding">

            <!-- START FULL DIV -->
            <div class="full col-sm-9" id="contentdiv">
            <!-- START PAGE CONTENT -->
                <div class="row">

                <!-- START MAIN COL LEFT -->
                    <div class="col-sm-8" id="contentleft">

                <!-- START LEFT COL MODULES -->

                    <!-- START TEAMS VS -->
                        <?php include 'assets/pages/teamvs.php' ?>
                    <!-- /TEAMS -->


                        <!-- START CURRENT STATS -->
                        <?php include 'assets/pages/penalties.php' ?>
                        <!-- /CURRENT STATS -->

                <!-- /MAIN COL LEFT -->
                    </div>

                <!-- START MAIN COL RIGHT -->
                    <div class="col-sm-4" id="contentright">

                    <!-- START SET PRESENCE INFO -->
                        <?php include 'assets/pages/presence.php' ?>
                    <!-- /SET PRESENCE INFO -->


                    <!-- START CURRENT STATS -->
                    <?php include 'assets/pages/currentstats.php' ?>
                    <!-- /CURRENT STATS -->


                <!-- /MAIN COL RIGHT -->
                    </div>

            <!-- /PAGE CONTENT -->
                </div>

            <!-- /FULL DIV -->
            </div>
        <!-- /PADDING BOX -->
        </div>

        <!-- START FOOTER -->
            <footer class="footer text-right bottom pad">
                <?php include 'assets/pages/navigation/footer.php' ?>
            </footer>
        <!-- /FOOTER -->

        <!-- /CONTENT COL RIGHT -->
        </div>

    </div>
</div>
</div>

</div>
<!-- START LOGIN POPUP -->
    <?php include 'assets/pages/modallogin.php' ?>
<!-- /LOGIN POPUP -->


<!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery_1110.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
