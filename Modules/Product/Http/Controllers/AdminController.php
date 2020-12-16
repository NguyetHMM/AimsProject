<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function add_book_phy(){
        $book_kind = DB::table('product_kinds')->where('productCategoryID',3)->get();
        $book_cover = DB::table('covers')->get();
        // dd($book_kind);
        return view('product::admin.addbook_phy')->with('kind',$book_kind)->with('cover',$book_cover);
    }

    public function save_book_phy(Request $request){
        $data = array();
        dd($request);
        return 0;
    }




    public function all_product(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->join('promotions','products.promotionID','=','promotions.id')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }
    
    public function all_book(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->join('promotions','products.promotionID','=','promotions.id')
        ->where('product_categories.name','books')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }

    public function all_cd_lp(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->join('promotions','products.promotionID','=','promotions.id')
        ->where('product_categories.name','cds_lps')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }

    public function all_dvd(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->join('promotions','products.promotionID','=','promotions.id')
        ->where('product_categories.name','dvds')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }
}
