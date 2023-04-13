<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //with use to relation
        $category=Category::whereNull('parent_id')->with('children')->get();
        return view ('Dashboard.Category.index',compact('category')) ;       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::whereNull('parent_id')->get();
return view('Dashboard.Category.create',compact('parents'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'title'=>'required',
        'status'=>['required','boolean'],

      ]);
    Category::create([
        'title'=>$request->title,
        'parent_id'=>$request->parent_id,
        'statuse'=>$request->boolean('status')
    ]);
    //post redirect get alwas
    return redirect()->route('dashboard.categories.index')->with('success','category created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {    $category=Category::find($id);
         $parents=Category::whereNull('parent_id')->get();
        return view('Dashboard.Category.edit',compact('parents','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'status'=>['required','boolean'],

          ]);
      $category=Category::find($id);
      $data=$request->except(['_token']);
      $category->update($data);
        //post redirect get alwas
        return redirect()->route('dashboard.categories.index')->with('success','category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return  redirect()->back()->with('success','Deleted done');
    }
}
