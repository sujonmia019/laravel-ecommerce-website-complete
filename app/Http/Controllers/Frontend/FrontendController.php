<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Setting;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    // Home Page
    public function index(){
        $Slider = Slider::latest()->where('status', 1)->get();
        $Setting = Setting::find(1);
        $Category = Product::orderby('id', 'DESC')->select('category_id')->groupBy('category_id')->get();
        $Brand = Product::orderby('id', 'DESC')->select('brand_id')->groupBy('brand_id')->get();
        $Product = Product::orderby('id', 'DESC')->paginate(12);
        return view('frontend.home',compact('Setting','Category','Brand','Product','Slider'));

    }

    // Contact Page
    public function contactUs(){
        $Setting = Setting::find(1);
        return view('frontend.contact_us',compact('Setting','Slider'));
    }

    // Shoping Cart
    public function shopCart(){
        $Setting = Setting::find(1);
        return view('frontend.shoping_cart',compact('Setting'));
    }

    // Product List
    public function productList(){
        $Category = Product::orderby('id', 'DESC')->select('category_id')->groupBy('category_id')->get();
        $Brand = Product::orderby('id', 'DESC')->select('brand_id')->groupBy('brand_id')->get();
        $Product = Product::orderby('id', 'DESC')->paginate(12);
        $Setting = Setting::find(1);
        return view('frontend.product-list', compact('Setting','Category','Brand','Product'));
    }

    // Category Product
    public function categoryProduct($category_id){
        $Category = Product::orderby('id', 'DESC')->select('category_id')->groupBy('category_id')->get();
        $Brand = Product::orderby('id', 'DESC')->select('brand_id')->groupBy('brand_id')->get();
        $Product = Product::where('category_id', $category_id)->orderby('id', 'DESC')->get();
        $Setting = Setting::find(1);
        return view('frontend.category-product', compact('Setting','Category','Brand','Product'));
    }

    // Brand Product
    public function brandProduct($brand_id) {
        $Category = Product::orderby('id', 'DESC')->select('category_id')->groupBy('category_id')->get();
        $Brand = Product::orderby('id', 'DESC')->select('brand_id')->groupBy('brand_id')->get();
        $Product = Product::where('brand_id', $brand_id)->orderby('id', 'DESC')->get();
        $Setting = Setting::find(1);
        return view('frontend.brand-product', compact('Setting','Category','Brand','Product'));
    }

    // Product Details
    public function productDetails($slug){
        $Products = Product::where('slug', $slug)->first();
        $Product_img = ProductSubImage::where('product_id', $Products->id)->get();
        $Product_size = ProductSize::where('product_id', $Products->id)->get();
        $Product_color = ProductColor::where('product_id', $Products->id)->get();
        $Setting = Setting::find(1);
        return view('frontend.single_product',compact('Setting','Products','Product_img','Product_size','Product_color'));

    }

    // Product Search 
    public function productFind(Request $request){
        $Slug = $request->slug;
        $Product = Product::where('slug', $Slug)->first();
        if($Product){
            $Products = Product::where('slug', $Slug)->first();
            $Product_img = ProductSubImage::where('product_id', $Products->id)->get();
            $Product_size = ProductSize::where('product_id', $Products->id)->get();
            $Product_color = ProductColor::where('product_id', $Products->id)->get();
            $Setting = Setting::find(1);
            return view('frontend.search-product',compact('Setting','Products','Product_img','Product_size','Product_color'));
        }
        else{
            $notification = array(
                'message'   =>  'Product does not find?',
                'alert-type'    =>  'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    // Product Search Ajax 
    public function getProduct(Request $request){
        $slug = $request->slug;
        $productData = DB::table('products')->where('slug','LIKE','%'.$slug.'%')->get();
        $html = '';
        $html .='<div><ul>';
        if($productData){
            foreach($productData as $data){
                $html .= '<li>'.$data->slug.'</li>';
            }
        }
        $html .='</ul></div>';
        return response()->json($html);
    }

}
