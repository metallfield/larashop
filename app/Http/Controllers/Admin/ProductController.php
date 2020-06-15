<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::get();
        $products = Product::with('category')->paginate(8);
        return view('auth.products.index', compact(['products', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
      
         $categories = Category::get();
         return view('auth.products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {    
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
        $path = $request->file('image')->store('products');
        $params['image'] = $path;
        }
        foreach (['new', 'hit', 'recommend'] as $fieldname) {
            if(!isset($params[$fieldname])){
                $params[$fieldname] = 1;
            }
        }
        Product::create($params);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::get();
        return view('auth.products.show', compact(['product', 'categories']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        $categories = Category::get();

        return view('auth.products.create', compact(['product', 'categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {   
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
              Storage::delete($product->image);
              $path = $request->file('image')->store('products');
              $params['image'] = $path;
        }
        
       foreach (['new', 'hit', 'recommend'] as $fieldname) {
           if(!isset($params[$fieldname])){
               $params[$fieldname] = 0;
           }
       }
        
        $product->update($params);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
