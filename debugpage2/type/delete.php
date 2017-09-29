<HTML>
 <BODY>
  <?php
    require_once("../db_connect.php");

    try{
      //connect
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $stmt= $db->prepare("DELETE from users where IDm = :id");

      $stmt->execute([
        ':id' =>  $_GET['ID']
      ]);

      if(!$stmt->rowCount()){
        echo "このIDmは存在しません";
      }else{
        echo "row updated:". $stmt->rowCount()."<br/><br/>";
        echo "IDm:".$_GET['ID']."を削除しました。";
      }

      } catch (PDOException $e){   
         echo $e->getMessage();
         exit;
      }
      ?>

      <br><br>
  <FORM>
    <INPUT type="button" value="戻る" onClick="history.back()">
  </FORM>
 </body>
</html>
