<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>

<h2>Настройки сайта</h2>

    <form action="/admin/setting/" method="POST">
    <?php foreach($settings as $setting): ?>
      <div class="form-group">
        <label for="<?= $setting['key_field'] ?>"><?= $setting['name'] ?></label>
        <input type="text" name="<?= $setting['key_field'] ?>" class="form-control" 
        id="<?= $setting['key_field'] ?>" value="<?= $setting['value'] ?>">
      </div>
    <?php endforeach; ?>

      <button type="submit" id="add-btn" class="btn btn-primary">Обновить</button>
    </form>

<?php $this->theme->footer(); ?>