<?php include_once("../db.php");

if($_FILES['img']['error']==0){
    // $name = md5(strtotime('now'). $_FILES['img']['name']);
    // $tmp = explode('.',$_FILES['img']['name']);
    // $sub = ".".array_pop($tmp);
    // $_FILES['img']['name'] = '2022-05-29.pdf';  陣列元素 = 
    $name = $_FILES['img']['name'];
/////////////////////////////////////////////////////////////自訂檔名(md5)與副檔名 
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name);


    $sql = "update `images` set (`img_name` = '$name',
                                `description` ='{$_POST['description']}',
                                `type` = '{$_FILES['img']['type']}',
                                `size` = '{$_FILES['img']['size']}') 
                            where `id` = '{$_POST['id']}'";

    $old_image = $pdo->query("select `img_name` from `images` where `id` = ")

    $pdo->exec($sql);
    header("location:../upload.php");
}
