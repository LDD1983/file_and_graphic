<?php include_once("../db.php");

echo $_POST['description'];
echo"<pre>";
print_r($_FILES['img']);
echo "</pre>";

if($_FILES['img']['error']==0){
    // $name = md5(strtotime('now'). $_FILES['img']['name']);
    // $tmp = explode('.',$_FILES['img']['name']);
    // $sub = ".".array_pop($tmp);
    // $_FILES['img']['name'] = '2022-05-29.pdf';  陣列元素 = 
    $name = $_FILES['img']['name'];
/////////////////////////////////////////////////////////////自訂檔名(md5)與副檔名 
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name);


    $sql = "insert into `images` (`image`,`description`,`type`,`size` ) 
    values ('$name','{$_POST['description']}'),'{$_FILES['img']['type']}','{$_FILES['img']['size']}'";

    $pdo->exec($sql);
    header("location:../upload.php");
}

?>