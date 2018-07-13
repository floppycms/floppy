<?php

namespace Admin\Controllers;

class PostController extends AdminController
{
    /**
     * Список всех страниц
     *
     * @return void
     */
    public function list()
    {
        $this->load->model('Post');

        $this->data['posts'] = $this->model->post->getPosts();

        $this->view->render('posts/list', $this->data);
    }

    /**
     * Форма создания новой записи
     *
     * @return void
     */
    public function create()
    {
        $this->view->render('posts/create');
    }

    /**
     * Создание новой записи в БД
     *
     * @return void
     */
    public function add()
    {
        $params = $this->request->post;

        $this->load->model('Post');

        $lastId = $this->model->post->createPost($params);

        $header = '/admin/post/edit/' . $lastId;
        header('Location: ' . $header);
    }

    /**
     * Форма редактирования записи
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $this->load->model('Post');

        $this->data['post'] = $this->model->post->getPost($id);

        $this->view->render('posts/edit', $this->data);
    }

    /**
     * Обновление записи в БД
     *
     * @return void
     */
    public function update()
    {
        $params = $this->request->post;

        $this->load->model('Post');

        $this->model->post->createPost($params);

        header('Location: /admin/post/');
    }

    /**
     * Удаление записи
     *
     * @param int $id Идентификатор записи, которую необходимо удалить
     * @return void
     */
    public function delete($id)
    {
        $this->load->model('Post');

        $del = $this->model->post->deletePost($id);

        header('Location: /admin/post/');
    }
}