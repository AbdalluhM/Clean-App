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
    // function __construct()
    // {
    //     $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store', 'sub_category']]);
    //     $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $categories =  Category::paginate(4);
        return view('dashboard.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        // $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.add');
    }


    public function store(CategoryRequest $request)
    {
        $image = time() . '_' . $request->file('image')->hashName();
        $request->file('image')->storeAs('public/images/categories/', $image);
        Category::create(array_merge($request->all(), ['image' => $image]));
        session()->flash('success', 'category created successfully');
        return redirect()->back();
    }
    public function edit(Category $category)
    {
        return view('dashboard.categories.update')->with(['category' => $category]);
    }



    public function update(Request $request, Category $category)
    {

        $input= $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image'=>'mimes:png,jpg,jepg'
        ]);
        if (request()->hasFile('image')) {

            Storage::disk('public')->delete('/images/categories/' . $category->image);
            $image = time() . '_' . $request->file('image')->hashName();
            $request->file('image')->storeAs('public/images/categories/', $image);
            $input['image']=$image;
        }

        $category->update($input);
        session()->flash('success', 'Category Updated Successfully');

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete('/images/categories/' . $category->image);
        // $sup = Category::where('parent_id', $category->id);
        // $sup->delete();
        $category->delete();
        session()->flash('success', 'Category Deleted Successfully');
        return redirect(route('categories.index'));
    }


    public function search(Request $request)
    {
        $category_name=trim($request->searchName);
        $category = Category::where('category_name','like',"%{$category_name}%")->paginate(5);
        return view('dashboard.categories.index')->with('categories', $category);
    }
}
