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
        $books = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',2)
        ->select('products.id','products.title','products.price')
        ->paginate(12);
        // dd($books);
        return view('product::showBook')->with('Books',$books);
    }

}
