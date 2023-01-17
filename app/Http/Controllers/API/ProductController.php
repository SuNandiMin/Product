<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       $products=Product::orderBy('created_at','desc')->get();
       return response()->json([
            "status" => true,
            "message"=>"Success",
            "data"=>ResourcesProduct::collection($products),
       ],200);

    }

    public function store(Request $request)
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

        $input=[
            'product_name'=>$request->name,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
            'detail'=>$request->detail,
            'image'=>$fileNameToStore,
        ];

        $product= Product::create($input);

        return response()->json([
            "status"=>true,
            "message"=>"Success",
            "data"=>new ResourcesProduct($product)
        ],201);
    }

    public function show($id)
    {
        try{
            $product=Product::find($id);
            return response()->json([
                "status"=>true,
                "message"=>"Success",
                "data"=>new ResourcesProduct($product),
            ],202);
        }
        catch(Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage(),
            ],202);
        }

    }

    public function update(Request $request, $id)
    {

        try{
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

            $input=[
                'product_name'=>$request->name,
                'user_id'=>$request->user_id,
                'category_id'=>$request->category_id,
                'detail'=>$request->detail,
                'image'=>$fileNameToStore ,
            ];
            $product=Product::findOrFail($id);
            $product->update($input);

            return response()->json([
                "status"=>true,
                "message"=>"Success",
                "data"=>new ResourcesProduct($product),
            ],202);
        }
        catch(Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage(),
            ],202);
        }

    }

    public function destroy($id)
    {
        try{
            $product=Product::findOrFail($id);
            $product->delete();
            return response()->json([
                "status"=>true,
                "message"=>"Success Delete"
            ],202);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>$e->getMessage(),
            ],202);
        }

    }

}
