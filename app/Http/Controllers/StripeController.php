<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StripeController extends Controller
{
    public function checkout()
    {
        return view('admin.stripe.checkout');
    }

    public function session()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => 'Appartamento',
                        ],
                        'unit_amount'  => 1000,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('admin.stripe.success');
    }
}