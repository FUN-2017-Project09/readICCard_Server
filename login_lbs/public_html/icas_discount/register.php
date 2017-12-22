<HTML>
 <BODY>
  <?php
  require_once(__DIR__ . '/../../config/config.php');
   try{
    //connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $DAte = date('Y-m-d H:i:s',strtotime("+17 hour"));
    $id=$_GET['IDm'];
    $area=$_GET['Area'];
    $search= $db->prepare("select Date from icas_users where IDm ='$id' and Area='$area'");
    $search->execute();
    $user=$search->fetchAll(PDO::FETCH_ASSOC); 
    $search2=$db->prepare("select * from icas_area where Area = '$area'");
    $search2-> execute();
    $se_area=$search2->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt1= $db->prepare("insert into icas_users (IDm,Area,Date) values(?,?,?)");
    $stmt2= $db->prepare("update icas_users set Date=cast(now() as datetime) where IDm='$id' and Area='$area'");
    
    if(!($se_area)){
        echo "エリア:".$area."は存在しません。";
    }else{
       if($user){
        if(date('Y/m/d',strtotime($DAte)) === date('Y/m/d',strtotime($user[0]['Date']))){
        echo "本日は割引済みです";
     }else{  
        $stmt2->execute();
        echo "IDm:".$id."を登録しました。<br/><br/>";
        echo "エリア番号は ".$area."です。";
     }
    }else{
        $stmt1->execute([$id,$area,$DAte]);
        echo "IDm:".$id."を登録しました。<br/><br/>";
        echo "エリア番号は ".$area."です。";
    }
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