<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>
<div class="container">
<div class="row">
    <h1 class="h3 col col-sm-12 border-bottom">Создание новой записи</h1>
</div>
<div class="w-100"></div>

<form action="/admin/post/add/" method="POST">
  <div class="form-group">
    <label for="title">Название записи</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Название записи">
    <small id="titleHelp" class="form-text text-muted">Используется также в качестве заголовка записи.</small>
  </div>
  <div class="form-group">
    <label for="content">Содержимое записи</label>
    <textarea name="content" class="form-control tiny" id="content" rows="7"></textarea>
  </div>
  <div class="form-group">
    <label for="keywords">Ключевые слова</label>
    <input name="keywords" type="text" class="form-control" id="keywords" placeholder="Ключевые слова">
    <small id="keywordsHelp" class="form-text text-muted">Несколько ключевых слов разделяются запятыми.</small>
  </div>
  <div class="form-group">
    <label for="description">Описание записи</label>
    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
  </div>
  <button type="submit" id="add-btn" class="btn btn-primary">Создать</button>
</form>
</div>


<?php $this->theme->footer(); ?>