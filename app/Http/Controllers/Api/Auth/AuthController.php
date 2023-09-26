<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    * Handle an authentication attempt.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function loginUser(ApiLoginRequest $request)
    {
        $data = $request->all();
        $credentials = [
            'password' => $data['password'],
        ];
    
        if (isset($data['email'])) {
            $credentials['email'] = $data['email'];
        } elseif (isset($data['phone_number'])) {
            $credentials['phone_number'] = $data['phone_number'];
        } elseif (isset($data['id_no'])) {
            $credentials['id_no'] = $data['id_no'];
        }
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $data['user'] = $user ;
            $token = $this->generateTokenResponse($user, $data);

            return response()->json([
                'user' => $data['user'],
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }
    }

    public function loginMerchant(ApiLoginRequest $request)
    {
        $data = $request->validate([
            'email' => 'required_without:phone_number|email',
            'phone_number' => 'required_without:email|numeric',
            'password' => 'required|string',
        ]);
    
        $credentials = [
            'password' => $data['password'],
        ];
    
        if (isset($data['email'])) {
            $credentials['email'] = $data['email'];
        } elseif (isset($data['phone_number'])) {
            $credentials['phone_number'] = $data['phone_number'];
        }
    
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $data['user'] = $user ;
            $token = $this->generateTokenResponse($user, $data);

            return response()->json([
                'user' => $data['user'],
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }
    }




    public function registerUser(ApiRegisterRequest $request)
    {
        $data = [];

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'account_number' => $request->input('account_number'),
            'balance' => $request->input('balance'),
        ]);
        $data['user'] = $user;
        $this->generateTokenResponse($user, $data);

        return response()->json([
            'data' => $data,
        ], 200);
    }

    public function registerMerchant(ApiRegisterRequest $request)
    {
        $data = [];

        $merchant = Merchant::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
        ]);
        $data['merchant'] = $merchant;
        $this->generateTokenResponse($merchant, $data);

        return response()->json([
            'data' => $data,
        ], 200);
    }

    /*
    * Handle an generateTokenResponse Process.
    *
    * @param  User $user , Array $data
    */
    private function generateTokenResponse($user, &$data)
    {
        return $user->createToken('TransfersApp')->plainTextToken;
    }
    /*
    * Handle an Logout Process. 
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function logoutUser(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }
    /*
    * Handle an Logout Process.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function logoutMerchant(Request $request)
    {
        $request->user('merchant')->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    }
    /*
    * Handle an Profile Process.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function userProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => $user,
        ], 200);
    }
    /*
    * Handle an Profile Process.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function merchantProfile(Request $request)
    {
        $merchant = $request->user('merchant');

        return response()->json([
            'merchant' => $merchant,
        ], 200);
    }
    public function deleteUser(Request $request)
    {
        $user = $request->user();
        $user->delete();
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully deleted user',
        ], 200);
    }
    public function deleteMerchant(Request $request)
    {
        $merchant = $request->user('merchant');
        $merchant->delete();
        $request->user('merchant')->token()->revoke();

        return response()->json([
            'message' => 'Successfully deleted merchant',
        ], 200);
    }
}