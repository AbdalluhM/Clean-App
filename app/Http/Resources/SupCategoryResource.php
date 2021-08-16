<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupCategoryResource extends JsonResource
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

            "service name arabic" => $this->name_ar,
            "service name english" => $this->name_en,
            "service image " => $this->supcategory_image_path,
            "description" => $this->desc,

        ];
    }
}
