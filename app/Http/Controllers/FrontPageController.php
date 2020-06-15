<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsFilterRequest;
class FrontPageController extends Controller
{
    public function front_page(ProductsFilterRequest $request){
        $productsQuery = Product::with('category');
        
       if ($request->filled('price_from')) {
           $productsQuery->where('price', '>=', $request->price_from);
       }
       if ($request->filled('price_to')) {
           $productsQuery->where('price', '<=', $request->price_to);
       }
       foreach(['hit', 'new', 'recommend'] as $field){
           if ($request->has($field)) {
            $productsQuery->$field();
           }
       }
       $products = $productsQuery->paginate(9)->withPath('?'.$request->getQueryString());
        $categories =  Category::all()->take(5);
        return view('home.front-page', ['categories' => $categories,
            'products' => $products]);
    }

    public function categories(){
       $categories =  Category::all();
        return view('categories' ,['categories' => $categories ]);
    }
    public function category($code){
       $category =  Category::where('code', $code)->first();
          $categories =  Category::all()->take(5);
        return view('category', ['categories' => $categories,
            'category' => $category]);
    }

    public function product($category, $product){
        $categories =  Category::all()->take(5);
        $product_info = Product::withTrashed()->ByCode($product)->firstOrFail();
        return view('product',[  'categories' => $categories,
            'product' => $product,
            'product_info' => $product_info,
        ]);
    }

}
