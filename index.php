<?php
require_once("_config.php");
require_once("_functions.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Strona z tagami i statystykami polskiej społeczności Steem.">
    <meta name="author" content="">

    <title># Polish Steem</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

<style>
.label, #label
{
	margin: 5px;
}

.forma
{
	margin: 5px;
}
</style>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/jquery.tagcloud.js"></script>
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="/">
        <span class="d-block d-lg-none">#Polish Steem</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/tags">Tagi</a>
          </li>
					<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/categories">Drzewo Tagów</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/users">Userzy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#info">Info</a>
          </li>
        </ul>
      </div>
    </nav>
		
		<div class="container-fluid p-0">

<?php

//simple pages management, look .htaccess
if($_GET['go'] != "")
	include("{$_GET['go']}.php");
else
	include("main.php");
?>

     <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="info">
        <div class="my-auto">
          <h2 class="mb-5">Informacje</h2>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              strona korzysta z bazy SBDS blockchainu Steem</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              tagi aktualne na dzień: <?php echo $wbazie;?> (aktualizacja co godzinę, lag zależny od dostawcy bazy)</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              autor: <a target="_blank" href="https://steemit.com/@rafalski">@rafalski</a></li>
          </ul>
        </div>
      </section>

</div>

    <!-- Bootstrap core JavaScript -->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
		
		<?php include('analytics.php');?>

  </body>

</html>
