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
    <link rel="stylesheet" href="../../template/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php 
     session_start();
    if(!isset($_SESSION['IsAdmin']))
    {
        header('location: /NhaSachPN/404');
    }
    require '../../include/connect.php';    
    include_once '../include/function.php';
    include_once '../include/layout/header.php';
    $categories = Category::getAllCategories($pdo);
?>
    <div class="p-3">
        <h3 class="mb-4 mx-3" style="text-shadow: 2px 2px #cdcdcd">Category</h3>
        <a class="btn btn-primary m-3" href="./create.php">Create a Category</a>
        <table class="table table-striped table-hover w-75 m-auto" style="border-radius: 15px">
            <tr>
                <th>Name</th>
                <th>Function</th>
            </tr>
            <?php
            foreach($categories as $category):
            ?>
            <tr>
                <td>
                    <?= $category['CategoryName'] ?>
                </td>
                <td>
                    <a class="btn btn-warning" style="display: inline-block;"
                        href="./edit.php?id=<?= $category['ID'] ?>">Edit</a>
                    <a class="btn btn-danger" style="display: inline-block;" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" href="" data-id="<?= $category['ID'] ?>">Delete</a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>

        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa?</p>
                </div>
                <div class="modal-footer">
                    <form action="delete.php" method="post">
                        <input type="hidden" name="category_id" id="category-id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once '../include/layout/footer.php';
?>
    <script>
    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const categoryID = button.getAttribute('data-id')

            document.getElementById('category-id').value = categoryID
        })
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>