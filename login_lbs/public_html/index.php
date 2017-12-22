<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Index();

$app->run();

// $app->me()
// $app->getValues()->users

?>



<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="utf-8">
  <title>Home</title>
  <!--
  <link rel="stylesheet" href="styles.css">
-->
 <!-- <link rel="stylesheet" href="css/body.css">
  -->

  <!-- Bootstrap -->
 <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Loading Flat UI -->
  <link href="css/bootstrap/css/img/flat-ui.css" rel="stylesheet">
  <link href="css/bootstrap/css/img/demo.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/bootstrap/css/main.css" rel="stylesheet">

<!-- Fonts from Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
</head>



<body>
<!-- コンテナ開始 -->
<div id="container">
  
  
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><b>ICAS割引管理者ページ</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><form action="logout.php" method="post" id="logout">
               <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            </form></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>  
    </div>
    
 
<!-- ヘッダ開始 -->
   <!--
<div id="header">
    【外部公開向けページ】(ICAS割り引き用)
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
</div>
-->


<!-- ヘッダ終了 -->



<!-- メインカラム開始 -->
<div id="content">
p,
<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xs-6"/>
					<h1>ICAS割引利用者登録</h1>
					<form class="form-inline" role="form" action ="icas_discount/register.php" method="get">
					  <div class="form-group">
               <input type= "number" name ="Area" value="1">
					    <input type= "text" class="form-control" NAME="IDm" placeholder="Write your IDm">
					  <button type="submit" class="btn btn-warning btn-lg" VALUE="登録">登録</button>
            </div>
            </form>	
            <h1>Area登録</h1>
            <form class="form-inline" role="form" action ="icas_discount/area_register.php" method="get">
					  <div class="form-group">
               <input type= "number" name ="Area" value="1">
					    <input type= "text" class="form-control" NAME="Place" placeholder="Write your Place">
					  <button type="submit" class="btn btn-warning btn-lg" VALUE="登録">登録</button>
            </div>
            </form>			
				</div><!-- /col-lg-6 -->
       
				<div class="col-lg-5 col-xs-5">
					<img class="img-responsive" src="ICAS.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->

<div class="container">
        <div class="col-lg-6 col-xs-6">
          <div class="tile">
            <img src="clipboard.svg" alt="Compas" class="tile-image big-illustration">
            <h3 class="tile-title">ICAS割利用者一覧</h3>
            <p></p>
            <a class="btn btn-primary btn-large btn-block" href="icas_discount/show.php">Go List</a>
          </div>
        </div>

        <div class="col-lg-6 col-xs-6">
          <div class="tile">
            <img src="pencils.svg" alt="Infinity-Loop" class="tile-image">
            <h3 class="tile-title">Loginユーザ一覧</h3>
            <p></p>
            <a class="btn btn-primary btn-large btn-block" href="icas_discount/loginuser.php">Go List</a>
          </div>
        </div>
</div>





  
</div>
<!-- メインカラム終了 -->

</div>
<!-- コンテナ終了 -->

</body>
</html>