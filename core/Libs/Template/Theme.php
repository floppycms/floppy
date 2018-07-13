<?php

namespace Core\Libs\Template;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    /**
     * URL текущей темы
     *
     * @var string
     */
    public $url = '';

    /**
     * Данные, доступные во всех шаблонах
     *
     * @var array
     */
    protected $data = [];

    /**
     * Подключение хедера
     *
     * @param string $name
     * @return void
     */
    public function header($name = '')
    {
        if($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['header'], $name);
        } else {
            $name = 'header';
        }

        $this->loadTemplateFile($name);
    }

    /**
     * Подключение футера
     *
     * @param string $name
     * @return void
     */
    public function footer($name = '')
    {
        if($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['footer'], $name);
        } else {
            $name = 'footer';
        }

        $this->loadTemplateFile($name);
    }

    /**
     * Подключение сайдбара
     *
     * @param string $name
     * @return void
     */
    public function sidebar($name = '')
    {
        if($name !== ''){
            $name = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        } else {
            $name = 'sidebar';
        }

        $this->loadTemplateFile($name);
    }

    public function block($name = '', $data = [])
    {
        $this->loadTemplateFile($name, $data);
    }

    /**
     * Загрузка файла шаблона
     *
     * @param string $name Имя файла
     * @param array $data Массив с данными
     * @return void
     */
    private function loadTemplateFile($name, $data = [])
    {
        switch(ENV){
            case 'Admin':
                $fileTemplate = ROOT_DIR . '/Views/' . $name . '.php';
                break;
            case 'Cms':
                $fileTemplate = ROOT_DIR . '/content/themes/default/' . $name . '.php';
                break;
        }

        if(!is_file($fileTemplate)){
            throw new \Exception(
                sprintf('Файл %s не найден в %s', $name, $fileTemplate)
            );
        }

        extract(array_merge($data, $this->data));
        require_once $fileTemplate;
    }

    /**
     * Получение массива значений, достпных в шаблоне
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Добавление значения, которое будет доступно в шаблоне
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}