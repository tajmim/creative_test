<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
// category funct
public function view(){
    $categories = Category::all();
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
        return view('products');
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
        $product = new Product;
        $product->name = $request->name;
        $product->caregory = $request->category;
        $product->feature = $request->feature;
        dd($product);
        $product->save();
        return redirect()->back()->with('message','product added successfully');

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
