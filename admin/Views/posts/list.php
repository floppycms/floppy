<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>

<h2>Записи <a href="/admin/post/create/"><small class="text-muted">(Создать запись)</small></a></h2>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Название</th>
                  <th>Дата создания</th>
                  <th>Ключевые слова</th>
                  <th>Описание</th>
                  <th>Действия</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($posts as $post): ?>
                  <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['published_at'] ?></td>
                    <td><?= $post['keywords'] ?></td>
                    <td><?= $post['description'] ?></td>
                    <td>
                      <a href="/admin/post/edit/<?= $post['id'] ?>">Редактировать</a>
                      <a href="/admin/post/delete/<?= $post['id'] ?>">Удалить</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php $this->theme->footer(); ?>