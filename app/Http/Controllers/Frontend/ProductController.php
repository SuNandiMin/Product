<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products=Product::all();
        return view('frontend.shop',compact('products'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function addToCart($id)
    {
        $product=Product::findOrFail($id);

        $cart=session()->get('cart',[]);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }else {
            $cart[$id]=[
                'name'=> $product->name,
                'quantity'=>1,
                'price'=>$product->price,
                'image'=>$product->image,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()
                        ->with('success','Product added to cart successfully!');
    }

    public function cartUpdate(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
            // session()->flash('success','Quantity Updated Successfully');
        }
    }

    public function cartRemove($id)
    {
        if($id) {
            $cart = session()->get('cart');

            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            return redirect()->back()
                        ->with('success','Remove successfully!');
        }
    }

}
