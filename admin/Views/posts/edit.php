<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>
<div class="container">
<div class="row">
    <h1 class="h3 col col-sm-12 border-bottom">Редактирование записи :: <?= $post['title'] ?></h1>
</div>
<div class="w-100"></div>

<form action="/admin/post/update/" method="POST">
  <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
  <div class="form-group">
    <label for="title">Название записи</label>
    <input type="text" name="title" class="form-control" id="title" value="<?= $post['title'] ?>">
    <small id="titleHelp" class="form-text text-muted">Используется также в качестве заголовка записи.</small>
  </div>
  <div class="form-group">
    <label for="content">Содержимое записи</label>
    <textarea name="content" class="form-control tiny" id="content" rows="9">
        <?= $post['content'] ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="keywords">Ключевые слова</label>
    <input name="keywords" type="text" class="form-control" id="keywords" value="<?= $post['keywords'] ?>">
    <small id="keywordsHelp" class="form-text text-muted">Несколько ключевых слов разделяются запятыми.</small>
  </div>
  <div class="form-group">
    <label for="description">Описание записи</label>
    <textarea name="description" class="form-control" id="description" rows="3">
        <?= $post['description'] ?>
    </textarea>
  </div>
  <button type="submit" id="add-btn" class="btn btn-primary">Сохранить</button>
</form>
</div>


<?php $this->theme->footer(); ?>