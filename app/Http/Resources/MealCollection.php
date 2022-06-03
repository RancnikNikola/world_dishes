<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\Paginator;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'meta' => [
                'currentPage' => $this->currentPage(),
                'totalItems' => $this->total(),
                'itemsPerPage' => $this->perPage(),
                'totalPages' => $this->lastPage()
            ],
            'data' => $this->collection,
            'links' => [
                'self' => url()->full()
            ]
        ];
    }
}
