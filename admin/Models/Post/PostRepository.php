<?php

namespace Admin\Models\Post;

use Core\Model;

class PostRepository extends Model
{
    /**
     * Получение всех записей из базы данных
     *
     * @return array
     */
    public function getPosts()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * Получение записи с заданным id
     *
     * @param int $id Идентификатор записи
     * @return array
     */
    public function getPost($id)
    {
        $id = (int) $id;

        $post = new Post($id);

        return $post->findOne();
    }

    /**
     * Создание новой записи или обновление существующей
     *
     * @param array $params Поля формы добавления записи
     * @return int Идентификатор созданной записи
     */
    public function createPost($params)
    {
        if(isset($params['post_id'])){
            $post = new Post($params['post_id']);
        } else {
            $post = new Post();
        }

        $post->title = $params['title'];
        $post->content = $params['content'];
        $post->keywords = $params['keywords'];
        $post->description = $params['description'];

        return $post->save();
    }

    /**
     * Удаление записи
     *
     * @param int $id Идентификатор записи, которую необходимо удалить
     * @return void
     */
    public function deletePost($id)
    {
        $id = (int) $id;

        $post = new Post($id);

        return $post->deleteOne();
    }

}