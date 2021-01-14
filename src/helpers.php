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
        return json_encode($data);
    }
}
