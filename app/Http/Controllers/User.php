<?php

namespace App\Http\Controllers;

use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        try {
            \App\Models\User::find(Auth::user()->id)->update([
                'name'  => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'favourite_bands' => $request->favourite_bands,
                'favourite_movies' => $request->favourite_movies,
                'hobbies' => $request->hobbies,
                'profession' => $request->profession,
                'birthday' => $request->birthday,
            ]);

            // if there is a [file]
            if ($request->hasFile('avatar')) {
                // allowed extensions
                $allowed_images = Chatify::getAllowedImages();

                $file = $request->file('avatar');
                // if size less than 150MB
                if ($file->getSize() < 150000000) {
                    if (in_array($file->getClientOriginalExtension(), $allowed_images)) {
                        // delete the older one
                        if (Auth::user()->avatar != config('chatify.user_avatar.default')) {
                            $path = storage_path('app/public/' . config('chatify.user_avatar.folder') . '/' . Auth::user()->avatar);
                            if (file_exists($path)) {
                                @unlink($path);
                            }
                        }
                        // upload
                        $avatar = Str::uuid() . "." . $file->getClientOriginalExtension();
                        $update = \App\Models\User::where('id', Auth::user()->id)->update(['avatar' => $avatar]);
                        $file->storeAs("public/" . config('chatify.user_avatar.folder'), $avatar);
                        $success = $update ? 1 : 0;
                    } else {
                        $msg = "Extensão não permitida!";
                        $error = 1;
                    }
                } else {
                    $msg = "Extensão não permitida!";
                    $error = 1;
                }
            }

            // if there is a [file]
            if ($request->hasFile('background')) {
                // allowed extensions
                $allowed_images = Chatify::getAllowedImages();

                $file = $request->file('background');
                // if size less than 150MB
                if ($file->getSize() < 150000000) {
                    if (in_array($file->getClientOriginalExtension(), $allowed_images)) {
                        // upload
                        $background = Str::uuid() . "." . $file->getClientOriginalExtension();
                        $update = \App\Models\User::where('id', Auth::user()->id)->update(['background' => $background]);
                        $file->storeAs("public/background", $background);
                        $success = $update ? 1 : 0;
                    } else {
                        $msg = "Extensão não permitida!";
                        $error = 1;
                    }
                } else {
                    $msg = "Extensão não permitida!";
                    $error = 1;
                }
            }
        }catch (\Exception $error){
            dd($error);
        }

        return redirect(route('home'));
    }
}
