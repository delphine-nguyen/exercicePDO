<?php

class FormValidation
{
    public static function validate(array $fields, array $form): bool
    {
        foreach ($fields as $field) {
            if (!isset($form[$field]) || empty($form[$field])) {
                return false;
            }
        }
        return true;
    }

    public static function cleanData(array $data, array $fields): array
    {
        $clean = [];
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $fields)) {
                $clean[$key] = htmlspecialchars($value);
            }
        }
        return $clean;
    }
}
