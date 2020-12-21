<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller
{   
    // public function showa(){ //function test
    //     return view('product::admin.test');
    // }

    public function add_book_phy(){ //done
        $book_kind = DB::table('product_kinds')->where('productCategoryID',3)->get();
        $book_cover = DB::table('covers')->get();
        $physical = DB::table('physical_products')->select('barcode')->get();
        // dd($book_kind);
        return view('product::admin.addbook_phy')->with('kind',$book_kind)->with('cover',$book_cover)->with('barcode', $physical);
    }

    public function save_book_phy(Request $request){ //done
        $product = array();
        $product['title'] = $request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 3;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->last();

        $products_product_kinds = array();
        $products_product_kinds['productID'] = $product_id->id;
        $products_product_kinds['productKindID'] = $request->kind;
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $physical_products = array();
        $physical_products['productID'] = $product_id->id;
        $physical_products['barcode'] = $request->barcode;
        $physical_products['description'] = $request->description;
        $physical_products['quantity'] = $request->quantity;
        $physical_products['length'] = $request->length;
        $physical_products['width'] = $request->width;
        $physical_products['heigth'] = $request->heigth;
        $physical_products['weigh'] = $request->weigh;
        $physical_products['inputDay'] = date("Y-m-d");
        DB::table('physical_products')->insert($physical_products);

        $books = array();
        $books['productID'] = $product_id->id;
        $books['coverID'] = $request->cover_type;
        $books['author'] = $request->author;
        $books['publisher'] = $request->publisher;
        $books['publicationDate'] = $request->public_date;
        $books['releaseDate'] = $request->public_date;
        $books['pages'] = $request->pages;
        $books['category'] = 0;
        DB::table('books')->insert($books);

        // dd($request);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_book']);;
    }

    public function add_book_on(){ //done
        $book_kind = DB::table('product_kinds')->where('productCategoryID',3)->get();
        $book_cover = DB::table('covers')->get();
        // dd($book_kind);
        return view('product::admin.addbook_on')
        ->with('kind',$book_kind)->with('cover',$book_cover)
        ;
    }

    public function save_book_on(Request $request){ //done
        $product = array();
        $product['title'] = $request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 3;
        $product['productTypeID'] = 1;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->last();

        $products_product_kinds = array();
        $products_product_kinds['productID'] = $product_id->id;
        $products_product_kinds['productKindID'] = $request->kind;
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $online_products = array();
        $online_products['productID'] = $product_id->id;
        $online_products['content'] = $request->content;
        DB::table('online_products')->insert($online_products);

        $books = array();
        $books['productID'] = $product_id->id;
        $books['coverID'] = $request->cover_type;
        $books['author'] = $request->author;
        $books['publisher'] = $request->publisher;
        $books['publicationDate'] = $request->public_date;
        $books['releaseDate'] = $request->public_date;
        $books['pages'] = $request->pages;
        $books['category'] = 0;
        DB::table('books')->insert($books);

        // dd($books);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_book']);;
    }

    public function add_dvd_phy(){ //done
        $dvd_kind = DB::table('product_kinds')->where('productCategoryID',2)->get();
        $physical = DB::table('physical_products')->select('barcode')->get();
        // dd($physical);
        return view('product::admin.adddvd_phy')->with('kind',$dvd_kind)->with('barcode', $physical);
    }

    public function save_dvd_phy(Request $request){ //done
        $product = array();
        $product['title'] = $request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] =2;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->last();

        $products_product_kinds = array();
        $products_product_kinds['productID'] = $product_id->id;
        $products_product_kinds['productKindID'] = $request->kind;
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $physical_products = array();
        $physical_products['productID'] = $product_id->id;
        $physical_products['barcode'] = $request->barcode;
        $physical_products['description'] = $request->description;
        $physical_products['quantity'] = $request->quantity;
        $physical_products['length'] = $request->length;
        $physical_products['width'] = $request->width;
        $physical_products['heigth'] = $request->heigth;
        $physical_products['weigh'] = $request->weigh;
        $physical_products['inputDay'] = date("Y-m-d");
        DB::table('physical_products')->insert($physical_products);

        $dvds = array();
        $dvds['productID'] = $product_id->id;
        $dvds['director'] = $request->director;
        $dvds['dvdKind'] = $request->kind;
        $dvds['videoKind'] = $request->video_kind;
        $dvds['studio'] = $request->studio;
        $dvds['subtitles'] = $request->sub_title;
        $dvds['runtime'] = $request->runtime;
        DB::table('dvds')->insert($dvds);

        // dd($physical_products);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_dvd']);
    }

    public function add_dvd_on(){ //done
        $dvd_kind = DB::table('product_kinds')->where('productCategoryID',2)->get();
        return view('product::admin.adddvd_on')->with('kind',$dvd_kind);
    }

    public function save_dvd_on(Request $request){ //done
        $product = array();
        $product['title'] = $request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] =2;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->last();

        $products_product_kinds = array();
        $products_product_kinds['productID'] = $product_id->id;
        $products_product_kinds['productKindID'] = $request->kind;
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $online_products = array();
        $online_products['productID'] = $product_id->id;
        $online_products['content'] = $request->content;
        DB::table('online_products')->insert($online_products);

        $dvds = array();
        $dvds['productID'] = $product_id->id;
        $dvds['director'] = $request->director;
        $dvds['dvdKind'] = $request->kind;
        $dvds['videoKind'] = $request->video_kind;
        $dvds['studio'] = $request->studio;
        $dvds['subtitles'] = $request->sub_title;
        $dvds['runtime'] = $request->runtime;
        DB::table('dvds')->insert($dvds);

        // dd($physical_products);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_dvd']);
    }

    public function add_cd_phy(){
        $cd_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $physical = DB::table('physical_products')->select('barcode')->get();
        // dd($physical);
        return view('product::admin.addcd_phy')->with('kind',$cd_kind)->with('barcode', $physical);
    }

    public function save_cd_phy(Request $request){
        return $request;
    }

    public function add_cd_on(){
        $cd_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        return view('product::admin.addcd_on')->with('kind',$cd_kind);
    }

    public function save_cd_on(Request $request){
        return $request;
    }

    public function add_lp_phy(){
        $lp_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $physical = DB::table('physical_products')->select('barcode')->get();
        // dd($physical);
        return view('product::admin.addlp_phy')->with('kind',$lp_kind)->with('barcode', $physical);
    }

    public function save_lp_phy(Request $request){
        return $request;
    }

    public function add_lp_on(){
        $lp_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        return view('product::admin.addlp_on')->with('kind',$lp_kind);
    }

    public function save_lp_on(Request $request){
        return $request;
    }

    public function all_product(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language', 'promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }
    
    public function all_book(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
        ->where('products.productCategoryID',3)
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
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
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
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
        ->where('product_categories.name','dvds')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with('product', $data);
    }
}
