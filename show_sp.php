<?php
    require_once 'connect.php';
    $sql="SELECT * FROM categories a INNER JOIN tours b on a.id=b.category_id  ORDER BY b.id DESC";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $tours=$stmt->fetchAll(PDO::FETCH_ASSOC)

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table" border="1" cellspacing>
        <?= isset($_GET['message'])?$_GET['message']:''?>
        <thead>
            <tr>
                <th>name</th>
                <th>image</th>
                <th>intro</th>
                <th>description</th>
                <th>number_date</th>
                <th>price</th>
                <th>Loại tour</th>
                <th><a href="./insert.php">thêm</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tours as $t):?>
            <tr>
                <td><?= $t['name']?></td>
                <td><img src="image/<?= $t['image']?>" width="100" alt=""></td>
                <td><?= $t['intro']?></td>
                <td><?= $t['description']?></td>
                <td><?= $t['number_date']?></td>
                <td><?= $t['price']?></td>
                <td><?= $t['name']?></td>
                <td>
                    <a href="update.php?tour_id=<?= $t['id']?>">sửa</a>
                    <a href="delete.php?tour_id=<?= $t['id']?>">Xóa</a>


                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>