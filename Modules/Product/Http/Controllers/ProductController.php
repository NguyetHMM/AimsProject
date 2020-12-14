<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        return view('product::index');
    }

    public function productDetail($product_id){
        $product = DB::table('products')->where('id',$product_id)->get();
        // dd($product);
        return view('product::productDetail')->with('detailForProduct', $product);;
    }
    
    public function home(){
        return view('welcome');
    }

    public function create()
    {
        return view('product::create');
    }

    public function showBook()
    {
        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',3)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function showCDs()
    {
        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',1)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function showDVDs()
    {
        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',2)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function showPictureBook()
    {
        $all_product_of_1category = DB::table('products')
        ->where('products.productCategoryID',3)
        ->join('books','products.id','=','books.productID')
        ->where('books.category','photobook')
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }
    public function showComic()
    {
        $all_product_of_1category = DB::table('products')
        ->where('products.productCategoryID',3)
        ->join('books','products.id','=','books.productID')
        ->where('books.category','comic')
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }
    public function showTechnologyBook()
    {
        $all_product_of_1category = DB::table('products')
        ->where('products.productCategoryID',3)
        ->join('books','products.id','=','books.productID')
        ->where('books.category','story')
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

}
