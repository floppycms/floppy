<?php

namespace Admin\Models\User;

use Core\Model;

class UserRepository extends Model
{
    /**
     * Получение всех пользователей из базы данных
     *
     * @return array
     */
    public function getUsers()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

}