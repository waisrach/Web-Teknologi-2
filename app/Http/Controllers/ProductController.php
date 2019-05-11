<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Images;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        $productInstance= new Product();
        $products = $productInstance->orderProducts($request->get('order_by'));
        if($request->ajax()){
            return response()->json($products, 200);
        }

        return view ('products.index', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
         if($product){
             return view('products.show', compact('product'));
         } else {
             return redirect('/products')->with('errors', 'produk tidak ditemukan');
         }

        // $data['title'] = "Detail Product";
        // $data['menu'] = "Products";
        // $data['product'] = \App\Models\Product::find($id);
        // $data['images'] = json_decode($data['product']->image_url);
        // $data['review'] = \App\Models\ProductReview::where('product_id', $id)->orderBy('id','D')->get();
        // $data['avgRating'] = ProductReview::rating($id);

        // return view('show', $this->prefix($data));
    }

    public function image($imageName)
    {
        $filepath = storage_path(env('PATH_IMAGE').$imageName);
        return Image::make($filePath)->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
