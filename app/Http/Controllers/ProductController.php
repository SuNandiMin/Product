<?php

namespace App\Http\Controllers;

use App\Http\Requests\dashboard\product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $categories= Category::all();
        // if (auth()->user()->is_admin == 1) {
        //     $products=Product::latest()
        //         ->when(request('search'),function($p) use($request){
        //              $p->where('product_name','LIKE','%'.$request->search.'%')
        //         ->orWhereHas('category',function($p){
        //              $p->where('category_name','LIKE','%'.request('search').'%');
        //             });
        //         })
        //         ->paginate(5);

        //     // ->with('i', (request()->input('page', 1) - 1) * 5);
        // }else {
        //  $products =  Auth::user()->products()
        //     ->when(request('search'),function($p) use($request){
        //             $p->where('product_name','LIKE','%'.$request->search.'%')
        //             ->orWhereHas('category',function($p){
        //             $p->where('category_name','LIKE','%'.request('search').'%');
        //             });
        //         })
        //         ->paginate(1);

        // }
        if (!auth()->user()){
            return view('home');
        }
        elseif(auth()->user()->is_admin == 1) {
            $query = Product::latest();
        }
        else {
         $query =  Auth::user()->products()->latest();
        }
        $query->when(request('search'),function($q) use($request){
               $q->whereHas('category',function($query){
                    $query->where('category_name','LIKE','%'.request('search').'%')
                            ->orWhere('product_name','LIKE','%'.request('search').'%');
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
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '.'. time().'.'.$extension;
            // Upload Image
            $request->file('image')->move(public_path('images'), $fileNameToStore);
            }

            Product::create([
                'category_id'=>$request->category,
                'product_name'=>$request->product_name,
                'detail'=>$request->detail,
                'image'=> $fileNameToStore,
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
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '.'. time().'.'.$extension;
            // Upload Image
            $request->file('image')->move(public_path('images'), $fileNameToStore);
            }


        Product::find($product_id)->update([
            'product_name'=>$request->product_name,
            'detail'=>$request->detail,
            'image'=> $fileNameToStore,
            'category_id'=>$request->category
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
