<?php foreach ($errors as $error): ?>
<?php echo $error[0]; ?> <br>
<?php endforeach; ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <label for="name"></label><input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input type="text" name="description" class="form-control" id="description">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input type="text" name="price" class="form-control" id="price">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Изображение</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Добавить товар</button>
</form>
