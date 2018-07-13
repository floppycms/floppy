<?php

namespace Core;

class Load
{

    const MASK_MODEL_REPOSITORY = '\%s\Models\%s\%sRepository';

    const MASK_FILE_LANGUAGE = 'Lang/%s/%s.json';

    public $di;

    public function __construct(\Core\DI\DI $di)
    {
        $this->di = $di;

        return $this;
    }

    /**
     * Создание экземпляра модели и загрузка ее в DI контейнер
     *
     * @param string $modelName Имя модели
     * @param boolean|string $modelDir Директория хранения моделей
     * @return bool
     */
    public function model($modelName, $modelDir = false)
    {

        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ? $modelDir : $modelName;

        $namespaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        if(class_exists($namespaceRepository)){
            $modelRegistry = $this->di->get('model') ?: new \stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceRepository($this->di);

            $this->di->set('model', $modelRegistry);

            return true;
        }

        return false;
    }

    public function language($path)
    {
        $langFile = sprintf(
            self::MASK_FILE_LANGUAGE,
            'russian', $path
        );

        $data = json_decode(file_get_contents($langFile));

        $language = $this->di->get('language') ?: new \stdClass();
        $language->{$path} = $data;

        $this->di->set('language', $language);

        return $data;
    }
}