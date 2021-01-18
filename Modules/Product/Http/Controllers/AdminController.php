<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class AdminController extends Controller
{   
    public function error()
    {
        return view('product::admin.404');
    }

    public function add_book_phy(){ //done
        $book_kind = DB::table('product_kinds')->where('productCategoryID',3)->get();
        $book_cover = DB::table('covers')->get();
        // dd($book_kind);
        return view('product::admin.addbook_phy')->with('kind',$book_kind)->with('cover',$book_cover);
    }

    public function save_book_phy(Request $request){ //done
        
        $request->validate([
            'barcode' => 'unique:physical_products'
        ]);

        $product = array();
        $product['title'] = 'Book. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 3;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();

        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
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
        $books['pages'] = $request->pages;
        $books['category'] = $request->book_category;
        DB::table('books')->insert($books);
        
        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);

        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_book']);
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
        $product['title'] = 'Book. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 3;
        $product['productTypeID'] = 1;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();

        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
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
        $books['pages'] = $request->pages;
        $books['category'] = $request->book_category;
        DB::table('books')->insert($books);

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($books);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_book']);;
    }

    public function add_dvd_phy(){ //done
        $dvd_kind = DB::table('product_kinds')->where('productCategoryID',2)->get();
        
        return view('product::admin.adddvd_phy')->with('kind',$dvd_kind);
    }

    public function save_dvd_phy(Request $request){ //done
        $request->validate([
            'barcode' => 'unique:physical_products'
        ]);

        $product = array();
        $product['title'] = 'DVD. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] =2;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();

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

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
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
        $product['title'] = 'DVD. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] =2;
        $product['productTypeID'] = 1;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();

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

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($physical_products);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_dvd']);
    }

    public function add_cd_phy(){ //done
        $cd_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $tracks = DB::table('tracks')->get();
        // dd($physical);
        return view('product::admin.addcd_phy')->with('kind',$cd_kind)->with('tracks', $tracks);
    }

    public function save_cd_phy(Request $request){ //done
        $request->validate([
            'barcode' => 'unique:physical_products'
        ]);

        $product = array();
        $product['title'] = 'CD. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 1;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();
        
        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
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

        $cds = array();
        $cds['productID'] = $product_id->id;
        $cds['artists'] = $request->artists;
        $cds['recordLabel'] = $request->record_label;
        $cds['musicType'] = $request->music_type;
        $cds['releaseDate'] = $request->release_date;
        DB::table('cds_lps')->insert($cds);

        $tracks =array();
        for($i=0;$i<count($request->tracks);$i++){
            $tracks[] = [
                'productID' => $product_id->id,
                'trackID' => $request->tracks[$i],
            ];
        }
        DB::table('cd_lp_track')->insert($tracks);

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($tracks);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_cd_lp']);
    }

    public function add_cd_on(){ //done
        $cd_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $tracks = DB::table('tracks')->get();
        return view('product::admin.addcd_on')->with('kind',$cd_kind)->with('tracks', $tracks);
    }

    public function save_cd_on(Request $request){ //done
        $product = array();
        $product['title'] = 'CD. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 1;
        $product['productTypeID'] = 1;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();
        
        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $online_products = array();
        $online_products['productID'] = $product_id->id;
        $online_products['content'] = $request->content;
        DB::table('online_products')->insert($online_products);

        $cds = array();
        $cds['productID'] = $product_id->id;
        $cds['artists'] = $request->artists;
        $cds['recordLabel'] = $request->record_label;
        $cds['musicType'] = $request->music_type;
        $cds['releaseDate'] = $request->release_date;
        DB::table('cds_lps')->insert($cds);

        $tracks =array();
        for($i=0;$i<count($request->tracks);$i++){
            $tracks[] = [
                'productID' => $product_id->id,
                'trackID' => $request->tracks[$i],
            ];
        }
        DB::table('cd_lp_track')->insert($tracks);

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($tracks);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_cd_lp']);
    }

    public function add_lp_phy(){ //done
        $lp_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $tracks = DB::table('tracks')->get();
        // dd($physical);
        return view('product::admin.addlp_phy')->with('kind',$lp_kind)->with('tracks', $tracks);
    }

    public function save_lp_phy(Request $request){ //done
        $request->validate([
            'barcode' => 'unique:physical_products'
        ]);

        $product = array();
        $product['title'] = 'LP. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 4;
        $product['productTypeID'] = 2;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();
        
        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
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

        $cds = array();
        $cds['productID'] = $product_id->id;
        $cds['artists'] = $request->artists;
        $cds['recordLabel'] = $request->record_label;
        $cds['musicType'] = $request->music_type;
        $cds['releaseDate'] = $request->release_date;
        DB::table('cds_lps')->insert($cds);

        $tracks =array();
        for($i=0;$i<count($request->tracks);$i++){
            $tracks[] = [
                'productID' => $product_id->id,
                'trackID' => $request->tracks[$i],
            ];
        }
        DB::table('cd_lp_track')->insert($tracks);

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($tracks);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_cd_lp']);
    }

    public function add_lp_on(){ //done
        $lp_kind = DB::table('product_kinds')->where('productCategoryID',1)->get();
        $tracks = DB::table('tracks')->get();
        return view('product::admin.addlp_on')->with('kind',$lp_kind)->with('tracks', $tracks);
    }

    public function save_lp_on(Request $request){ //done
        $product = array();
        $product['title'] = 'LP. '.$request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        $product['productCategoryID'] = 4;
        $product['productTypeID'] = 1;
        DB::table('products')->insert($product);

        $product_id = DB::table('products')->select('id')->get()->max();
        
        $products_product_kinds = array();
        for($i = 0; $i<count($request->kind);$i++){
            $products_product_kinds [] = [
                'productID' => $product_id->id,
                'productKindID' => $request->kind[$i],
            ];
        };
        DB::table('products_product_kinds')->insert($products_product_kinds);

        $online_products = array();
        $online_products['productID'] = $product_id->id;
        $online_products['content'] = $request->content;
        DB::table('online_products')->insert($online_products);

        $cds = array();
        $cds['productID'] = $product_id->id;
        $cds['artists'] = $request->artists;
        $cds['recordLabel'] = $request->record_label;
        $cds['musicType'] = $request->music_type;
        $cds['releaseDate'] = $request->release_date;
        DB::table('cds_lps')->insert($cds);

        $tracks =array();
        for($i=0;$i<count($request->tracks);$i++){
            $tracks[] = [
                'productID' => $product_id->id,
                'trackID' => $request->tracks[$i],
            ];
        }
        DB::table('cd_lp_track')->insert($tracks);

        $admin_active = array();
        $admin_active['userID'] = Auth::user()->id;
        $admin_active['productID'] = $product_id->id;
        $admin_active['description'] = 'Add';
        DB::table('admin_activities')->insert($admin_active);
        // dd($tracks);
        Session::put('message','Add product successfully!');
        return \redirect()->action([AdminController::class, 'all_cd_lp']);
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
        return view('product::admin.showProduct')->with([
            'product' => $data,
            'name_show' => 'Show Products'
            ]);
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
        return view('product::admin.showProduct')->with([
            'product' => $data,
            'name_show' => 'Show Books'
            ]);
    }

    public function all_cd_lp(){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
        ->where('product_categories.name','cds')->orwhere('product_categories.name','lps')
        ->orderBy('products.id', 'asc')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name',
        'products.id AS id','products.title','products.price','products.value','products.language','promotions.percent')
        ->get();
        // dd($data);
        return view('product::admin.showProduct')->with([
            'product' => $data,
            'name_show' => 'Show CDs and LPs'
            ]);
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
        return view('product::admin.showProduct')->with([
            'product' => $data,
            'name_show' => 'Show DVDs'
            ]);
    }

    public function show_product($product_id){
        $data = DB::table('products')
        ->join('product_categories','products.productCategoryID','=','product_categories.id')
        ->join('product_types','products.productTypeID','=','product_types.id')
        ->leftjoin('promotions','products.promotionID','=','promotions.id')
        ->select('product_categories.name AS category_name', 'product_types.name AS type_name', 'product_categories.id AS categoryID', 'product_types.id AS typeID',
        'products.id AS id','products.title','products.price','products.value','products.language', 'promotions.percent')
        ->where('products.id',$product_id)
        ->get();
        if(!isset($data[0])){
            abort(404);
        }
        if($data[0]->categoryID == 4) $data[0]->categoryID=1;
        $product_des = array();

        if($data[0]->category_name == 'books'){
            $product_des = DB::table('books')
            ->join('covers', 'books.coverID','=','covers.id')
            ->where('books.productID',$product_id)
            ->get();
            $name = 'Book';
        }
        elseif($data[0]->category_name == 'dvds'){
            $product_des = DB::table('dvds')
            ->where('dvds.productID',$product_id)
            ->get();
            $name = 'DVD';
        }
        elseif($data[0]->category_name == 'cds' || $data[0]->category_name == 'lps'){
            $product_des = DB::table('cds_lps')
            ->where('cds_lps.productID',$product_id)
            ->get();
            $t = DB::table('cd_lp_track')->where('productID', $product_id)->get();
            $cd_lp_track = array();
            foreach ($t as $key => $value) {
                array_push($cd_lp_track, $value->trackID);
            }
        
            if($data[0]->category_name == 'cds') $name = 'CD';
            else $name = 'LP';
        }


        $book_cover = DB::table('covers')->get();
        $track = DB::table('tracks')->get();
        
        $kind = DB::table('product_kinds')
        ->where('productCategoryID',$data[0]->categoryID)->get();
        $product_kind = array();
        $a = DB::table('products_product_kinds')
        ->where('productID',$product_id)->select('productKindID AS id')->get();
        foreach ($a as $key => $value) {
            array_push($product_kind, $value->id);
        }
        // dd($product_kind);
        $category = DB::table('books')
        ->join('covers','books.coverID','=','covers.id')
        ->where('productID',$product_id)->get();

        $product_type = array();
        if($data[0]->type_name == 'online')
            $product_type = DB::table('online_products')->where('productID', $product_id)->get();
        else $product_type = DB::table('physical_products')->where('productID', $product_id)->get();

        if(isset($cd_lp_track)){
            return view('product::admin.showDetailPro')->with([
                'product' => $data[0],
                'kind' => $kind,
                'category' => $category,
                'desc' => $product_des[0],
                'tracks' => $cd_lp_track,
                'co_tra' => ['covers' => $book_cover, 'tracks' =>$track ],
                'product_kind' => $product_kind,
                'name' => $name,
                'type' => $product_type[0],
                ]);
        }else{
            return view('product::admin.showDetailPro')->with([
                'product' => $data[0],
                'kind' => $kind,
                'category' => $category,
                'desc' => $product_des[0],
                'co_tra' => ['covers' => $book_cover, 'tracks' =>$track ],
                'product_kind' => $product_kind,
                'name' => $name,
                'type' => $product_type[0],
                ]);
        }
    }
    
    public function delete_product(Request $request){
        for($i = 0; $i < count($request->id); $i++){
            DB::table('products')->where('id', $request->id[$i])->delete();
            $admin[] = [
                'userID' => Auth::user()->id,
                'productID' => $request->id[$i],
                'description' => 'Delete'
            ];
            DB::table('admin_activities')->where('id', $request->id[$i])->insert($admin);
        }
        return response()->json([
            'data' => $request->id,
        ]);
    }

    public function update_product(Request $request, $product_id){
        //Update Product Table
        $product = array();
        $product['title'] = $request->title;
        $product['value'] = $request->value;
        $product['price'] = $request->price;
        $product['language'] = $request->language;
        DB::table('products')->where('id', $product_id)->update($product);
        
        $category = array();
        if(isset($request->author)) //update Book
        {
            $category[] = [
                'coverID' => $request->cover_type,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'publicationDate' => $request->public_date,
                'pages' => $request->pages
            ];
            $name = 'book';
            DB::table('books')->where('productID', $product_id)->update($category[0]);
        } 
        elseif(isset($request->director)) //update DVD
        {
            $category[] = [
                'director' => $request->director,
                'dvdKind' => $request->kind[0],
                'videoKind' => $request->video_kind,
                'studio' => $request->studio,
                'subtitles' => $request->sub_title,
                'runtime' => $request->run_time
            ];
            $name = 'dvd';
            DB::table('dvds')->where('productID', $product_id)->update($category[0]);
        }
        else //update CD or LP
        {
            $category[]= [
                'artists' => $request->artists,
                'recordLabel' => $request->record_label,
                'musicType' => $request->music_type,
                'releaseDate' => $request->release_date
            ];
            DB::table('cds_lps')->where('productID', $product_id)->update($category[0]);

            DB::table('cd_lp_track')->where('productID', $product_id)->delete();
            for($i = 0; $i<count($request->tracks);$i++){
                $track [] = [
                    'productID' => $product_id,
                    'trackID' => $request->tracks[$i],
                ];
            }
            DB::table('cd_lp_track')->insert($track);            
            $name = 'cd_lp';            
        }

        DB::table('products_product_kinds')->where('productID', $product_id)->delete();
        for($i = 0; $i<count($request->kind);$i++){
            $kinds [] = [
                'productID' => $product_id,
                'productKindID' => $request->kind[$i],
            ];
        };
        DB::table('products_product_kinds')->insert($kinds);

        // dd($request->all());
        $type = array();
        if(isset($request->barcode)){
            DB::table('physical_products')->where('productID', $product_id)->update(['barcode' => '#############']);
            $request->validate([
                'barcode' => 'unique:physical_products'
            ]);
            $type[] = [
                'barcode' => $request->barcode,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'length' => $request->length,
                'width' => $request->width,
                'heigth' => $request->heigth,
                'weigh' => $request->weigh
            ];
            DB::table('physical_products')->where('productID', $product_id)->update($type[0]);
        }
        else{
            $type[] = [
                'content' => $request->content
            ];
            DB::table('online_products')->where('productID', $product_id)->update($type[0]);
        }

        $admin_active[] = [
            'userID' => Auth::user()->id,
            'productID' => $product_id,
            'description' => 'Update'
        ];
        DB::table('admin_activities')->insert($admin_active);

        Session::put('message','Update product ['.$product['title'].'] successfully!');
        return redirect()->action([AdminController::class, 'all_'.$name]);
    }

    public function add_promotion(){
        return view('product::admin.addpromotion');
    }

    public function save_promotion(Request $request){
        $promotion[] = [
            'percent' => $request->percent,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'numberPromotion' => $request->quantity
        ];
        DB::table('promotions')->insert($promotion);

        return \redirect()->action([AdminController::class, 'show_promotion']);
    }

    public function show_promotion(){
        $promotion = DB::table('promotions')->get();
        return view('product::admin.showPromotion')->with('promotion', $promotion);
    }

    public function add_promo_to_prod(){
        $promotion = DB::table('promotions')->get();
        $kind = DB::table('product_kinds')->get();
        $category = DB::table('product_categories')->get();
        $category[0]->name = 'cds and lps';
        unset($category[3]);
        // dd($category);
        return view('product::admin.addpromo_to_prod')->with([
            'promotion' => $promotion,
            'kind' => $kind,
            'category' => $category
        ]);
    }

    public function save_promo_prod(Request $request){
        $product_kind = DB::table('products_product_kinds')->whereIn('productKindID', $request->kind)->select('productID')->get();

        $promotion = DB::table('promotions')->where('id', $request->promotion)->get();

        $productID = array();

        foreach ($product_kind as $key => $value) {
            array_push($productID, $value->productID);
        }

        $product = DB::table('products')->whereIN('id', $productID)->get();

        foreach ($product as $key => $value) {
            if($value->price*$promotion[0]->percent < $value->value*0.3 || 
                $value->price*$promotion[0]->percent > $value->value*1.5)
                DB::table('products')->where('id', $value->id)->update(['promotionID' => $promotion[0]->id]);
        }

        // dd($product);    
        Session::put('message','Add promotion to product successfully!');
        return \redirect()->action([AdminController::class, 'all_product']);
    }

    public function order_management(){

        return view('product::admin.order_management');
    }
}
