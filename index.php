<?php
	require 'config/config.php';
	header('Content-Type: text/html; charset=utf-8');	
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
						<div class="szukacz">
							<div class="form-group">
							  <label class="control-label"><h2 style="color: white;">Wyszukaj gracz/gildie</h2></label>
							  <form name="sentMessage" id="contactForm" method="POST">
									<div class="control-group">
										<div class="controls">
											<input type="text" name="imputwyszuka" class="form-control" placeholder="Nick" id="name" required data-validation-required-message="Proszę wpisz swój e-mail" />
										</div>
									 </div>   
									 <br>
									<button type="submit" name ='wyslij' class="btn btn-success pull-center">Wyszukaj</button><br />
								</form>
								<?php
								if(isset($_POST['wyslij'])) {
									$nick = addslashes(htmlspecialchars(mysql_real_escape_string($_POST['imputwyszuka'])));
									$isset_player = mysql_query("SELECT * FROM `users` WHERE `name`='$nick'");
									
									$guild = addslashes(htmlspecialchars(mysql_real_escape_string($_POST['imputwyszuka'])));
									$isset_guild = mysql_query("SELECT * FROM `guilds` WHERE `tag`='$guild' OR `name`='$guild'");
									
									if(mysql_num_rows($isset_player) > 0) {
										print("Gracz");
									}else if(mysql_num_rows($isset_guild) > 0) {
										print("Gildia");
									}else{
										print("Nie ma takiego fgracz/gildi na serwerze");
									}
								}
								?>
							</div>
						</div>
						<div id="scrolmm">
						<h4>Skrolij do dołu po wiecej</h4>
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="ranking">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ranking</h2>
					<br>
                </div>
				<div class="col-lg-4 col-lg-offset-2">
                    <p>Top Graczy</p>
					<table class="table table-striped table-hover ">
					<thead>
						<tr>
						  <th></th>
						  <th>Nick</th>
						  <th>PKT</th>
						</tr>
					 </thead>
						<?php
						$result1 = mysql_query("SELECT * FROM `users` ORDER BY points DESC LIMIT 10"); 
						$result1_nolimit = mysql_query("SELECT * FROM `users`");
						$result1_count = mysql_num_rows($result1_nolimit);
						$umiejsce= 1;
							if($result1_count > 0) {
								while($res1 = mysql_fetch_row($result1)) {
									$nick = $res1[1];
									$guild = mysql_query("SELECT * FROM `guilds` WHERE `members` LIKE '%,$nick,%' OR `members` LIKE '$nick,%' OR `members` LIKE '%,$nick' OR `members` = '$nick'");
									
									if(mysql_num_rows($guild) > 0) {
										$gres = mysql_fetch_row($guild);
										$gildia = strtoupper($gres[2]);
									} else {
										$gildia = 'BRAK';
									}
						?>
								<tr align="left" valign="middle"><td width="10px"><img src="avatar/face.php?u=<?php echo $res1[1]; ?>&s=30"></td><td><?php echo $umiejsce; ?>. <?php echo $res1[1]; ?></td><td> <?php echo $res1[2]; ?> pkt.</td></tr>

						<?php
								$umiejsce++;
								}
							} else {
							echo 'BRAK GRACZY!';
							}
						?>
					</table>
                </div>
                <div class="col-lg-4">
                    <p>Top gildi</p>
					<table class="table table-striped table-hover ">
					<thead>
						<tr>
						  <th></th>
						  <th>Nick</th>
						  <th>PKT</th>
						</tr>
					</thead>
					<?php
					$result2 = mysql_query("SELECT * FROM `guilds` ORDER BY points DESC LIMIT 10"); 
					$result2_nolimit = mysql_query("SELECT * FROM `guilds`");
					$result2_count = mysql_num_rows($result2_nolimit);
					$gmiejsce= 1;
						if($result2_count > 0) {
							while($res2 = mysql_fetch_row($result2)) {
						?>
							<tr align="left" valign="middle"><td width="10px"><img src="avatar/face.php?u=<?php echo $res2[3]; ?>&s=30"></td><td><?php echo $gmiejsce; ?>.[<?php echo $res2[2]?> ] <?php echo $res2[1]; ?></td><td> <?php echo $res2[8]; ?> pkt.</td></tr>

						<?php
						 $gmiejsce++;
							}
						} else {
							echo 'BRAK GILDII!';
						}
						?>
					</table>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
	
	<section id="jakpolaczycsie" class="success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Jak grać ? </h2>
					<br>
                </div>
                <div class="col-lg-10">
					<button type="button" class="btn btn-success" aria-label="Left Align">
					  15 
					</button>
					 graczy aktualnie na serwerze
					<p><ol><li>Aby do nich dołączyć wystarczy tylko kilka sekund!
					<li>Przejdź do zakładki „Multiplayer” a następnie kliknij w przycisk „Dodaj serwer”,
					<li>Przepisz adres IP ( dragonhard.pl ) w odpowiednie miejsce,
					<li>Połącz się z serwerem i ciesz się razem z nami!</ol></p>
                </div>
				 <div class="col-lg-2">
					<i class="fa fa-gamepad fa-8x"></i>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
	 <section id="ostSmierci">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ostatnie Smierci</h2>
					<br>
					<br>
                </div>
                <div class="col-lg-12">
					 <div id="skiny">
					 <?php
						$smiercv = mysql_query("SELECT * FROM `hard_playersdeth` ORDER BY id ASC LIMIT 10"); 
						$smiercv_limit = mysql_query("SELECT * FROM `hard_playersdeth`");
						$smiercivout = mysql_num_rows($smiercv_limit);
							if($smiercivout > 0) {
								while($res1 = mysql_fetch_row($smiercv)) {
									$nick = $res1[1];
									echo('<li><a class="tooltips" href="#"><img src="avatar/face.php?u='.$nick.'&s=80">
							<span>'.$nick.'</span></a></li>');
								}
							} else {
							echo 'BRAK SMIERCI!';
							}
						?>
					</div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
	
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

</body>

</html>
