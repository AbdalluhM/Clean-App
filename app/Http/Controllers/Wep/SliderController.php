<?php

namespace App\Http\Controllers\Wep;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:slider-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $sliders = Slider::paginate(4);
        return view('dashboard.sliders.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        if (request()->hasFile('image')) {
        $image = time() . '_' . $request->file('image')->hashName();
        $request->file('image')->storeAs('public/images/sliders/', $image);
        $input['image']=$image;
        }
        Slider::create($input);
        session()->flash('success','Slider Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('sliders.update')->with([
            'slider' => $slider,
            // 'categories' => Category::whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $input=$request->all();
        if (request()->hasFile('image')) {
            Storage::disk('public')->delete('/images/sliders/'.$slider->image);
            $image = time() . '_' . $request->file('image')->hashName();
            $request->file('image')->storeAs('public/images/sliders/', $image);
            $input['image']=$image;
        }
        $slider->update($input);
        session()->flash('success','Slider Updated Successfully');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete('/images/sliders/'.$slider->image);
        $slider->delete();
        session()->flash('success','Slider Deleted Successfully');
        return redirect()->back();
    }
}
