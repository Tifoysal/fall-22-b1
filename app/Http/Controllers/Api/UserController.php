<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        //validation
        try {
            $user=User::create([
                'name'=>$request->name,
                'role'=>'user',
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'mobile'=>$request->mobile,
            ]);

            return $this->responseWithSuccess($user,'User created successfully.');
        }catch (\Throwable $exception)
        {
            return $this->responseWithError($exception->getMessage());
        }

    }

    public function login(Request $request)
    {
        //validation

        if(auth()->attempt($request->all())){
           $user=User::where('email',$request->email)->first();
           $user=$user->createToken('API token');

            return $this->responseWithSuccess($user->plainTextToken,'User login success.');
        }

    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return $this->responseWithSuccess([],'Logout success');
    }

    public function update()
    {
        return 'hello test 2';
    }
}
