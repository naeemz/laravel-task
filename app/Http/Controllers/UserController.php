<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    public function dashboard() {
        $products       = Product::all();
        $products_paid  = Product::where('payment', 1)->get();
        $products_unpaid= Product::where('payment', 0)->get();

        return view('user.dashboard', compact('products', 'products_paid', 'products_unpaid'));
    }

    public function profile_edit() {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    public function profile_update(Request $request) {
        //
        $user = Auth::user();
        request()->validate([
            'name' => 'required',
        ]);

        // store data
        $user->name = $request->get('name');
        $user->save();


        //
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Profile successfully updated!');

        return redirect()->route('user.profile.edit' );
    }

    public function password_edit() {
        $user = Auth::user();
        return view('user.profile.password', compact('user'));
    }

    public function password_update(Request $request) {
        //
        $user = Auth::user();
        request()->validate([
            'password'      => 'required|string|min:6|confirmed',
        ]);

        // store data
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Password updated successfully!');

        return redirect()->route('user.password.edit' );
    }
}
