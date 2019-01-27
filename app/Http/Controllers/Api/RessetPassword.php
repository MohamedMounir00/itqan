<?php

namespace App\Http\Controllers\Api;
use App\Mail\RessetPasseord;
use App\User;
use DB;
use Auth;
use Hash;
use Carbon;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RessetPassword extends Controller
{
    public function sendPasswordResetToken(Request $request)
    {
        $users = User::where('email', $request->email)->get();
        if ($users->count() == 0)
            return response()->json(['error' => 'email in not correct']);


        //create a new token to be sent to the user.
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60), //change 60 to any length you want
            'created_at' => Carbon\Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $user = mt_rand(100000, 999999);

        $token = $tokenData->token;
        Mail::to($request->email)->send(new RessetPasseord($user));
        // $email = $request->email; // or $email = $tokenData->email;
        return response()->json(['token'=>$token,'code'=>$user]);
    }

    public function showPasswordResetForm($token)
    {
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        if ( !$tokenData ) return redirect()->to('home'); //redirect them anywhere you want if the token does not exist.
        return view('passwords.show');
    }


    public function resetPassword(Request $request,$token)
    {
        $password = $request->password;
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        $user = User::where('email', $tokenData->email)->first();
        if ( !$user )
            return redirect()->to('home'); //or wherever you want

        $user->password = Hash::make($password);

       $user->update();


        //do we log the user directly or let them login and try their password for the first time ? if yes
       // Auth::login($user);

        // If the user shouldn't reuse the token later, delete the token
        DB::table('password_resets')->where('email', $user->email)->delete();
        return response()->json(['data'=>'paswword resseted']);

    }

}
