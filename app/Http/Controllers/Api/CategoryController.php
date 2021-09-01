<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Category::all();
        try {
            return $this->returnData('Categories', CategoryResource::collection($categories), "");
        } catch (\Throwable $th) {
            return $this->returnError(500, $th->getMessage());
        }
    }
}
