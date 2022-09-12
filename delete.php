<?php
    require_once "connect.php";
    $tour_id= $_GET['tour_id'];
    $sql ="DELETE from tours where id=$tour_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    header('Location: show_sp.php?message=Xóa dữ liệu thành công');
    die;
?>