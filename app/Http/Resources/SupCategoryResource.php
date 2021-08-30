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

            "servicenamearabic" => $this->name_ar,
            "servicenameenglish" => $this->name_en,
            "serviceimage " => $this->supcategory_image_path,
            "description" => $this->desc,

        ];
    }
}
