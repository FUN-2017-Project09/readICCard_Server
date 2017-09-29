<?php
#http://noumenon-th.net/programming/2016/02/10/pdo_select/

  require_once("../db_connect.php");

  try{
    //connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if(empty($_POST)) {
      echo "<a href='delete.php'>delete.php</a>←こちらのページからどうぞ";
      exit();
    }else{
      if (!isset($_POST['id'])  || !is_numeric($_POST['id']) ){
        echo "IDエラー";
	exit();
      }else{
        $stmt= $db->prepare("delete from users (id) values(?)"); //MySQLへの命令文  
	  
	if($stmt){
	  //プレースホルダへ実際の値を設定する
	  $id = [$_POST['id']];
	  $stmt->bindValue(id, $id, PDO::PARAM_INT);
	  $stmt->execute();
   	  
	  //変更された行の数が1かどうか
	  if($stmt->affected_rows == 1){
	    echo "削除いたしました。";
	  }else{
	    echo "削除失敗です";
	  }
	}
     }
    }
  } catch (PDOException $e){
         echo $e->getMessage();
         exit;
       }
    ?>
