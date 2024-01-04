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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Обработчик события изменения в поле input
        document.querySelectorAll('.price-input').forEach(function (input) {
            input.addEventListener('input', function () {
                // Получаем значения поля input и id товара
                let newPrice = this.value;
                let productId = this.dataset.id;
                console.log(productId);
                // Отправляем данные на сервер для обновления цены
                fetch('/updatePrice', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'productId=' + encodeURIComponent(productId) + '&newPrice=' + encodeURIComponent(newPrice),
                })
                    .then(response => response.text())
                    .then(data => {
                        // Обработка успешного ответа (по желанию)
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Ошибка:', error);
                    });
            });
        });
    });
</script>
