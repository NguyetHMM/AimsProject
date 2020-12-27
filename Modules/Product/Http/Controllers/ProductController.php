<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(){
        return view('product::index');
    }

    public function productDetail($product_id){
        $product = DB::table('products')
        ->where('id',$product_id)->get();
        if($product[0]->productTypeID == 2){
            if($product[0]->productCategoryID == 1){
                $detailForProduct = DB::table('products')
                ->join('cds_lps','products.id','=','cds_lps.productID')
                ->join('physical_products','products.id','=','physical_products.productID')
                ->where('products.id',$product_id)
                ->get();
            } else if($product[0]->productCategoryID == 2){
                $detailForProduct = DB::table('products')
                ->join('dvds','products.id','=','dvds.productID')
                ->join('physical_products','products.id','=','physical_products.productID')
                ->where('products.id',$product_id)
                ->get();
            } else if ($product[0]->productCategoryID == 3) {
                $detailForProduct = DB::table('products')
                ->join('books','products.id','=','books.productID')
                ->join('physical_products','products.id','=','physical_products.productID')
                ->where('products.id',$product_id)
                ->get();
            }
            else{
                $detailForProduct = DB::table('products')
                ->join('cds_lps','products.id','=','cds_lps.productID')
                ->join('physical_products','products.id','=','physical_products.productID')
                ->where('products.id',$product_id)
                ->get();
            }
            // dd($detailForProduct);
            return view('product::productDetail',compact('detailForProduct'));
        } else {
            if($product[0]->productCategoryID == 1){
                $detailForProduct = DB::table('products')
                ->join('cds_lps','products.id','=','cds_lps.productID')
                ->join('online_products','products.id','=','online_products.productID')
                ->where('products.id',$product_id)
                ->get();
            } else if($product[0]->productCategoryID == 2){
                $detailForProduct = DB::table('products')
                ->join('dvds','products.id','=','dvds.productID')
                ->join('online_products','products.id','=','online_products.productID')
                ->where('products.id',$product_id)
                ->get();
            } else if ($product[0]->productCategoryID == 3) {
                $detailForProduct = DB::table('products')
                ->join('books','products.id','=','books.productID')
                ->join('online_products','products.id','=','online_products.productID')
                ->where('products.id',$product_id)
                ->get();
            }
            else{
                $detailForProduct = DB::table('products')
                ->join('cds_lps','products.id','=','cds_lps.productID')
                ->join('online_products','products.id','=','online_products.productID')
                ->where('products.id',$product_id)
                ->get();
            }
            // dd($detailForProduct);
            return view('product::productOnlineDetail',compact('detailForProduct'));
        }
        
    }
    
    public function home(){
        return view('welcome');
    }

    public function create(){
        return view('product::create');
    }

    public function showBookPhysical($productKind_id){
        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products_product_kinds.productKindID',$productKind_id)
        ->where('products.productTypeID',2)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function showBookOnline($productKind_id){
        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products_product_kinds.productKindID',$productKind_id)
        ->where('products.productTypeID',1)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
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

    public function showLPs(){
        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',4)
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function search(Request $request)
    {
        $all_product_of_1category = DB::table('products')
        ->where('title','like','%'.$request->infoToSearch.'%')
        ->select('products.id','products.title','products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

}
