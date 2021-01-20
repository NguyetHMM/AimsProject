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
        $productKindID = $productKind_id;
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        // dd($bookKinds);
        
        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products_product_kinds.productKindID',$productKind_id)
        ->where('products.productTypeID',2)
        ->select('products.id','products.title','products.price','productKindID')
        ->orderBy('products.price')
        ->paginate(8);

        // dd($productKindID);
        // return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
        return view('product::showProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category','productKindID'));
    }

    public function showBookOnline($productKind_id){
        $productKindID = $productKind_id;
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products_product_kinds.productKindID',$productKind_id)
        ->where('products.productTypeID',1)
        ->select('products.id','products.title','products.price','productKindID')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        // return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
        return view('product::showProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category','productKindID'));
    }

    public function showBook()
    {
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products.productCategoryID',3)
        ->select('products.id','products.title','products.price','productKindID')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProductFollowCate',compact('all_product_of_1category','lpKinds','cdKinds','dvdKinds','bookKinds'));
    }

    public function showCDs()
    {
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',1)
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProductFollowCate',compact('all_product_of_1category','lpKinds','cdKinds','dvdKinds','bookKinds'));
    }

    public function showDVDs()
    {
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',2)
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProductFollowCate',compact('all_product_of_1category','lpKinds','cdKinds','dvdKinds','bookKinds'));
    }

    public function showLPs(){
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',4)
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProductFollowCate',compact('all_product_of_1category','lpKinds','cdKinds','dvdKinds','bookKinds'));
    }

    public function searchInShowProduct(Request $request){
        // dd($request->all());
        $nameSearch = $request->nameProduct;
        $productKindID = $request->productKindID;
        // dd($productKindID);
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        ->where('products_product_kinds.productKindID',$request->productKindID)
        // ->where('products.productTypeID',1)
        ->where('products.title','like','%'.$nameSearch.'%')
        ->select('products.id','products.title','products.price','productKindID')
        ->orderBy('products.price')
        ->paginate(8);

        if(!isset($all_product_of_1category[0]))
            return view('product::showProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category','productKindID'))->withErrors('Không tìm thấy sản phẩm');
        // dd($all_product_of_1category);
        // return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
        return view('product::showProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category','productKindID'));
    }
    public function searchInShowProduct2(Request $request){
        $nameSearch = $request->nameProduct;
    
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->get();
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->get();
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->get();

        $all_product_of_1category = DB::table('products_product_kinds')
        ->join('products','products_product_kinds.productID','=','products.id')
        // ->where('products.productTypeID',1)
        ->where('products.title','like','%'.$nameSearch.'%')
        ->select('products.id','products.title','products.price','productKindID')
        ->orderBy('products.price')
        ->paginate(8);
        if(!isset($all_product_of_1category[0]))
            return view('product::showProductFollowCate',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category'))->withErrors('Không tìm thấy sản phẩm');
        
        // dd($all_product_of_1category);
        // return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
        return view('product::showProductFollowCate',compact('bookKinds','dvdKinds','cdKinds','lpKinds','all_product_of_1category'));
    }
    public function search(Request $request)
    {
        $bookKinds = DB::table('product_kinds')
        ->where('productCategoryID',3)
        ->paginate(8);
        $dvdKinds = DB::table('product_kinds')
        ->where('productCategoryID',2)->paginate(8);
        $cdKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->paginate(8);
        $lpKinds = DB::table('product_kinds')
        ->where('productCategoryID',1)->paginate(8);
        // dd($request->infoToSearch);
        $allProduct = DB::table('products')
        ->where('title','like','%'.$request->infoToSearch.'%')
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        if(!isset($allProduct[0]))
            return view('showAllProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','allProduct'))->withErrors('Không tìm thấy sản phẩm');
        return view('showAllProduct',compact('bookKinds','dvdKinds','cdKinds','lpKinds','allProduct'));
    }

    public function filterFollowPrice(Request $request){
        $html = '';
        $products = [];
        $all_product = $request->all_product['data'];
        if($request->ajax()){
            if($request->rangePrice == 1){
                foreach($all_product as $product){
                    if($product['price'] < 100){
                        $products[] = $product;
                    }
                }
            } elseif ($request->rangePrice == 2){
                foreach($all_product as $product){
                    if($product['price'] >= 100 && $product['price'] < 200){
                        $products[] = $product;
                    }
                }
            } elseif($request->rangePrice == 3){
                foreach($all_product as $product){
                    if($product['price'] >= 200 && $product['price'] < 300){
                        $products[] = $product;
                    }
                }
            } elseif($request->rangePrice == 4){
                foreach($all_product as $product){
                    if($product['price'] >= 300 && $product['price'] < 400){
                        $products[] = $product;
                    }
                }
            } elseif($request->rangePrice == 5){
                foreach($all_product as $product){
                    if($product['price'] >= 400){
                        $products[] = $product;
                    }
                }
            } else{
                foreach($all_product as $product){
                   $products[] = $product;
                }
            }
            $countProduct = count($products);
            if($countProduct != 0){
                $image = 'https://img1.od-cdn.com/ImageType-400/0111-1/8BE/FE7/3D/%7B8BEFE73D-9E68-4B56-A46F-7D7C9F8E87D1%7DImg400.jpg';
                for($i=0;$i<count($products); $i++){
                    $html .= sprintf('
                        <div class="col-md-3 col-sm-3 col-xs-6 grid-item cat2 cat3">
                            <div class="single-portfolio-card mb--30">
                                <div class="">
                                    <a href="%s/%d">
                                    <img src="%s " alt="" />
                                    </a>
                                </div>
                                <div class="portfolio-title portfolio-card-title text-center">
    
                                    <h4><a
                                            href="%s.%d">%s</a>
                                    </h4>
                                    <span>Price :</span>
                                    <span>
                                        %f $
                                    </span>
                                </div>
                            </div>
                        </div>
                        ',"product-detail",$products[$i]['id'],$image, "'product/product-detail/'",$products[$i]['id'], $products[$i]['title'],$products[$i]['price']);
                    // $html = sprintf('%d',$products[$i]['id']);
                }
            } else {
                $html = sprintf('Ko có sản phẩm ');
            }
            
            
            return response()->json([
                'success' => "",
                'products' => $products,
                'producthtml' => $html,
                'count' => $countProduct,
            ], 200);
        }
    }

}
