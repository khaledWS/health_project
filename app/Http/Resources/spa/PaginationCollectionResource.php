<?php

namespace App\Http\Resources\spa;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $modelResourceNameSpace = 'App\Http\Resources\spa\\'.($this->collection['model']::$resource);
        return [
            'data' => $this->collection['data']->map(function ($data, $modelResourceNameSpace) {
                return new $modelResourceNameSpace($data);
            }),
            'meta' => [
                'count' => $this->collection['count'],
            ],
        ];
    }
}
