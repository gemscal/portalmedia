<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{

	/**
	* verify the user with a given token.
	* 
	* @param string $verify_token
	* @return Response
	**/

    public function verify($verify_token)
    {
    	User::where('verify_token', $verify_token)->firstOrFail()
			->update(['verify_token' => null]); //verify the user

/*		return redirect()
			->route('home')
			->with('Success', 'Account Verified');*/
			/*return with('Account Activated Successfully');*/
			return view('verified.verified');
    }

}
