<?php

namespace App\Http\Controllers;
// Import Helper Str untuk Generate
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // jika ingin salah satu method saja yang akan di middleware
        // maka tambahkan only seperti berikut
        $this->middleware('age', ['only' => ['getUser']]);
        // jika ingin semua method di middleware kecuali untuk method getUser
        // maka dapat menggunakan except seperti berikut
        $this->middleware('age', ['except' => ['getUser']]);
    }

    // Method untuk Mengenerate Key
    public function generateKey() 
    {
        return Str::random(32);
    }

    public function rangeDev() 
    {
        return "Controller POST";
    }

    public function getUser($id)
    {
        // Tanda . merupakan concet atau penghubung
        return "User anda adalah: " . $id;
    }

    public function getPost($cat1, $cat2)
    {
        return "Category 1 =" . $cat1 . " Dan Category 2 = " . $cat2;
    }

    // Menggunakan Route Name pada Controller
    public function getProfile()
    {
        // dibuat dalam tag a (engker) untuk link url 
        echo '<a href="' . route('profile.action') .'">Profile Action</a><br>';

        // menampilkan url dari route profile action
        return "Route Profile Action : " . route('profile.action');
    }

    public function getProfileAction()
    {
        echo '<a href="' . route('profile') . '"> Profile </a><br>';
        
        return "Route Profile : " . route('profile');
    }

    // Method fooBar
    public function fooBar(Request $request)
    {
        // kondisi jika path benar maka success jika salah maka fail
        // pengecekan dapat menggunakan is

        if ($request->is('foobar')) {
            return "Successfull";
        } else {
            return "Failed";
        }

        // untuk melihat path atau url
        return $request->path();

        // Jika ingin melihat HTTP method yang digunakan dapat menggunakan method()
        // Untuk pengecekan method POST dapat menggunakan postman
        return $request->method();
    }

    // get inputan 
    public function userProfileRequest(Request $request)
    {
        $user['name'] = $request->name;
        $user['username'] = $request->username;
        $user['password'] = $request->password;
        $user['email'] = $request->email;

        return $user;

        // Atau dapat melakukan di bawah ini untuk get keseluruhan
        return $request->all();

        // Untuk memberikan default value seperti berikut
        return $request->input('name', 'Sigit Wasis Subekti');

        // untuk mengecek apakah ada inputan name maka dengan method has
        if ($request->has('name', 'email')) {
            return "success";
        } else {
            return "failed";
        }
        
        // untuk mengecek apakah terisi atau tidak maka dengan method filled
        if ($request->filled('name', 'email')) {
            return "success";
        } else {
            return "failed";
        }

        // jika hanya ingin menampilkan username dan password maka dengan only
        return $request->only(['username', 'password']);
    }

    public function response()
    {
        $data['status'] = "Success";
        // make response dengan dengan status, type status dll
        return (new Response($data, 201))
                ->header('Content-Type', 'application/json'); 

        // atau dapat menggunakan helper response
        return response()->json([
            'message'   => 'Failed Not Found!',
            'status'    => false
        ], 404);
    }

}