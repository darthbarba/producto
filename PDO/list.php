<?php
require_once 'classes/product.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .circular-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            outline: none;
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .circular-btn:hover {
            transform: rotate(360deg);
        }
    </style>
</head>

<body>
<div class="container" style="width:80%">
    <br>
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message']) {
            echo '<div class="alert alert-success" role="alert">¡El producto se actualizó correctamente!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">¡Ocurrió un error!</div>';
        }
    }
    ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Precio</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach (Product::getAll() as $row) {
                echo "<tr>
                        <td>{$row->product_id}</td>
                        <td>{$row->classification_name}</td>
                        <td>{$row->product_name}</td>
                        <td>{$row->price}</td>
                        <td>
                            <a href='product.php?id={$row->product_id}' class='btn btn-primary'>EDITAR PRODUCTO {$row->product_id}</a>
                        </td>
                        <td>
                            <form action='controllers/delete.php' method='POST'>
                                <input type='hidden' name='id' value='{$row->product_id}'>
                                <input type='submit' class='btn btn-danger' value='Eliminar'>
                            </form>
                        </td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<a href="product.php" id="btnAdd" class="btn btn-primary circular-btn">+</a>
</body>
</html>

