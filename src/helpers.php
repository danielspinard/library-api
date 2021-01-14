<?php

if (!function_exists('response')) {
    function response ($data)
    {
        return json_encode($data);
    }
}