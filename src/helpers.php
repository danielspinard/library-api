<?php

if (function_exists('response')) {
    function response ($data)
    {
        json_encode($data);
    }
}