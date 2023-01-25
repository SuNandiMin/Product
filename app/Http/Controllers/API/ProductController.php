<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProductController extends ApiBaseController
{
    public function index()
    {
       $data=Product::orderBy('created_at','desc')->paginate(4);
       //return new ProductCollection($data);
       return $this->sendResponse( ResourcesProduct::collection($data)->response()->getData(true),200);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileNameToStore=imageUpload($request->file('image'));
        }

        $input=[
            'product_name'=>$request->name,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
            'detail'=>$request->detail,
            'image'=>$fileNameToStore ?? null,
        ];

        $validator = Validator::make($input, [
            'product_name' => 'required',
            'category_id'=>'required|integer',
            'user_id' => 'required',
            'detail' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $data= Product::create($input);

        return $this->sendResponse(new ResourcesProduct($data),201);
    }

    public function show($id)
    {
        try{
            $data=Product::find($id);
            return $this->sendResponse(new ResourcesProduct($data),202);
        }
        catch(Exception $e){
            return $this->runTimeError($e->getMessage());
        }

    }

    public function update(Request $request, $id)
    {

        try{

            if ($request->hasFile('image')) {
                $fileNameToStore=imageUpload($request->file('image'));
            }

            $input=[
                'product_name'=>$request->name,
                // 'user_id'=>$request->Auth::user(),
                'category_id'=>$request->category_id,
                'detail'=>$request->detail,
                'image'=>$fileNameToStore ?? null ,
            ];

            $validator = Validator::make($input, [
                'product_name' => 'required',
                'category_id'=>'required|integer',
                'user_id' => 'required',
                'detail' => 'required',
            ]);

            $data=Product::findOrFail($id);
            $data->update($input);

            return response()->json(new ResourcesProduct($data),200);


        }
        catch(Exception $e){
            return $this->runTimeError($e->getMessage());
        }

    }

    public function destroy($id)
    {
        try{
            $product=Product::findOrFail($id);
            $product->delete();
            return $this->sendResponse(null,202);
        }
        catch(\Exception $e){
            return $this->runTimeError($e->getMessage());
        }

    }
}
