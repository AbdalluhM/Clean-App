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

            "categorynamearabic"=>$this->name_ar,
            "categorynameenglish"=>$this->name_en,
            "categoryimage "=>$this->category_image_path,
            "description" =>$this->desc,

        ];
    }
}
