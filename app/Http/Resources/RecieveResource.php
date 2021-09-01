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
            'Employee'=>$this->employee_details(),
            'details'=> $this-> details(),
        ];
    }
    public function details(){
        $details=RecieveDetailsResource::collection($this->details);
        return $details ;
    }

    public function employee_details(){
        if ($this->employee) {
            $employee=[];
            $employee['name']=$this->employee->name;
            if ($this->employee->admin_image_path) {
                $employee['image']=$this->employee->admin_image_path;
            }
            return $employee ;
        }

        return "no employee yet";
    }
}
