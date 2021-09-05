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
            // 'id' => $this->id,
            'address' => $this->address,
            'date'=>$this->created_at,
            'Employee' => $this->employee_details(),
            'details' => RecieveDetailsResource::collection($this->details),
            'status'=>$this->status(),
        ];
    }
    public function status(){
        if (!empty($this->status || $this->status != 0)) {
            return "completed";
        }
        return  "not completed";
    }
    public function details()
    {
        $details = RecieveDetailsResource::collection($this->details);
        return $details;
    }

    public function employee_details()
    {
        if (!empty($this->employee_id)) {
            $employee = [];
            $employee['name'] = $this->employee->name;
            $employee['worked']=$this->employee->worked;
            $employee['phone']=$this->employee->phone;
            if ($this->employee->admin_image_path) {
                $employee['image'] = $this->employee->admin_image_path;
            }
            return $employee;
        }

        return "no employee yet";
    }
}
