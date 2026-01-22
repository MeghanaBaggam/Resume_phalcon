<?php

namespace App\Utils;

use Exception;

class ValidationUtils
{
    public static function validate(array $data, array $rules)
    {
        foreach ($rules as $field => $ruleString) {

            $rulesArray = explode('|', $ruleString);

            foreach ($rulesArray as $rule) {

                // REQUIRED
                if ($rule === 'required') {
                    if (!isset($data[$field]) || trim($data[$field]) === '') {
                        throw new Exception("$field is required");
                    }
                }

                // EMAIL
                if ($rule === 'email') {
                    if (isset($data[$field]) &&
                        !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                        throw new Exception("Invalid email format");
                    }
                }

                // INTEGER
                if ($rule === 'int') {
                    if (isset($data[$field]) && !is_numeric($data[$field])) {
                        throw new Exception("$field must be integer");
                    }
                }
            }
        }

        return $data;
    }
}
