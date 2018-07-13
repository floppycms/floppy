<?php

namespace Admin\Models\Page;

use Core\Model;

class PageRepository extends Model
{
    /**
     * Получение всех страниц из базы данных
     *
     * @return array
     */
    public function getPages()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * Получение страницы с заданным id
     *
     * @param int $id Идентификатор страницы
     * @return array
     */
    public function getPage($id)
    {
        $id = (int) $id;

        $page = new Page($id);

        return $page->findOne();
    }

    /**
     * Создание новой страницы или обновление существующей
     *
     * @param array $params Поля формы добавления страницы
     * @return int Идентификатор созданной страницы
     */
    public function createPage($params)
    {
        if(isset($params['page_id'])){
            $page = new Page($params['page_id']);
        } else {
            $page = new Page();
        }

        $page->title = $params['title'];
        $page->content = $params['content'];
        $page->keywords = $params['keywords'];
        $page->description = $params['description'];

        return $page->save();
    }

    public function deletePage($id)
    {
        $id = (int) $id;

        $page = new Page($id);

        return $page->deleteOne();
    }

}