<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    public function toCamelArray(): array
    {
        $data = parent::toArray();

        $camelData = [];

        foreach ($data as $key => $value) {

            // snake_case → camelCase
            $camelKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));

            $camelData[$camelKey] = $value;
        }

        return $camelData;
    }
}
