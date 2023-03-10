<?php

namespace App\Http\Controllers;

use App\Http\Requests\dashboard\product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UserTrait;

class ProductController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()){
            // $products=Product::all();
            // return view('frontend.shop',compact('products'));
        }
        elseif($this->isAdmin()) {
            $query = Product::latest();
        }
        else {
         $query =  Auth::user()->products()->latest();
        }

        $query->when(request('search'),function($q) use($request){
               $q->whereHas('category',function($query){
                    $query->where('category_name','LIKE','%'.request('search').'%')
                            ->orWhere('name','LIKE','%'.request('search').'%');
             });

        });
       $products= $query->paginate(5);
       return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('image'))
        {
              $fileNameToStore=imageUpload($request->file('image'));
        }

        Product::create([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'detail'=>$request->detail,
            'image'=> $fileNameToStore ?? null,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product_id)
    {
        if ($request->hasFile('image'))
        {
            $fileNameToStore = imageUpload($request->file('image'));
        }

        Product::find($product_id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'detail'=>$request->detail,
            'image'=> $fileNameToStore ?? null,
            'category_id'=>$request->category,
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

}
