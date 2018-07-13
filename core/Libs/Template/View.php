<?php

namespace Core\Libs\Template;

use Core\Libs\Template\Theme;

class View
{
    protected $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }

    /**
     * Считывает файл шаблона в буфер и выводит его на страницу
     *
     * @param string $template Имя шаблона
     * @param array $vars Массив переменных. Будут доступны в шаблоне
     * @return void
     */
    public function render($template, $vars = [])
    {
        //полный путь к представлению
        $templatePath = $this->getTemplatePath($template);

        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(
                sprintf('Не найден шаблон "%s" в "%s".', $template, $templatePath)
            );
        }

        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        } catch(\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }

    /**
     * Получение полного пути к шаблону
     *
     * @param string $template Имя шаблона
     * @return string
     */
    private function getTemplatePath($template)
    {
        switch(ENV){
            case 'Admin':
                return ROOT_DIR . '/Views/' . $template . '.php';
                break;
            case 'Cms':
                return ROOT_DIR . '/content/themes/default/' . $template . '.php';
                break;
            default:
                return ROOT_DIR . '/' . strtolower(ENV) . '/Views/' . $template . '.php';
        }
    }
}