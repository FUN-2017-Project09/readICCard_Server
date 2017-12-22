<?php

// ユーザーの一覧

require_once(__DIR__ . '/../../config/config.php');

try{
          //connect
          $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
          $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $stmt= $db->query("select * from icas_users"); //MySQLへの命令文
        
          //レコード件数取得
          $row_count = $stmt->rowcount();

          foreach ($stmt as $row) {
	    $rows[] = $row;
	  }

/*
          //foreach文の別の書き方
          while($row = $stmt->fetch()){
            $rows[] = $row;
          }
*/
// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Index();

$app->run();

// $app->me()
// $app->getValues()->users

       } catch (PDOException $e){
         echo $e->getMessage();
         exit;
       }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Home</title>
 <!-- <link rel="stylesheet" href="../styles.css">-->
  <link rel="stylesheet" href="../css/body.css">
</head>

<body>
<!-- コンテナ開始 -->
<div id="container">

<!-- ヘッダ開始 -->
<div id="header">
    【外部公開向けページ】(ICAS割り引き用)
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
</div>
<div class="nav">

<ul class="nl clearFix">
<li><a href="#">HOME<span class="en">Menu1</span></a></li>
<li><a href="#">検索<span class="en">Menu2</span></a></li>
<li><a href="#">一覧表<span class="en">Menu3</span></a></li>
</ul>

</div>
<!-- ヘッダ終了 -->

<!-- サイドバーナビゲーション開始 -->
<div id="nav">
  <div id="container">
    エリアリスト <span class="fs12"></span>
    <ul>
     1 五稜郭<br>
     2 美原<br>
     3 エリア3<br>
    </ul>
  </div>
</div>
<!-- サイドバーナビゲーション終了 -->

<!-- メインカラム開始 -->
<div id="content">
<p class="fs14">&ensp;icas割利用</p>
    <form action ="register.php" method="get">
    ID送信 Area:
    <input type="radio" name="Area" value=1 checked="checked" />1
	<input type="radio" name="Area" value=2 />2
	<input type="radio" name="Area" value=3 />3
	<br>
      <INPUT TYPE = "text" NAME="IDm">
      <INPUT TYPE = "reset" NAME = "IDm" VALUE = "文字消去">
      <INPUT TYPE = "SUBMIT" VALUE="登録">      
    </form><br>
    
   
</div>
<!-- メインカラム終了 -->

</div>
<!-- コンテナ終了 -->

</body>
</html>