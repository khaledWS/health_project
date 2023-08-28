<?php

function reformPaginateAttributes($attributes)
{
    $start = $attributes['start'] ?? 0;
    $length = $attributes['length'] ?? 10;
    $search_value = $attributes['search_value'] ?? null;
    $order_by = $attributes['order_by'] ?? 'id';
    $order_direction = 'desc';
    if ($attributes['order_direction'] == 'desc') {
        $order_direction = 'desc';
    }

    return compact('start', 'length', 'search_value', 'order_by', 'order_direction');
}
