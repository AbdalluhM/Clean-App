<?php

namespace App\Http\Resources;

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
        return [

            "category name arabic"=>$this->name_ar,
            "category name english"=>$this->name_en,
            "category image "=>$this->category_image_path,
            "description" =>$this->desc,

        ];
    }
}
