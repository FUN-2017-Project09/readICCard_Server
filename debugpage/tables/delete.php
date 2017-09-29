<?php
#http://noumenon-th.net/programming/2016/02/10/pdo_select/

  require_once("../db_connect.php");

       try{
          //connect
          $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
          $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $stmt= $db->query("select * from users"); //MySQLへの命令文
        
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

       } catch (PDOException $e){
         echo $e->getMessage();
         exit;
       }
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>テーブル表示</title>
      <meta charset="utf-8"> 
  </head>
  <body>
    <h1>テーブル表示</h1>

      レコード件数：<?php echo $row_count; ?>

      <table border="1">
      <tr><td>id</td><td>IDm</td><td>削除する</td></tr>
 
      <?php 
      foreach($rows as $row){
      ?>
    <tr> 
      <td><?php echo $row['id']; ?></td> 
      <td><?php echo htmlspecialchars($row['IDm'],ENT_QUOTES,'UTF-8'); ?></td> 
    <td>
	<form action="delete2.php" method="post">
	<input type="submit" value="削除する">
	<input type="hidden" name="id" value="<?=$row['id']?>">
	</form>
    </td>
    </tr>
      <?php 
        } 
      ?>
      <br><br>

    <FORM>
      <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM>
  </body>
</html>
