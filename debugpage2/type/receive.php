<HTML>
 <BODY>
  <?php
    require_once("../db_connect.php");

    try{
      //connect
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $DAte = date('Y/n/j');
      $DateOut = date('Y')."/".date('n')."/".date('j');
      $TIme = date('H:i:s');

      $stmt= $db->prepare("UPDATE users set access= access+1, Node=:node where IDm = :id");

      $stmt->execute([
        ':node'=> $_GET['node'],
        ':id' =>  $_GET['ID']    
      ]);

      $stmt2= $db->prepare("SELECT * from users");      //where IDm = :id"
      $stmt2->execute([$_GET['ID']]);
      
      foreach($stmt2 as $row){
        if($_GET['ID']==$row['IDm']){
          echo "IDm:".$row['IDm']."は".$row['access']."回目のアクセスです。<br/><br/>";
          echo "前回の時間は ".$row['Date']." ".$row['Time']." です。<br/><br/>";
        echo $DateOut;
        }
      }
      echo "ノード番号は ".$_GET['node']."です。";
     
        
      $stmt3= $db->prepare("UPDATE users set Date = :DAte , Time = :TIme where IDm = :id");

      $stmt3->execute([
          ':DAte' => $DAte,
          ':TIme' => $TIme,
        ':id' => $_GET['ID']
      ]);


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
