<?php

// ユーザーの一覧

require_once(__DIR__ . '/../../config/config.php');

try{
          //connect
          $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
          $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $stmt= $db->query("select * from icas_users"); //MySQLへの命令文
          $service=$db->query("select * from icas_area order by Area");
          $search=$db->prepare("select Place from icas_area where Area=?");
          $stmt2=$db->query("select count(*) from icas_users");
          //レコード件数取得
          //$row_count = $stmt->rowcount();
          $count = $stmt2 -> fetchColumn();

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
  
<!-- <link rel="stylesheet" href="../styles.css"> -->
  <link rel="stylesheet" href="../css/body.css">


<body>
<!-- コンテナ開始 -->
<div id="container">

<!-- ヘッダ開始 -->
<!-- ヘッダ開始 -->
<div id="header">
    【外部公開向けページ】(ICAS割り引き用)
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
</div>
<!-- ヘッダ終了 -->
<!-- サイドバーナビゲーション開始 -->
<div id="nav">
  <div id="container">
    エリアリスト <span class="fs12"></span>
    <ul>
      <?php foreach ($service as $area){
        echo $area['Area']."   ".$area['Place']."<br/>";
      }?>
     </ul>
  </div>
</div>
<!-- サイドバーナビゲーション終了 -->

<!-- メインカラム開始 -->
<div id="content">
    <h1>テーブル表示</h1>

      レコード件数：<?php echo $count; ?><br><br>
      Area検索
    <form action ="Area_show.php" method="get">
    Area:
      <input type="number" name="no" value="1">
      <INPUT TYPE = "SUBMIT" VALUE="検索">      
    </form><br>
      <table border="1">
      <tr><td>IDm</td><td>Area</td><td>Date</td><td>Place</td></tr>
 
      <?php 
        if($count!=0){
      foreach($rows as $row){
      ?>
    <tr>
      <td><?php echo htmlspecialchars($row['IDm'],ENT_QUOTES,'UTF-8'); ?></td>
      <td><?php echo $row['Area']; ?></td>
      <td><?php echo $row['Date']; ?></td>
      <?php $search->execute([$row['Area']]);
        $place=$search->fetchAll(PDO::FETCH_ASSOC);
        foreach($place as $row2){
          ?>
      <td><?php echo $row2['Place']; ?></td>
      <?php 
      }
      ?>
      
      <td>
        <form action ="delete2.php" method = "get">
          <input type ="submit" value ="削除する">
          <input type = "hidden" name ="IDm" value="<?=$row['IDm']?>">
          <input type = "hidden" name ="Area" value="<?=$row['Area']?>">
        </form>
       </td>
       
    </tr> 
      <?php 
        } 
        }
      ?>
      
      <script>
    function submitChk () {
        var flag = confirm ( "削除してもよろしいですか？\n\n削除したくない場合は[キャンセル]ボタンを押して下さい");
        return flag;
    }
</script>
<form method="post" action="delete.php" onsubmit="return submitChk()">
    <input type="submit" name="submit" value="icas割レコード全消去">
</form><br>
<form action = "area_delete.php" method ="get">
  <input type ="number" name ="Area" value = "1">
  <input type ="submit" value = "Area消去">
  </form>
 <br><br>
      <a href="../index.php">戻る</a></p>
</div>
<!-- メインカラム終了 -->

</div>
<!-- コンテナ終了 -->

</body>
</html>