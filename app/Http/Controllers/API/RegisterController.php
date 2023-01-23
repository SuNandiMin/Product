<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends ApiBaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.',$validator->errors());
        }

        $input=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'c_password'=>$request->c_password,
        ];

        $user = User::create($input);

        $success['token']=$user->createToken('MyApp')->accessToken;
        $success['name']=$user->name;

        return $this->sendResponse($success,200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name']=$user->name;
            return $this->sendResponse($success,200);
        }else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
