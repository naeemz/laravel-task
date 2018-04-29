<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function first_payment(Request $request) {
        //
        $stripeToken = $request->get('stripe_token');
        // get logged in user
        $user = Auth::user();

        // plan can be create in Stripe API account
        // below is product plan ID from Stripe API
        $plan = 'plan_ClLECqLd2pC2xN';
        // subscribe and pay
        $user->newSubscription('main', $plan)->create($stripeToken);

        // update product
        $product = Product::find($request->get('product_id'));
        $product->payment = 1;
        $product->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User subscribed and payment successfully done!');

        return redirect()->route('user.products.index');
    }

    // if user already subscribe then only charge
    public function charge(Request $request, $product_id) {
        // user already subscribe
        $user = Auth::user();
        // charge parameter is in AED fills

        $charge = $user->charge(1000);

        if( $charge->paid ) {
            //
            $product = Product::find( $product_id );
            $product->payment = 1;
            $product->save();

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Paid successfully!');
        }
        else {
            //
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Error occurred!');
        }
        return redirect()->route('user.products.index' );
    }
}
