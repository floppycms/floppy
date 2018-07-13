<?php

namespace Core\Libs\Database;

/**
 * Построитель запросов к базе данных
 */
class QueryBuilder
{
    protected $sql = [];

    public $values = [];

    /**
     * Часть запроса SELECT
     *
     * @param string $fields Поля, которые необходимо выбрать
     * @return $this
     */
    public function select($fields = '*')
    {
        $this->reset();
        $this->sql['select'] = "SELECT {$fields} ";

        return $this;
    }
    
    /**
     * Часть запроса FROM
     *
     * @param string $table Имя таблицы
     * @return $this
     */
    public function from($table)
    {
        $this->sql['from'] = "FROM {$table} ";
        return $this;
    }

    /**
     * Часть запроса WHERE
     *
     * @param string $column Поле
     * @param string $value Значение
     * @param string $operator Оператор сравнения (по умолчанию =)
     * @return self
     */
    public function where($column, $value, $operator = '=')
    {
        $this->sql['where'][] = "{$column} {$operator} ?";
        $this->values[] = $value;

        return $this;
    }

    /**
     * Часть запроса ORDER BY
     *
     * @param string $field Поле сортировки
     * @param string $order Сортировка
     * @return self
     */
    public function orderBy($field, $order)
    {
        $this->sql['order_by'] = "ORDER BY {$field} {$order}";
        return $this;
    }

    /**
     * Часть запроса LIMIT
     *
     * @param int $number Количество строк выборки
     * @return self
     */
    public function limit($number)
    {
        $this->sql['limit'] = " LIMIT {$number}";
        return $this;
    }

    /**
     * Часть запроса INSERT
     *
     * @param string $table Таблица базы данных
     * @return self
     */
    public function insert($table)
    {
        $this->reset();
        $this->sql['insert'] = "INSERT INTO {$table} ";

        return $this;
    }

    /**
     * Часть запроса UPDATE
     *
     * @param string $table Таблица базы данных
     * @return self
     */
    public function update($table)
    {
        $this->reset();
        $this->sql['update'] = "UPDATE {$table} ";

        return $this;
    }

    public function delete()
    {
        $this->reset();
        $this->sql['delete'] = "DELETE ";

        return $this;
    }

    /**
     * Часть запроса SET
     *
     * @param array $data Ассоциативный массив [поле => значение]
     * @return self
     */
    public function set($data = [])
    {
        $this->sql['set'] = " SET ";

        if(!empty($data)){
            foreach($data as $key => $value){
                $this->sql['set'] .= "{$key} = ?";
                if(next($data)){
                    $this->sql['set'] .= ', ';
                }
                $this->values[] = $value;
            }
        }

        return $this;
    }

    /**
     * Собирает SQL-запрос в строку.
     *
     * @return string Строка запроса для выполнения
     */
    public function sql()
    {
        $sql = '';

        if(!empty($this->sql)){
            foreach($this->sql as $key => $value){
                if($key === 'where'){
                    $sql .= ' WHERE ';
                    foreach($value as $where){
                        $sql .= $where;
                        if(count($value) > 1 && next($value)){
                            $sql .= ' AND ';
                        }
                    }
                } else {
                    $sql .= $value;
                }
            }
        }

        return $sql;
    }

    private function reset()
    { 
        $this->sql = [];
        $this->values = [];
    }
}