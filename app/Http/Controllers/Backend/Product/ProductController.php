<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::latest()->get();
        return view('backend.product.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::latest()->get();
        $Brand = Brand::latest()->get();
        $Color = Color::latest()->get();
        $Size = Size::latest()->get();
        $SubImage = ProductSubImage::latest()->get();
        return view('backend.product.create', compact('Category','Brand','Color','Size','SubImage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'product_name'  =>  'required|unique:products,name',
            'category'      =>  'required',
            'brand'         =>  'required',
            'product_price' =>  'required',
            'short_description' =>  'required',
            'long_description'  =>  'required',
            'product_image'     =>  'required',
        ]);

        // image upload
        if($request->hasFile('product_image')){
            $img = $request->file('product_image');
            $images = md5(uniqid().time()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('backend/img/product_image/'), $images);
        }

        // store
        $Product = Product::create([
            'category_id'   =>  $request->category,
            'brand_id'      =>  $request->brand,
            'name'          =>  $request->product_name,
            'slug'          =>  Str::of($request->product_name)->slug('-'),
            'price'         =>  $request->product_price,
            'short_desc'    =>  $request->short_description,
            'long_desc'     =>  $request->long_description,
            'image'         =>  $images,
        ]);

        if($Product){
            $file = $request->file('sub_image');
            foreach ($file as $value) {
                $image = md5(uniqid().time()).'.'.$value->getClientOriginalExtension();
                $value->move(public_path('backend/img/product_image/sub_image/'), $image);
                ProductSubImage::create([
                    'product_id'    =>  $Product->id,
                    'sub_image'     =>  $image,
                ]);
            }

            // color data
            $color_id = $request->color;
            if(!empty($color_id)){
                foreach ($color_id as $value) {
                    ProductColor::create([
                        'product_id'  =>  $Product->id,
                        'color_id'    =>  $value,
                    ]);
                }
            }

            // size data
            $size_id = $request->size;
            if(!empty($size_id)){
                foreach ($size_id as $value) {
                    ProductSize::create([
                        'product_id'  =>  $Product->id,
                        'size_id'    =>  $value,
                    ]);
                }
            }
        }
        else{
            // Confirm Message
            if($Product==false) {
                $notification = array(
                    'message' => 'Sorry ! Data not saved',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('product.index')->with($notification);
        }

        // Confirm Message
        if($Product) {
            $notification = array(
                'message' => 'Product Inserted Successfull !',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = Product::find($id);
        $Multi_image = ProductSubImage::select('sub_image')->where('product_id', $Product->id)->orderby('id','ASC')->get();

        $Color = ProductColor::select('color_id')->where('product_id', $Product->id)->orderby('id','DESC')->get();

        $Size = ProductSize::select('size_id')->where('product_id', $Product->id)->orderby('id','DESC')->get();

        return view('backend.product.view', compact('Product','Multi_image','Color','Size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::get();
        $Brand = Brand::get();
        $Color = Color::get();
        $Size = Size::get();
        $Edit = Product::find($id);

        $Color_Array = ProductColor::select('color_id')->where('product_id', $Edit->id)->orderby('id','ASC')->get();

        $Size_Array = ProductSize::select('size_id')->where('product_id', $Edit->id)->orderby('id','ASC')->get();

        $multi_image = ProductSubImage::select('sub_image')->where('product_id', $Edit->id)->orderby('id','ASC')->get();

        return view('backend.product.edit', compact('Edit','Category','Brand','Color','Size','Color_Array','Size_Array','multi_image'));
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
        $multi_image = ProductSubImage::select('sub_image')->where('product_id', $id)->orderby('id','ASC')->get();

        $imgId = Product::findOrFail($id);
        // validation
        $request->validate([
            'product_name'  =>  'required',
            'category'      =>  'required',
            'brand'         =>  'required',
            'product_price' =>  'required',
            'short_description' =>  'required',
            'long_description'  =>  'required',
            'product_image'     =>  'required',
        ]);
        if(!empty($request->product_image)){
            unlink(public_path('backend/img/product_image/').$imgId->image);
        }
        // image upload
        if($request->hasFile('product_image')){
            $img = $request->file('product_image');
            $images = md5(uniqid().time()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('backend/img/product_image/'), $images);
        }

        // store
        $Product = Product::findOrFail($id)->update([
            'category_id'   =>  $request->category,
            'brand_id'      =>  $request->brand,
            'name'          =>  $request->product_name,
            'slug'          =>  Str::of($request->product_name)->slug('-'),
            'price'         =>  $request->product_price,
            'short_desc'    =>  $request->short_description,
            'long_desc'     =>  $request->long_description,
            'image'         =>  $images,
        ]);

        if($Product){
            $file = $request->file('sub_image');
            if(!empty($file)){
                foreach($multi_image as $value){
                    unlink(public_path('backend/img/product_image/sub_image/').$value->sub_image);
                }
            }

            if(!empty($file)){
                $deleteImage = ProductSubImage::where('product_id', $id);
                foreach($deleteImage as $images){
                    if(!empty($images)){
                        unlink(public_path('backend/img/product_image/sub_image/').$images->sub_image);
                    }
                }
                ProductSubImage::where('product_id', $id)->delete();
            }

            foreach ($file as $value) {
                $image = md5(uniqid().time()).'.'.$value->getClientOriginalExtension();
                $value->move(public_path('backend/img/product_image/sub_image/'), $image);
                ProductSubImage::create([
                    'product_id'    =>  $id,
                    'sub_image'     =>  $image,
                ]);
            }

            // color data
            $color_id = $request->color;
            if(!empty($color_id)){
                ProductColor::where('product_id', $id)->delete();
            }

            if(!empty($color_id)){
                foreach ($color_id as $value) {
                    ProductColor::create([
                        'product_id'  =>  $id,
                        'color_id'    =>  $value,
                    ]);
                }
            }

            // size data
            $size_id = $request->size;
            if(!empty($size_id)){
                ProductSize::where('product_id', $id)->delete();
            }

            if(!empty($size_id)){
                foreach ($size_id as $value) {
                    ProductSize::create([
                        'product_id'  =>  $id,
                        'size_id'    =>  $value,
                    ]);
                }
            }
        }
        else{
            // Confirm Message
            if($Product==false) {
                $notification = array(
                    'message' => 'Sorry ! Data not saved',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('product.index')->with($notification);
        }

        // Confirm Message
        if($Product) {
            $notification = array(
                'message' => 'Product Updated Successfull !',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multi_image = ProductSubImage::select('sub_image')->where('product_id', $id)->orderby('id','ASC')->get();
        foreach($multi_image as $value){
            unlink(public_path('backend/img/product_image/sub_image/').$value->sub_image);
        }

        $ProductId = Product::find($id);
        if($ProductId){
            unlink(public_path('backend/img/product_image/').$ProductId->image);
        }

        $Delete = ProductSize::where('product_id', $id)->delete();
        $Delete = ProductColor::where('product_id', $id)->delete();
        $Delete = ProductSubImage::where('product_id', $id)->delete();
        $Delete = Product::find($id)->delete();

        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'Product Deleted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('product.index')->with($notification);
    }
}
