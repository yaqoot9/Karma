<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {$products=Product::with('category')->get();
        return view('Dashboard.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  $categories=Category::where('parent_id','!=',null)->get();

        if ($categories->count()==0){
            return redirect()->route ('dashboard.categories.create')->with('success','No categories found please create category');
        }
        return view ('Dashboard.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $data=$request->except('image');
    $path=$request->file('image')->store('products');
    $data['image']=$path;
    Product::create($data);
    return redirect ()->route('dashboard.products.index')->with('success','created done!');

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
    {$product=Product::findOrFail($id);
     $categories=Category::where('parent_id','!=',null)->get();
    return view('Dashboard.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $product=Product::findOrFail($id);
       $data=$request->except('image');
       $old_image=$product->image;
       $data['image']=$path??$old_image;
       if($request->hasFile('image')){
        $path=$request->file('image')->store('products');
       }
       $product->update($data);
return redirect ()->route('dashboard.products.index')->with('success','product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product=Product::findOrFail($id);
       $product->delete();
       Storage::delete($product->image);
       return  redirect()->back()->with('success','Product deleted');

    }
}
