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
        ->orderBy('products.price')
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
        ->orderBy('products.price')
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
        ->orderBy('products.price')
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
        ->orderBy('products.price')
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
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function showLPs(){
        $all_product_of_1category = DB::table('products')
        ->leftjoin('product_categories','products.productCategoryID','=','product_categories.id')
        ->where('products.productCategoryID',4)
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
    }

    public function search(Request $request)
    {
        $all_product_of_1category = DB::table('products')
        ->where('title','like','%'.$request->infoToSearch.'%')
        ->select('products.id','products.title','products.price')
        ->orderBy('products.price')
        ->paginate(8);
        // dd($all_product_of_1category);
        return view('product::showProduct')->with('all_product_of_1category',$all_product_of_1category);
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
                for($i=0;$i<count($products); $i++){
                    $html = sprintf('
                        <div class="col-md-3 col-sm-3 col-xs-6 grid-item cat2 cat3">
                            <div class="single-portfolio-card mb--30">
                                <div class="">
                                    <a href="{{URL::to(%s.%d}}">
                                        <img src="{{asset(%s)}}" alt="" />
                                    </a>
                                    {{-- <div class="portfolio-icon">
                                        <a class="img-poppu" href="images/portfolio/equal/2.jpg">
                                            <i class="zmdi zmdi-instagram"></i>
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="portfolio-title portfolio-card-title text-center">
    
                                    <h4><a
                                            href="{{URL::to(%s.%d)}}">{{%s}}</a>
                                    </h4>
                                    <span>Price :</span>
                                    <span>
                                        <script>
                                            function number(n) {
                                                return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, %s) + %s;
                                            }
                                            document.write(number({{%.2f}}));
                                        </script>
                                    </span>
                                </div>
                            </div>
                        </div>
                        ',"'product/product-detail/'",$products[$i]['id'], "'images/portfolio/equal/1.jpg'", "'product/product-detail/'",$products[$i]['id'], $products[$i]['title'],"'$1,'", "' $'",$products[$i]['price']);
                    // $html = sprintf('%d',$products[$i]['id']);
                }
            } else {
                $html = sprintf('kokokokokoko');
            }
            
            
            return response()->json([
                'success' => "Nộp bài thành công!",
                'products' => $products,
                'producthtml' => $html,
            ], 200);
        }
    }

}
