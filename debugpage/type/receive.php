<HTML>
  <BODY>
    <?php
       require_once("../db_connect.php");

       try{
        //connect
        $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt= $db->prepare("insert into users (IDm) values(?)");
        $stmt->execute([$_GET['ID']]);
        echo "inserted:". $db->lastInsertId();

       } catch (PDOException $e){   
         echo $e->getMessage();
         exit;
       }
       ?>

       <br><br>
       <?php 
       print ($_GET['ID']);
       ?>
       を受け取りました。<br><br>
    
    <FORM>
      <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM>
  </body>
</html>
