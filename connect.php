<?php
    $host = "localhost";
    $dbname="ph18783_examphp1";
    $username='root';
    $password='';
    try {
        $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    }catch(PDOException $e){
        echo "lỗi kết nối";
    }

?>