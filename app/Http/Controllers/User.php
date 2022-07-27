<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function configuration(Request $request)
    {
        $user = \App\Models\User::find(Auth::user()->id);

        return view('user/configuration',[
            'user' => $user
        ]);
    }

    public function upload(Request $request)
    {
        \App\Models\User::find(Auth::user()->id)->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        if($request->image){
            $filename = $request->image;
            $request->file('image')->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }
}
