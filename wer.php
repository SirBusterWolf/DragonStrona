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
						<div class="szukacz">
						<form name="sentMessage" class="well" id="contactForm" method="POST">
						 <legend>Weryfikacja</legend>
							<div class="control-group">
								<div class="controls">
									<input type="text" class="form-control" placeholder="Nick" id="name" required data-validation-required-message="Proszę wpisz swój e-mail" />
								</div>
							 </div>   
							 <br>
							<center><div class="g-recaptcha" data-sitekey="6LfFjxUTAAAAAMCTY0fXu03t3183iZTG8qCIBf6N"></div></center>
							<br>
							<button type="submit" name ='wyslij' class="btn btn-primary pull-right">Wyślij</button><br />
						</form>
<?php
// jesli formularz został zgłoszony - przetwarzamy go
if(isset($_REQUEST['wyslij'])){
	echo '<br>';
	$sitekey='6LfFjxUTAAAAAFsDqB-Cqg4UDRswVE89koHcGWaX';
$responsex = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sitekey.'&response='.$_POST['g-recaptcha-response'].'');
$responsex = json_decode($responsex, true);
if($responsex["success"] === true){
	 echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Błąd!</strong>Weryfikacja poprawna.Zapraszam na serwer :) 
</div>';
}else{
    // actions if failed
	 echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Błąd!</strong>Nie zanzaczylec reCAPTCHA
</div>';
}
}
?>
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
