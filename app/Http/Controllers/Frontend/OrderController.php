<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\order\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UserTrait;
use Illuminate\Contracts\Session\Session;

class OrderController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() && $this->isAdmin()) {
            $orders=Order::orderBy('delivery_date')->get();
            $total =  $orders->sum('total_cost');
            return view('orders.index',compact('orders','total'));
        }
            return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('frontend.single-product',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(OrderRequest $request, Product $product)
    {
        $order = Order::create([
            'customer_name'=>Auth::user()->name ?? $request->customer_name,
            'total_cost'=>$product->price*$request->quantity,
            'delivery_date'=>$request->delivery_date,
            'address'=>$request->address,
        ]);
        OrderItem::create([
            'order_id'=>$order->id,
            'product_id'=>$product->id,
            'price'=>$product->price,
            'quantity'=>$request->quantity,
        ]);
        return redirect()->back()
                        ->with('success','Receiped your orders');

    }

    public function cartOrder(Request $request)
    {
        $carts = session()->get('cart');
        $totalCost = 0;

        foreach ($carts as $cart) {
            $totalCost += $cart['price']*$cart['quantity'];
        }
        $order = Order::create([
            'customer_name'=>Auth::user()->name ?? $request->customer_name,
            'total_cost'=>$totalCost,
            'delivery_date'=>$request->delivery_date,
            'address'=>$request->address,
            ]);

        foreach ($carts as $key=>$cart) {

            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$key,
                'price'=>$cart['price'],
                'quantity'=>$cart['quantity'],
            ]);
        }
        session()->flush();
        return redirect()->route('shop')
        ->with('success','Receiped your orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrderItem($order)
    {
        $order=Order::findOrFail($order);
        $total_cost=$order->total_cost;
        $order_items = $order->orderItems->all();
        return view('orders.show',compact('order_items','total_cost'));
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
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders')
                        ->with('success','Order deleted successfully');
    }

    // public function cart(Product $product){
    //     Order::create([
    //         'product_name'=>$product->name,
    //         'price'=>$product->price,
    //     ]);
    //     return redirect()->route('cart')
    //                     ->with('success','Receiped your orders');
    // }
}
