<?php

namespace App\Http\Resources;

use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'name' => $this->name,
        ];
        if($request->has('includeProducts')){
            $result['products'] = count($this->items()) ? ProductResource::collection($this->items()) : null;
        }

        return $result;
    }
}
