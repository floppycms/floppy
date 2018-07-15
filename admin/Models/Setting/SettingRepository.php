<?php

namespace Admin\Models\Setting;

use Core\Model;

class SettingRepository extends Model
{
    /**
     * Получение всех настроек из БД
     *
     * @return array
     */
    public function getSettings()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('setting')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * Получение значения настройки по ключу
     *
     * @param string $keySetting
     * @return string|null
     */
    public function getSettingValue($keySetting)
    {
        $sql = $this->queryBuilder
            ->select('value')
            ->from('setting')
            ->where('key_field', $keySetting)
            ->limit(1)
            ->sql();

        $row = $this->db->query($sql, $this->queryBuilder->values);

        return isset($row[0]) ? $row[0]['value'] : null;
    }

    /**
     * Обновление настроек в БД
     *
     * @param array $params
     * @return void
     */
    public function updateSettings($params)
    {
        if(!empty($params)){
            foreach($params as $key => $value){
                
                $sql =  $this->queryBuilder
                        ->update('setting')
                        ->set(['value' => $value])
                        ->where('key_field', $key)
                        ->sql();
                $this->db->execute($sql, $this->queryBuilder->values);
            }
        }
    }
}