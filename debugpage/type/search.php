<?php
  require_once("../db_connect.php");

  try{
  //connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt= $db->prepare("select IDm from users where IDm = ?");
    $stmt->execute([$_GET['ID']]);
        
    $users=$stmt->fetchAll(PDO::FETCH_ASSOC); 
    foreach($users as $user){
      var_dump($user);
      echo "<br />";
    }
        
    echo "<br />".$stmt->rowCount()."records found.";      

    } catch (PDOException $e){   
      echo $e->getMessage();
      exit;
    }
?>

<HTML>
 <BODY>
   <br><br> 
    <FORM>
      <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM>
  </body>
</html>
