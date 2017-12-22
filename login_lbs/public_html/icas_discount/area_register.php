<html>
 <body>
  <?php
require_once(__DIR__ . '/../../config/config.php');
   try{
    //connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $area=$_GET['Area'];
    $Place=$_GET['Place'];
    $stmt= $db->prepare("insert into icas_area (Area,Place) values(?,?)");
    $stmt->execute([$area,$Place]);
    echo "Area:".$area." ".$Place."を登録しました。<br/><br/>";
    } catch (PDOException $e){
     echo $e->getMessage();
     exit;
    }
  ?>
  <FORM>
    <INPUT type="button" value="戻る" onClick="history.back()">
  </FORM>
 </body>
</html>