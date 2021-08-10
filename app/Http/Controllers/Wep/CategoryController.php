<?php

namespace App\Http\Controllers\Wep;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store', 'sub_category']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $categories =  Category::paginate(4);
        return view('categories.index')->with('categories', $categories);
    }

    public function createCategory()
    {
        // $categories = Category::whereNull('parent_id')->get();
        return view('categories.add');
    }


    public function store(CategoryRequest $request)
    {
        $image = time() . '_' . $request->file('category_image')->hashName();
        $request->file('category_image')->storeAs('public/images/categories/', $image);
        Category::create(array_merge($request->all(), ['category_image' => $image]));
        session()->flash('success', 'category created successfully');
        return redirect()->back();
    }
    public function edit(Category $category)
    {
        return view('categories.update')->with(['category' => $category]);
    }



    public function update(CategoryRequest $request, Category $category)
    {
        $input=$request->all();
        if (request()->hasFile('image')) {

            Storage::disk('public')->delete('/images/categories/' . $category->category_image);
            $image = time() . '_' . $request->file('category_image')->hashName();
            $request->file('image')->storeAs('public/images/categories/', $image);
            $input['image']=$image;
        }

        $category->update($input);
        session()->flash('success', 'Category Updated Successfully');

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete('/images/categories/' . $category->category_image);
        $sup = Category::where('parent_id', $category->id);
        $sup->delete();
        $category->delete();
        session()->flash('success', 'Category Deleted Successfully');
        return redirect(route('categories.index'));
    }


    public function search(Request $request)
    {
        $category_name=trim($request->searchName);
        $category = Category::where('category_name','like',"%{$category_name}%")->paginate(5);
        return view('categories.index')->with('categories', $category);
    }
}
