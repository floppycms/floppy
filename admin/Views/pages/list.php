<?php $this->theme->header(); ?>

<?php $this->theme->sidebar(); ?>

<h2>Страницы <a href="/admin/page/create/"><small class="text-muted">(Создать страницу)</small></a></h2>

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
                <?php foreach($pages as $page): ?>
                  <tr>
                    <td><?= $page['id'] ?></td>
                    <td><?= $page['title'] ?></td>
                    <td><?= $page['published_at'] ?></td>
                    <td><?= $page['keywords'] ?></td>
                    <td><?= $page['description'] ?></td>
                    <td>
                      <a href="/admin/page/edit/<?= $page['id'] ?>">Редактировать</a>
                      <a href="/admin/page/delete/<?= $page['id'] ?>">Удалить</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php $this->theme->footer(); ?>