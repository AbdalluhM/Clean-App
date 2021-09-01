<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecieveDetailsResource extends JsonResource
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
            'serviceNameArabic' => $this->sup_category->name_ar,
            'serviceNameEnglish' => $this->sup_category->name_en,
            'numberEmployee' => $this->num_workers,
        ];
    }
}
