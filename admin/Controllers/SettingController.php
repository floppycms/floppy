<?php

namespace Admin\Controllers;

class SettingController extends AdminController
{
    /**
     * Список настроек
     *
     * @return void
     */
    public function index()
    {
        $this->load->model('Setting'); 
        $this->data['settings'] = $this->model->setting->getSettings();

        $this->view->render('settings/list', $this->data);
    }

    /**
     * Обновление настроек в БД
     *
     * @return void
     */
    public function update()
    {
        $this->load->model('Setting');

        $params = $this->request->post;

        $this->model->setting->updateSettings($params);

        header('Location: /admin/setting/');
    }
}