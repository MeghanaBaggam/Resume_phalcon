<?php

namespace App\Utils;

class CaseConvertUtils
{
    public static function camelToSnakeCase(array $data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            $snake = strtolower(preg_replace('/[A-Z]/', '_$0', $key));
            $result[$snake] = $value;
        }

        return $result;
    }

    public static function snakeToCamelCase(array $data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            $camel = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $result[$camel] = $value;
        }

        return $result;
    }
}
