<HTML>
 <BODY>
  <?php
    require_once(__DIR__ . '/../../config/config.php');

    try{
      //connect
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $area=$_GET['Area'];
	  $stmt= $db->prepare("DELETE from icas_area where Area = '$area'");
      $stmt->execute();

      if(!$stmt->rowCount()){
        echo "このAreaは存在しません";
      }else{
        echo "row updated:". $stmt->rowCount()."<br/><br/>";
        echo "削除しました。";
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