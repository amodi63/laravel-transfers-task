<?php

namespace App\Actions\Fortify;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthnticateUser
{

    public function authenticate(Request $request)
    {
        $username = $request->post(config('fortify.username'));
        $password = $request->post('password');
        
        if ($request->input('guard') === 'merchant') {
            
            return $this->authenticateMerchant($username, $password);
        } else {
            return $this->authenticateAdmin($username, $password);
        }
    }
    
    private function authenticateAdmin($username, $password)
    {
        $user = User::where(function ($query) use ($username) {
        
            $query->where('email', $username)
                ->orWhere('phone_number', $username);
        })->first();
    
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
    
        return false;
    }
    
    private function authenticateMerchant($username, $password)
    {
        $user = Merchant::where(function ($query) use ($username) {
            $query->where('email', $username)
                ->orWhere('phone_number', $username);
        })->first();
    
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
    
        return false;
    }
}
