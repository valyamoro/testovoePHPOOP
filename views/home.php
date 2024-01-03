<?php foreach ($products as $product): ?>
    <a href="/editProduct?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a> <br>
    Описание: <?php echo $product['description']?> <br>
    Цена: <?php echo $product['price']; ?> <br>
    <label>
        <input type='number' value='<?php echo $product['price']; ?>' data-id=' <?php echo $product['id'] ?>' class='price-input'>
    </label>
    <br>
    <img src="<?php echo $product['image_path']; ?>" alt="Изображение">
<br><br><br>
<?php endforeach; ?>
