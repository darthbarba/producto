<?php
include 'classes/classification.php';
include 'classes/product.php';

$findId = isset($_GET['id']) ? Product::getById($_GET['id'])[0] : null;
$action = isset($findId) ? "update.php" : "insert.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Alta / Edición</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2><?php echo isset($findId) ? 'Editar Producto' : 'Alta de Producto'; ?></h2>
  <form action="./controllers/<?php echo $action; ?>" method="POST">
  <div class="form-group">
      <label for="classification_id">Clasificación / Categoría:</label>
      <select class="form-control" id="classification_id" name="classification_id">
      <?php foreach(Classification::getAll() as $row)
        echo "<option value='{$row->classification_code}' ".((isset($findId) && $findId->classification_code == $row->classification_code) ? 'selected' : '').">{$row->classification_name}</option>";
      ?>
      </select>
    </div>  
    <div class="form-group">
      <label for="product_name_id">Nombre:</label>
      <input type="text" class="form-control" id="product_name_id" name="product_name" value="<?php echo isset($findId) ? $findId->product_name : ''; ?>" placeholder="Ingresa nombre de producto">
    </div>
    <div class="form-group">
      <label for="price_id">Precio:</label>
      <input type="number" class="form-control" id="price_id" name="price" value="<?php echo isset($findId) ? $findId->price : ''; ?>" placeholder="Ingresa precio">
    </div>
    <?php if(isset($findId)): ?>
      <input type="hidden" name="product_id" value="<?php echo $findId->product_id; ?>">
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
</body>
</html>

