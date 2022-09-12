<?php
require_once 'connect.php';
$err = [];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $intro=$_POST['intro'];
    $des = $_POST['des'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $madm =$_POST['madm'];  
    $anh='no_img.img';
    if($_FILES['anh']['size']>0){
        $anh =$_FILES['anh']['name'];
    }else{
        $err['anh']='bạn chưa chọn file';
    }
    
    if(empty($name)){
        $err['name']='Bạn chưa nhập tên tour';
    }
    if(empty($intro)){
        $err['intro']='Bạn chưa nhập tên intro';
    }
    if(empty($des)){
        $err['des']='Bạn chưa nhập tên des';
    }
    if(empty($date)){
        $err['date']='Bạn chưa nhập date';
    }
    if(empty($price)){
        $err['price']='Bạn chưa nhập giá';
    }
    if(empty($err)){
        $sql = "INSERT INTO `tours`(`name`,`intro`,`description`,`image`, `number_date`, `price`, `category_id`) VALUES ('$name','$intro','$des','$anh','$date',$price,'$madm') ";
    // var_dump($sql);die;
    move_uploaded_file($_FILES['anh']['tmp_name'],'image/'.$anh);
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    header("Location: show_sp.php?message=theem ok")  ;
    exit;  
    }
}
    $sql = "select * from categories";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $tours=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        i{
            color:red;
        }
    </style>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data" >
        <pre>

            <input type="text" name="name" id="" placeholder="tên">
            <i ><?= isset($err['name'])?$err['name']:'' ?></i>
            <input type="text" name="des" id="" placeholder="des">
            <i ><?= isset($err['des'])?$err['des']:'' ?></i>
            <input type="file" name="anh" id="" placeholder="file">
            <i ><?= isset($err['anh'])?$err['anh']:'' ?></i>
            <input type="text" name="intro" id="" placeholder="intro">
            <i ><?= isset($err['intro'])?$err['intro']:'' ?></i> 
            <input type="date" name="date" id="" placeholder="này">
            <i ><?= isset($err['date'])?$err['date']:'' ?></i> 
            <input type="number" name="price" id="" placeholder="giá">
            <i ><?= isset($err['price'])?$err['price']:'' ?></i> 
            <select name="madm" id="">
                <?php foreach ($tours as $t):?>
                    <option value="<?= $t['id']?>"><?= $t['name']?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="put">Thêm</button>
            </form>
        </pre>
</body>
</html>