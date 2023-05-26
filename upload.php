<?php include_once("./db.php");
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* form>div{
            margin: 10px auto;
            text-align: center;
            /* padding-left: 48%; */
        /* } */
        /* .con{
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap; */
        /* } */
        /* img{
            width: 300px;
            height:auto;
        }  */
    </style>
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
 <form action="./api/upload_api.php" method="post" enctype="multipart/form-data">
 <div>
    <input type="file" name="img" id="img">
 </div>
 <div>
    描述 : <input type="text" name="description" id="description">
 </div>
 <div>
     <input type="submit" value="submit">
 </div>
 </form>
 <div class="con">



<?php

$sql = "select * from `images`";
$imgs = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <td>mum</td>
        <td>img  </td>
        <td>name</td>
        <td>type</td>
        <td>size</td>
    </tr>
<?php
foreach($imgs as $idx =>$img ){
?>
    <tr>
        <td><?=$idx+1;?></td>
        <td><img src="./img/<?=$img['image'];?>" alt=""></td>
        <td><?=$img['img'];?></td>
        <td>
            <?php
            switch($img['type']){
                case 'image/jpeg':
                    echo "jpg";

                break;
                case 'image/png':
                    echo "png";
                break;
                case 'image/bmp':
                    echo "bmp";
                break;
                case 'image/gif':
                    echo "gif";
                break;
            }
            ?>
            
            
            </td>
        <td><?=$img['size'];?></td>
        <td>
            <button type="button">edit</button>
            <button type="button">del</button>
        </td>
    </tr>
<?php
}
?>



</table>

<?php
foreach($imgs as $img){
    echo "<img src ='./img/{$img['image']}'>";
}

?>
</div>

<!----建立一個連結來查看上傳後的圖檔---->  


</body>
</html>