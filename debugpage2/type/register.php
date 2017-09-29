<HTML>
 <BODY>
  <?php
   require_once("../db_connect.php");

   try{
    //connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $DAte = date('Y-n-d');
    $TIme = date('H:i:s');
    $stmt= $db->prepare("insert into users (IDm,Node,Date,Time) values(?,?,?,?)");

       
    $stmt->execute([$_GET['ID'],$_GET['node'],$DAte,$TIme]);
       

    echo "IDm:".$_GET['ID']."を登録しました。<br/><br/>";
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
