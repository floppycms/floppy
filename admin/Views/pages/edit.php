<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>
<div class="container">
<div class="row">
    <h1 class="h3 col col-sm-12 border-bottom">Редактирование страницы :: <?= $page['title'] ?></h1>
</div>
<div class="w-100"></div>

<form action="/admin/page/update/" method="POST">
  <input type="hidden" name="page_id" value="<?= $page['id'] ?>">
  <div class="form-group">
    <label for="title">Название страницы</label>
    <input type="text" name="title" class="form-control" id="title" value="<?= $page['title'] ?>">
    <small id="titleHelp" class="form-text text-muted">Используется также в качестве заголовка страницы.</small>
  </div>
  <div class="form-group">
    <label for="content">Содержимое страницы</label>
    <textarea name="content" class="form-control tiny" id="content" rows="9">
        <?= $page['content'] ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="keywords">Ключевые слова</label>
    <input name="keywords" type="text" class="form-control" id="keywords" value="<?= $page['keywords'] ?>">
    <small id="keywordsHelp" class="form-text text-muted">Несколько ключевых слов разделяются запятыми.</small>
  </div>
  <div class="form-group">
    <label for="description">Описание страницы</label>
    <textarea name="description" class="form-control" id="description" rows="3">
        <?= $page['description'] ?>
    </textarea>
  </div>
  <button type="submit" id="add-btn" class="btn btn-primary">Сохранить</button>
</form>
</div>


<?php $this->theme->footer(); ?>