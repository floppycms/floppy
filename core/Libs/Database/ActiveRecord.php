<?php

namespace Core\Libs\Database;

use \ReflectionClass;
use \ReflectionProperty;

/**
 * API для работы с базой данных
 */
trait ActiveRecord
{
    protected $db;

    protected $queryBuilder;

    public function __construct($id = 0)
    {
        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if($id){
            $this->id = $id;
        }
    }

    public function getTable()
    {
        return $this->tableName;
    }

    /**
     * Сохранение сущности в базу данных
     *
     * @return void
     */
    public function save()
    {
        //получение всех свойств сущности
        $properties = $this->getIssetProperties();

        try{
            if(isset($this->id)){  //обновление записи
                $this->db->execute(
                    $this->queryBuilder
                        ->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            } else {  //добавление новой записи
                $this->db->execute(
                    $this->queryBuilder
                        ->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
                
            }
        } catch(\Exception $e){
            echo $e.getMessage();
        }

        return $this->db->lastInsertId();
    }

    /**
     * Получает запись с заданным id
     *
     * @return array|null
     */
    public function findOne()
    {
        $row = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->limit(1)
                ->sql(),
            $this->queryBuilder->values
        );

        return isset($row[0]) ? $row[0] : null;
    }

    /**
     * Получает все записи из таблицы БД
     *
     * @return array|null
     */
    public function findAll()
    {
        $rows = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->sql(),
            $this->queryBuilder->values
        );

        return isset($rows) ? $rows : null;
    }

    /**
     * Удаление записи
     *
     * @return void
     */
    public function deleteOne()
    {
        $delCount = $this->db->execute(
            $this->queryBuilder
                ->delete()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->limit(1)
                ->sql(),
            $this->queryBuilder->values
        );

        return $delCount;
    }

    /**
     * Получение всех доступных свойств сущности
     *
     * @return ReflectionProperty[]
     */
    private function getProperty()
    {
        $reflection = new ReflectionClass($this);

        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }

    private function getIssetProperties()
    {
        $properties = [];

        foreach($this->getProperty() as $key => $property){
            if(isset($this->{$property->getName()})){
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }
}