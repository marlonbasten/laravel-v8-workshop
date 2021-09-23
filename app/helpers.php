<?php

if (!function_exists('is_current_route')) {
    function is_current_route(string $name): string
    {
        return request()->routeIs($name) ? 'active' : '';
    }
}