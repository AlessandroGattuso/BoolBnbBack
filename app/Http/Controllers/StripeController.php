<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;
use App\Models\Apartment;


class StripeController extends Controller
{
    public function checkout()
    {
        return view('admin.stripe.checkout');
    }

    public function session($sponsorship_id, $apartment_id)
    {
        $sponsorship = Sponsorship::where('id', $sponsorship_id)->first();
        $sponsorship->prezzo = str_replace(".", "", $sponsorship->prezzo);
        /* dd($sponsorship->prezzo); */
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => $sponsorship->titolo,
                        ],
                        'unit_amount'  => $sponsorship->prezzo,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success', ['sponsorship_id'=> $sponsorship_id, 'apartment_id' => $apartment_id]),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success($sponsorship_id, $apartment_id)
    {
        $sponsorship = Sponsorship::where('id', $sponsorship_id)->first();
        $apartment = Apartment::where('id', $apartment_id)->first();
        $slug = $apartment->slug;
        $data_inizio = date('Y-m-d');

        if($sponsorship->ore_valide == 24){
            $data_scadenza = date('Y-m-d', strtotime($data_inizio. ' + 1 days'));
        }
        elseif ($sponsorship->ore_valide == 72) {
            $data_scadenza = date('Y-m-d', strtotime($data_inizio. ' + 3 days'));
        }
        else{
            $data_scadenza = date('Y-m-d', strtotime($data_inizio. ' + 6 days'));
        }
        $apartment_id = (int)$apartment_id;
        $sponsorship_id = (int)$sponsorship_id;

        $newSponsorship = array(
            'data_inizio' => $data_inizio,
            'data_scadenza' => $data_scadenza,
            'apartment_id' => $apartment_id,
            'sponsorship_id' => $sponsorship_id
        );
        /* dd($newSponsorship);
        $apartment->sponsorships()->attach($newSponsorship); */
        /* dd($apartment->sponsorships); */
        
        return view('admin.stripe.success', compact('slug'));
    }
}