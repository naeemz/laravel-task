<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    //
    public function set( $lang = null) {
        if( $lang )
            session()->put('locale', $lang);

        // redirect back
        return redirect( route('home') );
    }
}
