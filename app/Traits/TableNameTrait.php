<?php

namespace App\Traits;

trait TableNameTrait
{
    public function getTableName()
    {
        $tableName = substr($this->table, 3);
        return $tableName;

   //     return woth(new static) ->getTable();
    }
}