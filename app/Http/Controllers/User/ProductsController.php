<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->latest()->paginate(10);

        return view('user.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // store data
        $product = new Product();
        $product->title = $request->get('title');
        $product->content = $request->get('content');
        //
        $product->user_id = Auth::user()->id;
        $product->ip_address = $request->ip();
        $product->save();

        //
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Product has been created successfully!');

        return redirect()->route('user.products.edit', $product->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // validate if product belongs to current user
        if( $product->user_id != Auth::user()->id )
            return abort(404);

        return view('user.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // validate if product belongs to current user
        if( $product->user_id != Auth::user()->id )
            return abort(500);

        return view('user.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // validate if product belongs to current user
        if( $product->user_id != Auth::user()->id )
            return abort(500);

        // update data
        $product->title = $request->get('title');
        $product->content = $request->get('content');
        //
        $product->user_id = Auth::user()->id;
        $product->ip_address = $request->ip();
        $product->save();

        //
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Product has been updated successfully!');

        return redirect()->route('user.products.edit', $product->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        // never use below function in web applications
        //$product->delete();

        // validate if product belongs to current user
        if( $product->user_id != Auth::user()->id )
            return abort(500);

        // instead use below
        $product->is_active = 0;
        $product->save();

        $request->session()->flash('message.level', 'warning');
        $request->session()->flash('message.content', 'Product has been deleted!');
        //
        return redirect()->route('user.products.index' );
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request, $id) {
        //
        $product = Product::find($id);

        if( $product->payment )
            $product->payment = 0;
        else
            $product->payment = 1;
        // update record
        $product->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Payment Updated!');
        //
        return redirect()->route('user.products.index');
    }
}
