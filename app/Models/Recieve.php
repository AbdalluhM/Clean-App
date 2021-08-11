<?php

namespace App\Models;

use App\Models\RecieveDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recieve extends Model
{
    use HasFactory;
    protected $fillable=['user_id','employee_id','address','time_start','desc'];
    public function user()
    {
        return $this->belongsTo(admin::class);
    }
    public function details()
    {
        return $this->hasMany(RecieveDetails::class,'recieve_id');
    }
}
