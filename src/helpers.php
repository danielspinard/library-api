<?php

if (!function_exists('env'))
{
    function env (string $config, ?string $defaultValue = null)
    {
        return $_ENV[$config] ?? $defaultValue;
    }
}

if (!function_exists('response')) {
    function response ($data)
    {
        header("Content-Type: application/json");
        return json_encode($data);
    }
}
