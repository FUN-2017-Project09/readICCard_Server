<HTML>
 <BODY>
  <?php
    require_once("../db_connect.php");

    try{
      //connect
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $stmt= $db->prepare("UPDATE users set access=0, Node=:node , Date=Null , Time = Null where IDm = :id");

      $stmt->execute([
        ':node'=> $_GET['node'],
        ':id' =>  $_GET['ID']
      ]);

      echo "IDm: ".$_GET['ID']."のアクセス回数をリセットしました。<br><br>";
      echo "ノード番号は ".$_GET['node']."です。";

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
