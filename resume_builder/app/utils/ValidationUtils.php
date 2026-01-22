<?php

namespace App\Utils;

use Exception;
use Phalcon\Di\Di;

class ValidationUtils
{
    public static function validate(array $data, array $rules)
    {
        foreach ($rules as $field => $ruleString) {

            $rulesArray = explode('|', $ruleString);

            foreach ($rulesArray as $rule) {

                if ($rule === 'required') {
                    if (!isset($data[$field]) || trim($data[$field]) === '') {
                        throw new Exception("$field is required");
                    }
                }

                if ($rule === 'email') {
                    if (isset($data[$field]) &&
                        !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                        throw new Exception("Invalid email format");
                    }
                }

                if ($rule === 'int') {
                    if (isset($data[$field]) && !ctype_digit((string)$data[$field])) {
                        throw new Exception("$field must be integer");
                    }
                }

                if ($rule === 'year') {
                    if (isset($data[$field]) &&
                        !preg_match('/^\d{4}$/', $data[$field])) {
                        throw new Exception("$field must be a valid year");
                    }
                }
                if ($rule === 'id') {
                    if (
                        !isset($data[$field]) ||
                        !ctype_digit((string)$data[$field]) ||
                        (int)$data[$field] <= 0
                    ) {
                        throw new Exception("$field must be a valid ID");
                    }
                }

                if (str_starts_with($rule, 'exists:')) {

                    $params = explode(':', $rule)[1];
                    [$table, $column] = explode(',', $params);

                    $value = $data[$field] ?? null;

                    if (!$value) {
                        throw new Exception("$field value missing");
                    }

                    // Get DB connection from DI
                    $db = Di::getDefault()->get('db');

                    $sql = "SELECT COUNT(*) as count FROM $table WHERE $column = :value";

                    $result = $db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
                        'value' => $value
                    ]);

                    if ($result['count'] == 0) {
                        throw new Exception("$field does not exist");
                    }
                }

            }
        }

        return $data;
    }
}
