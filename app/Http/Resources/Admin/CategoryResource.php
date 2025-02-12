<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(\Illuminate\Http\Request $request)
    {
        return parent::toArray($request);
    }
}
