<?php

namespace App\Models;

use App\Models\Recieve;
use App\Models\SupCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecieveDetails extends Model
{

    use HasFactory;
    protected $fillable=['recieve_id','sup_category_id','num_workers'];

    public function sup_category()
    {
        return $this->belongsTo(SupCategory::class,'sup_category_id');
    }
    // public function recieveDetails(){
    //     return $this->belongsTo(Recieve::class,'recieve_id','id');
    // }
    public function recieve(){
        return $this->belongsTo(Recieve::class);
    }
}
