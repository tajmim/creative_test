<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;

class ProductController extends Controller
{
// category funct
public function view(){
    $categories = Category::withCount('products')->paginate(10);
    return view('category',compact('categories'));
}

public function stores(Request $request){
    $category = new Category();
    // dd($request->all());
    $category->name = $request->name;
    $category->save();

    return redirect()->back()->with('message','category added successfully');    }











    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $features = Feature::all();

        $products = Product::with('categories', 'features')->paginate(10);

        return view('products',compact('categories', 'features','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $imagePath = asset('storage/' . $path);
        } else {
            $imagePath = null;
        }

        // Store product
        $product = new Product();
        $product->name = $request->name;
        $product->image = $imagePath;
        $product->save();

        // Attach categories
        $product->categories()->attach($request->category_id);

        // Attach features
        $product->features()->attach($request->feature_id);





        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
