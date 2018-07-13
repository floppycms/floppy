<?php

namespace Core\Libs\Database;

use Core\Libs\Config\Config;

class Connection
{
    /**
     * Объект соединения с базой данных
     *
     * @var \PDO
     */
    private $link;

    /**
     * Конструктор класса.
     * 
     * Осуществляет подключение к базе данных
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Подключение к базе данных
     *
     * @return $this
     */
    private function connect()
    {
        $config = Config::file('db');

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];

        $this->link = new \PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * Выполнение запроса к базе данных
     *
     * @param string $sql Строка запроса
     * @param array $values Массив параметров
     * @return int Количество измененных/созданных/удаленных строк
     */
    public function execute($sql, $values)
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }

    /**
     * Запрос на выборку данных из базы данных
     *
     * @param string $sql Строка запроса
     * @param array $values Массив параметров
     * @return array Массив с результатами запроса 
     */
    public function query($sql, $values)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if($result === false){
            return [];
        }

        return $result;
    }

    /**
     * Получение id последней созданной записи в БД
     *
     * @return void
     */
    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}