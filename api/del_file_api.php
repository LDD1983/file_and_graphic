<?php include_once("../db.php");


$sql = "delete from `images` where `id` = '{$_GET['id']}' ";

$img = $pdo->query("select `img` from `images` where `id` = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
unlink("../img/".$img['img']);

$pdo->exec($sql);

