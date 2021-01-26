<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('profile', compact('data'));
    }

    public function update(Request $request)
    {
        $image = $request->file('image')->store('images');
        $request->user()->update([
            'image' => $image
        ]);
        return redirect()->back();
    }
}
