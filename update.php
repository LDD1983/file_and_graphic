<?php include_once("./db.php");

$img = $pdo->query("select * from `images` where `id` = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
?>


<h1 class="header">重新上傳</h1>
 <!----建立你的表單及設定編碼----->
 <form action="./api/update_api.php" method="post" enctype="multipart/form-data">
 <div>
    <input type="file" name="img" id="img">
 </div>
 <div>
    描述 : <input type="text" name="description" id="description" value="<?=$img['description'];?>>
 </div>
 <div>
     <input type="hidden" name="id" value="<?=$img['id'];?>">
     <input type="submit" value="上傳">
 </div>
 </form>    