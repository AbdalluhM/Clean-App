<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "nameServiceAr" => $this->sup_category->name_ar,
            "nameServiceEn" => $this->sup_category->name_en,
            "image" => $this->sup_category->supcategory_image_path,
            "numrWorkers" => $this->num_workers,
        ];
    }
}
