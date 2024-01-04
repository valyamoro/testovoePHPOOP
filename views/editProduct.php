<form action="" method="post" enctype="multipart/form-data">
<!-- Тут должны подставляться текущие значения из базы данных, сделать на js -->
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
    <a href="/deleteProduct?id=<?php echo$_GET['id']; ?>">Удалить</a> <br><br>
    <button type="submit" class="btn btn-primary">Изменить</button>
</form>