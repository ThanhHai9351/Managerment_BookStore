<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./template/css/style.css">
    <title>đánh giá</title>
</head>

<body>
    <?php
    ob_start();
    require './include/connect.php';
    include_once './include/function.php';
    include_once './include/layout/headerPage.php';
    $iduser = $_SESSION['IDUser'];
    $evalutes = Evaluate::getAllEvaluates($pdo,$iduser);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = $_POST['ID'];
            $star = $_POST['Star'];
            $cmt = $_POST['Comment'];
    
            // Prepare and execute SQL query with prepared statement
            $stmt = $pdo->prepare("UPDATE evaluate SET Star = :star, Comment = :cmt WHERE ID = :id");
            $stmt->bindParam(':star', $star);
            $stmt->bindParam(':cmt', $cmt);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            header("Location: ./evaluate.php");
            exit(); 
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật đánh giá: " . $e->getMessage();
        }
        ob_end_flush();
    }
    ?>
    <div class="main p-3 text-center" style="border: 1px solid #cdcdcd">
        <h4 class="text-start bg-secondary p-3 text-white">Đánh giá</h4>
        <?php
            if(count($evalutes)>0)
            {
                ?>
        <div class="row mt-3">
            <h5 class="col-md-4">Sản phẩm</h5>
            <h5 class="col-md-4">Star</h5>
            <h5 class="col-md-4">Đánh giá</h5>
            <?php
                            foreach($evalutes as $evaluate):
                        ?>
            <hr>
            <div class="row col-md-4">
                <div class="col-md-6">
                    <button class="btn btn-danger">
                        <a class="text-white text-decoration-none" href="">X</a>
                    </button>
                </div>
                <div class="col-md-6">
                    <img class="w-50" src="<?= $evaluate['Image'] ?>" alt="">
                </div>
                <div class="col-md-12 text-center p-3">
                    <h6><?=$evaluate['ProductName'] ?></h6>
                </div>
            </div>
            <div class="col-md-4">
                <form method="post" enctype="multipart/form-data">
                    <input style="border-radius: 10px" class="text-center p-1" type="number" name="Star" value="1"
                        min="1" max="5" />
            </div>
            <div class="col-md-4">
                <input type="hidden" name="ID" value="<?= $evaluate['ID'] ?>" />
                <input style="border-radius: 10px" type="text" class="p-1" name="Comment" value=""
                    placeholder="Nhập đánh giá ..." />
                <button type="submit" class="btn btn-info">Send</button>
                </form>
            </div>
            <?php
                    endforeach;
                ?>
        </div>
        <?php
            }else{
                ?>
        <h6 class="text-center">Bạn không có phần đánh giá nào</h6>
        <?php
            }
        ?>
    </div>
    <?php
    include_once './include/layout/footer.php';
    ?>
    <script src="./template/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>