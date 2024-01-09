<?php

function base_path(string $path = ''): string
{
    // Add auto /
    if ($path && $path[0] !== '/') {
        $path = '/' . $path;
    }

    $path = APP_BASE_PATH . $path;
    return str_replace("\\", "/", $path);
}

function test_path(string $path = ''): string
{
    $path = __DIR__ . "/../" . $path;
    return str_replace("\\", "/", $path);
}