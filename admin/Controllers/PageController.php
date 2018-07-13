<?php

namespace Admin\Controllers;

class PageController extends AdminController
{
    /**
     * Список всех страниц
     *
     * @return void
     */
    public function list()
    {
        $this->load->model('Page');

        $this->data['pages'] = $this->model->page->getPages();

        $this->view->render('pages/list', $this->data);
    }

    /**
     * Форма создания новой страницы
     *
     * @return void
     */
    public function create()
    {
        $this->view->render('pages/create');
    }

    /**
     * Создание новой страницы в БД
     *
     * @return void
     */
    public function add()
    {
        $params = $this->request->post;

        $this->load->model('Page');

        $lastId = $this->model->page->createPage($params);

        $header = '/admin/page/edit/' . $lastId;
        header('Location: ' . $header);
    }

    /**
     * Форма редактирования страницы
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $this->load->model('Page');

        $this->data['page'] = $this->model->page->getPage($id);

        $this->view->render('pages/edit', $this->data);
    }

    /**
     * Обновление страницы в БД
     *
     * @return void
     */
    public function update()
    {
        $params = $this->request->post;

        $this->load->model('Page');

        $this->model->page->createPage($params);

        header('Location: /admin/page/');
    }

    /**
     * Удаление страницы
     *
     * @param int $id Идентификатор страницы, которую необходимо удалить
     * @return void
     */
    public function delete($id)
    {
        $this->load->model('Page');

        $del = $this->model->page->deletePage($id);

        header('Location: /admin/page/');
    }
}