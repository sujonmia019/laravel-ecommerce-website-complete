<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Setting;
use App\Model\Size;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request){

        $request->validate([
            'color_name'    =>  'required',
            'size_name'    =>  'required'
        ]);
        $product_id = Product::find($request->pid);
        $Color = Color::where('id',$request->color_name)->first();
        $Size = Size::where('id',$request->size_name)->first();

        $Shopping = Cart::add([
            'id' => $product_id->id,
            'name' => $product_id->name,
            'price' => $product_id->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'color_id'  => $request->color_name,
                'color'  => $Color->name,
                'size_id'  => $request->size_name,
                'size'  => $Size->name,
                'image' => $product_id->image
            ]
        ]);

        if($Shopping){
            $notification = array(
                'message' => 'Cart Added Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('show.cart')->with($notification);
    }

    public function showcart(){
        $Setting = Setting::find(1);
        if(Cart::isEmpty()){
            return redirect()->route('product.list');
        }
        else{
            return view('frontend.shoping_cart',compact('Setting'));
        }

    }

    public function removecart($id) {
        Cart::remove($id);
        if (Cart::isEmpty()) {
            $notification = array(
                'message' => 'Cart Deleted Successfull !',
                'alert-type' => 'info'
            );
            return redirect()->route('product.list')->with($notification);
        }
        return redirect()->back();
    }

    public function updatecart(Request $request) {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->update_qty,
            ),
        ));
    }
}
