<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecieveResource extends JsonResource
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
            'id'=>$this->id,
            'address'=>$this->address,
            'name employee'=>$this->user->name,
            'Details'=> $this-> details(),
        ];
    }
    public function details(){
        $details=RecieveDetailsResource::collection($this->details);
        return $details ;
    }
}
