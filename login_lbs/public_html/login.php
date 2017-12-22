<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Login();

$app->run();

// echo "login screen";
// exit;

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Log In</title>
 <!-- <link rel="stylesheet" href="styles.css">
-->
 <!-- Bootstrap -->
 <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Loading Flat UI -->
  <link href="css/bootstrap/css/img/flat-ui.css" rel="stylesheet">
  <link href="css/bootstrap/css/img/demo.css" rel="stylesheet">




</head>





<body>
<div class="login">
  <div id="container">
   <div class="login-screen">
    <div class="login-icon">
     <img src="icon.png" alt="Welcome to Mail App" />
        <h4>Welcome</h4>
    </div>
    <div class="login-form">
     <div class="form-group">
    <form action="" method="post" id="login">
      <p>
        <input type="text" class="form-control login-field" name="email" placeholder="email" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>">
        <label class="login-field-icon fui-user" for="login-name"></label>
      </p>
      </div>

      <div class="form-group">
      <p>
        <input type="password" class="form-control login-field" name="password" placeholder="password">
        <label class="login-field-icon fui-lock" for="login-pass"></label>
      </p>
      </div>
      <a class="login-link" href="signup.php">登録してない方はこちら</a>
      <p class="err"><?= h($app->getErrors('login')); ?></p>
      <div class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('login').submit();">Log In</div>
<!--      <p class="fs12"><a href="/signup.php">Sign Up</a></p> -->
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
     </div>
   </div>
  </div>
</div>
</body>
</html>