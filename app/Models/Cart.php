<?php

namespace App\Models;

use App\Models\SupCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['sup_category_id', 'num_workers', 'clean_resources', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sup_category()
    {
        return $this->belongsTo(SupCategory::class);
    }
}
