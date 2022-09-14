<?php
require_once 'connect.php';
$err = [];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['tour_id'];
    $name = $_POST['name'];
    $intro=$_POST['intro'];
    $des = $_POST['des'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $madm =$_POST['madm'];  
    $anh=$_POST['anh'];
    if($_FILES['anh']['size']>0){
        $anh =$_FILES['anh']['name'];
    move_uploaded_file($_FILES['anh']['tmp_name'],'image/'.$anh);

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
   
        $sql = "UPDATE tours SET name='$name',intro='$intro',description='$des',number_date='$date',price=$price  where id ='$id'";
        // $sql = "UPDATE tours SET name='1',intro='1',description='1',price=1 ";
    // var_dump($sql);die;
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    header("Location: show_sp.php?message=theem ok")  ;
    
    
}
    $sql = "select * from categories";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $tours=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $tour_id=$_GET["tour_id"];
    $sql ="SELECT * FROM tours where id= $tour_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $tour=$stmt->fetch(PDO::FETCH_ASSOC);

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
    <form method="post" action="update.php?tour_id=<?= $tour['id']?>" enctype="multipart/form-data" >
        <pre>
        <input type="hidden" name="tour_id" id="" value="<?= $tour['id']?>">

            <input type="text" name="name" id="" value="<?= $tour['name']?>">
            <i ><?= isset($err['name'])?$err['name']:'' ?></i>
            <input type="text" name="des" id="" value="<?= $tour['description']?>">
            <i ><?= isset($err['des'])?$err['des']:'' ?></i>

            <input type="file" name="anh" id="">
            <img src="image/<?=$tour['image']?>" width="100" alt="">
            <input type="hidden" name="anh" id="" value="<?= $tour['image']?>">


            <i ><?= isset($err['anh'])?$err['anh']:'' ?></i>
            <input type="text" name="intro" id="" value="<?= $tour['intro']?>">
            <i ><?= isset($err['intro'])?$err['intro']:'' ?></i> 
            <input type="date" name="date" id="" value="<?= $tour['number_date']?>">
            <i ><?= isset($err['date'])?$err['date']:'' ?></i> 
            <input type="number" name="price" id="" value="<?= $tour['price']?>">
            <i ><?= isset($err['price'])?$err['price']:'' ?></i> 
            
                <button type="submit" name="put">lưu</button>
            <a href="show_sp.php" onclick="return confirm('bạn có chắc chắn muốn hủy không')"> hủy</a>
            </form>
        </pre>
</body>
</html>