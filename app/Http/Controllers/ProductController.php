<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List all products with categories
        $products = Product::all();
     
        // Return to product list with parameters
        return view('products.index')
            ->with('products', $products);
    }

   /**
     * Created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // List all categories
        $categories = Category::all();

        // Return to product create with parameters
        return view('products.create')
            ->with("categories", $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Add new product
        $product = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $categories           = $request->categories;
        
        // Save product
        $product->save();
    
        // Attach categories to product
        $product->categories()->attach($categories);

        // Save product & categories to table relationship
        $product->save();

        // Redirect to product list
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find by product id with categories
        $product = Product::find($id);

        // Return to product show with parameters
        return view('products.show')
            ->with('product', $product);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find by product id with categories
        $product = Product::with('categories')->find($id);

        // List categories
        $categories = Category::all();

        // Find categorie by id array of product
        $product->categories;
        foreach ($product->categories as $category) {
            $productCategory = $category->id;
        }
        
        // Return to product edit with parameters
        return view('products.edit')
            ->with('categories', $categories)
            ->with('product', $product)
            ->with('productCategory', $productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find by product id with categories
        $product = Product::find($id);
        $product->name        = $request->name;
        $product->description = $request->description;
        $categories           = $request->categories;
    
        // Sync product with categories
        $product->categories()->sync($categories);
        
        // Update product & categories to table relationship
        $product->save();

        // Redirect to product list
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
