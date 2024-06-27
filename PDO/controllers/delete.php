<?php
require '../classes/product.php';

try {
    $result = Product::Delete($_POST['id']);
    header("Location: ../list.php?message=true");
} catch (Exception $e) {
    header("Location: ../list.php?message=false");
}
?>
