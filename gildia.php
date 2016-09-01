<?php
	require 'config/config.php';
	header('Content-Type: text/html; charset=utf-8');	
	if(!isset($_GET['gildia'])){
		echo "Bra guilds";
	}
?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
	<LINK REL="SHORTCUT ICON" HREF="favicon.ico">
	
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5680559180b3f6b235f95d7b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<!--End of Tawk.to Script-->
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/logo.png" width="350px" height="200px"></img></a>
			</div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					 <li class="page-scroll">
                        <a href="#page-top">Strona Główna</a>	
                    </li>
					<li class="page-scroll">
                        <a href="#ranking">Ranking</a>
                    </li>
					<li class="page-scroll">
                        <a href="#jakpolaczycsie">Jak grać?</a>
                    </li>
					<li class="page-scroll">
                        <a href="#ostSmierci">Ostatnie smierci</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Sklep</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Forum</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
						<div class="gpinfo">
							<div class="jumbotron">
								<div class="row">
<?php
$guild = addslashes(htmlspecialchars(mysql_real_escape_string($_GET['gildia'])));
$isset_guild = mysql_query("SELECT * FROM `guilds` WHERE `tag`='$guild' OR `name`='$guild'");

if(mysql_num_rows($isset_guild) > 0) {
	$res1 = mysql_fetch_row($isset_guild);
	$tag = $res1[2];
	$nazwa = $res1[1];
	$regiores = mysql_fetch_row(mysql_query("SELECT * FROM `regions` WHERE `name`='$nazwa'"));
	$size = $regiores[2];
}
?>
									<div class="col-lg-4">
										<?php echo ("<h4>Gildia:".$nazwa."[".$tag."]</h4>");?>
										<br>
										<div class="table-responsive">
										<table class="table table-hover">
											<tr>
												<td>Właściciel:</td><td><?php echo ($res1[3]);?></td>
											</tr>
											<tr>
												<td>Punkty:</td><td><?php echo ($res1[8]);?></td>
											</tr>
											<tr>
												<td>Wielkosc:</td><td><?php echo ($size."x".$size);?></td>
											</tr>
											<tr>
												<td>Założona:</td><td><?php echo (date("H:i d-m-Y", $res1[11]/1000));?></td>
											</tr>
											<tr>
												<td>Ważna do:</td><td><?php echo (date("H:i d-m-Y", $res1[12]/1000));?></td>
											</tr>
										</table>
										</div>
									</div>
									<div class="col-lg-4">
										<h4>Członkowie gildi:</h4>
										<div class="scrolelguilds">
											<table class="table table-hover">
											<tbody>
											<?php
											$members = explode(',', $res1[6]);
											$count = count($members);
												if(!empty($res1[11])) {
													for($i=0; $i <= $count-2; $i++) {			
														echo '											
														<tr>
															<td style="height: 30px;width: 36px;" background="avatar/face.php?u='.$members[$i].'&s=36"><td>'.$members[$i].'</td>
														</tr>
														<tr style="height: 3px;"></tr>
														';
													}
												} else {
													echo 'brak';
												}
											?>
											  </tbody>
											</table>
										</div>
									</div>
									<div class="col-lg-4">
										
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Jesteśmy na :</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
					<div class="footer-col col-md-4">
                        <h3>Pozostale strony:</h3>
                        <ul class="list-inline">
                            <li>
                                <a></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; DragonHard 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

</body>

</html>
