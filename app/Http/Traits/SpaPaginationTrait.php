<?php

namespace App\Http\Traits;


trait SpaPaginationTrait
{

    public function collectPaginationAttributes(\Illuminate\Http\Request $request): array
    {
        $paginationAttributes = [
            'start' => $request->start ?? 0,
            'length' => $request->length ?? 10,
            'search_value' => $request->search_value ?? '',
            'search_fields' => $request->search_fields ?? [],
            'order_by' => $request->order_by ?? 'id',
            'order_direction' => $request->order_direction ?? 'desc'
        ];

        return $paginationAttributes;
    }


    public function addPaginateAttributesToQuery(\Illuminate\Database\Eloquent\Builder $query, array $paginationAttributes): \Illuminate\Database\Eloquent\Builder
    {
        $paginatedQuery = $query->where(function ($query) use ($paginationAttributes) {
            if (isset($paginationAttributes['search_fields'])) {
                foreach ($paginationAttributes['search_fields'] as $key => $field) {
                    if ($key == 0) {
                        $query->where($field, $paginationAttributes['search_value']);
                    } else {
                        $query->orWhere($field, $paginationAttributes['search_value']);
                    }
                }
            }
        })
            ->orderBy($paginationAttributes['order_by'], $paginationAttributes['order_direction'])
            ->offset($paginationAttributes['start'])
            ->limit($paginationAttributes['length']);

        return $paginatedQuery;
    }
}
