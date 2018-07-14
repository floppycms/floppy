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