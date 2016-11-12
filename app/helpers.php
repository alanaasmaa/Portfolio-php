<?php

/**
 * Navbar active class
 */
function set_active($path, $active = 'active')
{
    return Request::is($path) ? $active : '';
}

function description_trim($description, $limit = 500, $end = '...')
{
    $description = strip_tags(str_limit($description, $limit, $end));
    $description = str_replace("  ", "", $description);
    $description = str_replace("\n", "", $description);
    return $description;
}
